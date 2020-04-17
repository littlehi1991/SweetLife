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
            <li class="breadcrumb-item"><a href="">首頁</a></li>
            <li class="breadcrumb-item active" aria-current="page">商品編輯頁</li>
        </ol>
    </nav>
    <div class="container-fluid">
        <?php include 'navadmin.php';?>
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">商品管理</h1>
            </div>
            <a href="<?php echo DOMAIN . 'Sweetslife/view/programinput.php';?>">
                <button type="button" class="btn btn-primary">新增文章</button>
            </a>
            <a href="<?php echo DOMAIN. "SweetsLife/view/planinput.php";?>">
                <button type="button" class="btn btn-info">新增方案</button>
            </a>
            <div style="margin: 1%;">
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th>編號</th>
                                <th>方案名稱</th>
                                <th>開放份量</th>
                                <th>單份金額</th>
                                <th>開放期數</th>
                                <th>編輯</th>
                            </tr>
                        </thead>
                        <?php
                            require '../view/config.php';
                            include '../controller/db.php';
                            $sql = "SELECT * FROM sweetlife.program  ";
                            $val = $conn->query($sql)->fetch_all(1);
                            $psql = "SELECT * FROM sweetlife.plan ";
                            $pval = $conn ->query($psql)->fetch_all(1);
                         ?>
                        <tbody>
                            <tr>
                                <?php foreach ($pval as $k => $v){ ?>
                                <td><?php echo $v['id'];?></td>
                                <td><?php echo $v['name'];?></td>
                                <td><?php echo $v['size'];?></td>
                                <td><?php echo $v['price'];?></td>
                                <td><?php echo $v['period'];?></td>
                                <td><a href="<?php echo DOMAIN.'Sweetslife/view/planedit.php?id='.$v['id'];?>" >編輯</a>｜<a href="">刪除</a> </td>
                            </tr>
                        </tbody>
                        <?php }?>
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th>商品名稱</th>
                                <th>容量</th>
                                <th>期數</th>
                                <th>編輯</th>
                            </tr>
                        </thead>
                        <?php
                        foreach ($val as $k => $v){
                            $plan =json_decode($v['plan_id']);
                        ?>
                        <tbody>
                        <tr>
                            <td><?php echo $v['name'];?></td>
                            <td>
                                <?php
                                    $size = '';
                                    foreach ($plan as $k1 => $v1){
                                        $size .= '&nbsp'.$pval[$v1]['size'].'/';
                                    }
                                    echo rtrim($size,'/');
                                ?>
                            </td>
                            <td>
                                <?php
                                    $period = '';
                                    foreach ($plan as $k1 => $v1){
                                        $period .= '&nbsp'.$pval[$v1]['period'].'/';
                                    }
                                    echo rtrim($period,'/');
                                ?>
                            </td>
                                <?php

                                ?>
                            <td><a href="<?php echo DOMAIN .'Sweetslife/view/programedit.php?id='.$v['id'];?>" >編輯</a>｜<a href="#">刪除</a> </td>
                            <?php }?>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </main>

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