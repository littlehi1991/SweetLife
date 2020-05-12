<?php
    session_start();
    $userid =$_SESSION['email'] ;
?>
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>會員資料頁</title>
        <script src="https://code.jquery.com/jquery-3.5.0.js" integrity="sha256-r/AaFHrszJtwpe+tHyNi/XCfMxYpbsRg2Uqn0x3s2zc=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script>
            $(document).on('click', '.m_table tr td', function () {
                if ($(this).attr('class') !== 'id' && $(this).attr('class') !== 'email' ){
                    $('.light_box').css('display', 'block');
                    let text = $(this).html();
                    let col = $(this).attr('class');
                    let id = $(this).parent().find('td:first-child').html();
                    showLightBox(id, text, col);
                }
            });

            function showLightBox(id, text, col) {
                let html ='<input type="text" class="data form-control" name="'+col+'" value="'+text+'" style="margin-top: 20px;"><input class="update_id" type="hidden" value="'+id+'">';
                $('.form_object').html(html);
            }

            function cancelLightBox() {
                $('.light_box').css('display', 'none');
            }

            function sendRequest() {
                let id = $('.update_id').val();
                let col = $('.data').attr('name');
                let val = $('.data').val();

                $.ajax({
                    type: 'POST',
                    dataType: 'JSON',
                    url: 'ajax.php',
                    data: {id: id, col: col, val: val}, // {欄位: 值}
                    success: function (change) {
                        alert(change['status']);
                        cancelLightBox();
                    }
                });
            }
        </script>
    </head>
    <body>
        <header>
            <?php include "nav.php";?>
        </header>
        <div aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo DOMAIN .'SweetsLIfe/view/index.php'; ?>">首頁</a></li>
                <li class="breadcrumb-item active" aria-current="page">會員資料</li>
            </ol>
        </div>
        <div class="light_box" style="width: 100%; height: 100%; z-index: 999; background-color: rgba(0,0,0,0.5); position: absolute; display: none">
            <div class="light_box_content" style="width: 40%;height: 35%; background-color: white; position: relative; left: 30%; top: 20%; text-align: center; padding:3%;">
                <p>修改會員資料</p>
                <div class="form_object" style="width: 80%;"></div>
                <div class="buttons" style="text-align: center; margin-top: 20px;">
                    <button type="button" class="btn btn-primary" onclick="sendRequest()">submit</button>
                    <button type="button" class="btn btn-secondary" onclick="cancelLightBox();">cancel</button>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <?php include 'm_nav.php';
            include '../controller/db.php';
            $sql = "SELECT * FROM sweetlife.member WHERE email = '" . $userid . "'";
            $val = $conn ->query($sql)->fetch_all(1);
            ?>
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">會員資料</h1>
                </div>
                <p style="color: red">＊E-mail為會員帳號無法於會員後台更改，欲修改請與<a href="#"><span>客服中心</span></a>聯絡，</p>
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead>
                        <tr>
                            <th scope="col">會員編號</th>
                            <th scope="col">會員姓名</th>
                            <th scope="col">E-mail</th>
                            <th scope="col">聯絡電話</th>
                            <th scope="col">通訊地址</th>
                        </tr>
                        </thead>
                        <tbody class="m_table">
                        <tr>
                            <td class="id"><?php echo $val[0]['id'];?></td>
                            <td class="username"><?php echo $val[0]['username'];?></td>
                            <td class="email"><?php echo $userid;?></td>
                            <td class="phone"><?php echo $val[0]['phone'];?></td>
                            <td class="address"><?php echo $val[0]['address'];?></td>
                        </tr>
                        </tbody>
                    </table>
                    <a href="<?php echo DOMAIN . 'SweetsLife/view/useredit.php?id='.$val[0]['id'];?>"><button type="button" class="btn btn-info">修改會員資料</button></a>
                    <hr/>
                </div>
             </main>
        </div>
    </body>



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
    </body>
</html>