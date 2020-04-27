<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <title>精緻人生新文章內頁</title>
    </head>
    <body>
        <header>
            <?php include "nav.php";?>
        </header>
<!--        連線資料庫-->

        <?php
        $page = $_GET['id'];
        include "../controller/db.php";
        $sql = "SELECT * FROM sweetlife.news n  JOIN sweetlife.author a ON n.author_id = a.author_id WHERE n.id='$page' ";
        $val = $conn->query($sql)->fetch_all(1);
        // var_dump($val);exit;
        ?>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo DOMAIN . 'Sweetslife/view/index.php';?>">首頁</a></li>
                <li class="breadcrumb-item"><a href="<?php echo  DOMAIN . 'Sweetslife/view/Newslist.php';?>">文章列表</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo $val[0]['title'];?></li>
            </ol>
        </nav>

<!--        將資料庫取出各欄位的值填入html-->
    <div class="container">
        <div class="blog-header">
            <img src="<?php echo '../controller/'.$val[0]['img']?>" class="lead" alt="產品圖" width="60%;" >
                <h1 class="blog-title"> <?php echo $val[0]["title"] ?> </h1>
        </div>

        <div class="row">

            <div class="col-sm-8 blog-main">
                <div class="blog-post">
                    <p class="blog-post-meta"><?php echo $val[0]["create_time"] ?> </p>

                    <?php echo $val[0]["contant"] ?>

                </div><!-- /.blog-post -->
                <nav>
                    <ul class="pager">
                        <li ><a href="<?php echo DOMAIN."SweetsLife/view/NewsInside.php?id=". ($page-1);?>">前一篇文章</a></li>
                        <li><a href="<?php echo DOMAIN."SweetsLife/view/NewsInside.php?id=". ($page+1);?>">下一篇文章</a></li>
                    </ul>
                </nav>

            </div><!-- /.blog-main -->

            <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
                <div class="sidebar-module sidebar-module-inset">
                    <h4><?php  echo $val[0]["a_name"];?></h4>
                    <p><?php echo $val[0]["intro"];?></p>
                     </div>
                <div class="sidebar-module">
                    <h4>我們想推薦給你</h4>
                    <?php
                        $res = $val[0]['type'];
                        $sql = "SELECT n.id AS nid , n.title  
                                FROM sweetlife.news n JOIN sweetlife.type t ON n.type = t.t_id WHERE t.t_id ='" . $res . "'";
                        $val = $conn->query($sql)->fetch_all(1);
                        foreach($val as $k =>$v){
                        ?>
                    <ol class="list-unstyled">
                        <li><a href="<?php echo  DOMAIN."SweetsLife/view/NewsInside.php?id=".$v['nid']; ?>"><?php echo $v['title'];?></a></li>
                    </ol>
                    <?php }?>
                </div>

            </div><!-- /.blog-sidebar -->

        </div><!-- /.row -->

    </div><!-- /.container -->
    </body>
    <footer class="blog-footer">
        <p style="text-align: center;">
            <a href="#">Back to top</a>
        </p>
    </footer>


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