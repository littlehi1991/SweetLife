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
                <li class="breadcrumb-item active" aria-current="page">文章編輯頁</li>
            </ol>
        </nav>
        <div class="container-fluid">
               <?php include 'navadmin.php';?>
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">文章管理</h1>
                </div>

                <div class="table-responsive">
                    <a href="<?php echo DOMAIN."SweetsLife/view/nwesinput.php";?>">
                        <button type="button" class="btn btn-primary">新增文章</button>
                    </a>
                    <a href="<?php echo DOMAIN."SweetsLife/view/author_input.php";?>">
                            <button type="button" class="btn btn-info">新增作者</button>
                   </a>
                    <table class="table table-striped table-sm">
                        <thead>
                        <?php
                            include '../controller/db.php';
                            require 'config.php';
                            $sql = "SELECT n.id AS nid, n.title, n.create_time, n.author_id AS naid, n.active, a.author_id AS aid, a.a_name, a.intro, t.id AS tid, t.n_type, t.t_id  FROM sweetlife.news n 
                                    JOIN sweetlife.author a ON n.author_id = a.author_id  
                                    JOIN sweetlife.type t ON n.type = t.t_id";
                            $val = $conn->query($sql)->fetch_all(1);
                            $asql ='SELECT * FROM sweetlife.author';
                            $aval = $conn->query($asql)->fetch_all(1);
                            ?>
                        <tr>
                            <th>編號</th>
                            <th>作者名稱</th>
                            <th>作者描述</th>
                            <th>編輯</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($aval as $k => $v){
                            ?>
                        <tr>
                            <td><?php echo $v['aid'];?></td>
                            <td><?php echo $v['a_name'];?></td>
                            <td><?php echo $v['intro'];?></td>
                            <td><a href="<?php echo DOMAIN.'Sweetslife/view/authoredit.php?id='.$v['aid'];?>" >編輯</a>｜<a href="#">刪除</a> </td>
                            <?php }?>
                        </tr>
                        </tbody>
                    </table>
                    <hr/>
                    <table class="table table-striped table-sm">
                        <thead>
                        <tr>
                            <th>編號</th>
                            <th>文章上架時間</th>
                            <th>文章標題</th>
                            <th>文章類別</th>
                            <th>作者</th>
                            <th>開啟狀態</th>
                            <th>文章編輯</th>
                        </tr>
                        </thead>
                        <?php
                            foreach ($val as $k => $v){
                            $active ='';
                            switch ($v['active']){
                                case '1':
                                    $active = '開啟';
                                break;
                                case '0':
                                    $active = '關閉';
                                break;
                            }
                            $val[$k]['active'] = $active;
                        ?>
                        <tbody>
                        <tr>
                            <td><?php echo $v['nid'];?></td>
                            <td><?php echo $v['create_time'];?></td>
                            <td><?php echo $v['title'];?></td>
                            <td><?php echo $v['n_type'];?></td>
                            <td><?php echo $v['a_name'];?></td>
                            <td><?php echo $active;?></td>
                            <td><a href="<?php echo DOMAIN.'Sweetslife/view/newsedit.php?id='.$v['nid'];?>" >編輯</a>｜<a href="#">刪除</a> </td>

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