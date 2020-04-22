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
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo DOMAIN . 'SweetsLife/view/index.php';?>">首頁</a></li>
                <li class="breadcrumb-item active" aria-current="page">會員管理頁</li>
            </ol>
        </nav>
        <div class="container-fluid">
        <?php include 'navadmin.php';?>
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">會員管理</h1>
                </div>
                <div class="table-responsive">
                    <a href="<?php echo  DOMAIN .'SweetsLife/view/newsign.php'?>">
                        <button type="button" class="btn btn-primary">新增會員</button>
                    </a>
                    <table class="table table-striped table-sm">
                        <thead>
                        <tr>
                            <th>會員編號</th>
                            <th>姓名</th>
                            <th>E-mail</th>
                            <th>聯絡電話</th>
                            <th>通訊地址</th>
                            <th>訂單記錄</th>
                            <th>編輯</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        include '../controller/db.php';
                        $sqL = "SELECT * FROM sweetlife.member";
                        $val = $conn->query($sqL)->fetch_all(1);
                        foreach ($val as $k => $v){
                        ?>
                        <tr>
                            <td><?php echo $v['id'];?></td>
                            <td><?php echo $v['username'];?></td>
                            <td><?php echo $v['email'];?></td>
                            <td><?php echo $v['phone'];?></td>
                            <td><?php echo $v['address'];?></td>
                            <td><a href="<?php echo DOMAIN . 'Sweetslife/view/orderlistadmin.php?id='.$v['id'];?>" 訂單記錄</td>
                            <td><a href="<?php echo DOMAIN . 'Sweetslife/view/mamberedit.php?id='.$v['id'];?>">編輯</a> ｜
                                <a href='<?php echo DOMAIN . 'Sweetslife/controller/memberdelet.php?id='.$v['id'];?>' onClick="return confirm('確定刪除？')" >刪除</a></td>
                        </tr>
                        </tbody>
                        <?php }?>
                    </table>
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