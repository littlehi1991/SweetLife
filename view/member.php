<?php
    session_start();
    $userid =$_SESSION['email'] ;
?>
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <title>精緻人生產品列表</title>
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

                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead>
                        <tr>
                            <th>會員編號</th>
                            <th>會員姓名</th>
                            <th>E-mail</th>
                            <th>聯絡電話</th>
                            <th>通訊地址</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><?php echo $val[0]['id'];?></td>
                            <td><?php echo $val[0]['username'];?></td>
                            <td><?php echo $userid;?></td>
                            <td><?php echo $val[0]['phone'];?></td>
                            <td><?php echo $val[0]['address'];?></td>
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