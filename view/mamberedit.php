<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
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
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo DOMAIN . 'SweetsLife/view/index.php';?>">首頁</a></li>
                    <li class="breadcrumb-item active" aria-current="page">會員管理</li>
                </ol>
            </nav>
            <div class="container-fluid">
                <?php include 'navadmin.php';?>
                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2">修改會員資料</h1>
                    </div>
                    <div class="table-responsive">
                        <form class="form-signin" style="width: 500px;" method="POST" action=" ../controller/memberupdate.php">
                            <a href="<?php echo DOMAIN . 'SweetsLife/view/memberadmin.php';?>"> <p>回上一頁</p></a>
                            <div>
                                <?php
                                    $page = $_GET['id'];
                                    include '../controller/db.php';
                                    $sql = "SELECT * FROM sweetlife.member WHERE id ='" . $page . "' ";
                                    $val = $conn->query($sql)->fetch_all(1);
                                ?>
                                <input type="hidden" name="page" value="<?php echo $page;?>">
                                <div class="form-group ">
                                    <label  for="exampleInputName" >用戶名稱</label>
                                    <input type="text" name="name" class="form-control" value="<?php echo $val[0]['username'];?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">電子郵件</label>
                                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $val[0]['email'];?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">密碼</label>
                                    <input type="password" name="pw" class="form-control" id="exampleInputPassword1" placeholder="請輸入6~12位數中英混合密碼">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">確認密碼</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="請再輸入一次您的密碼">
                                </div>
                                <div class="form-group">
                                    <label for="inputAddress2">手機號碼</label>
                                    <input type="text"  name="phone" class="form-control" id="inputAddress2" value="<?php echo $val[0]['phone'];?>">
                                </div>
                                <label for="inputAddress2">通訊地址</label>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <input type="text" name="address" class="form-control" id="inputZip" value="<?php echo $val[0]['address'];?>">
                                    </div>
                                </div>
                                <br/>
                                <button class="btn btn-lg btn-primary btn-block" type="submit">確定修改</button>
                            </div>
                        </form>
                        <hr/>
                    </div>
                </main>
            </div>

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