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

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">logo</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="sweetliffeNnew.php">最新消息</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="sweetlifeProgram.php" tabindex="-1" aria-disabled="true">手工甜點</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
            <div>
                <img src="img/cart.png" alt="購物車圖示" title="購物車圖示" width="35x;">
            </div>
            <div>
                <img src="img/icon.png" alt="會員圖示" title="會員頭像" width="50px;">
            </div>
        </nav>

<!--        連線資料庫-->
         <?php
//            error_reporting( E_ALL );
            $page = $_GET['$id'];
            include "../controller/db.php";
            $sql = "SELECT * FROM sweetlife.news  JOIN sweetlife.author";
            $val = $conn->query($sql)->fetch_all(1);
           // var_dump($val);exit;
         ?>
<!--        將資料庫取出各欄位的值填入html-->
    <div class="container">
        <div class="blog-header">
            <img src="img/img/709622.jpg" class="lead" alt="產品圖" width="100%;" >

                <h1 class="blog-title"> <?php echo $val[0]["title"] ?> </h1>

            <p class="lead blog-description">作者名稱作者名稱</p>
        </div>

        <div class="row">

            <div class="col-sm-8 blog-main">
                <div class="blog-post">
                    <p class="blog-post-meta"><?php echo $val[0]["create_time"] ?> </p>

                    <?php echo $val[0]["contant"] ?>

                </div><!-- /.blog-post -->



                <nav>
                    <ul class="pager">
                        <li ><a href="#">Previous</a></li>
                        <li><a href="#">Next</a></li>
                    </ul>
                </nav>

            </div><!-- /.blog-main -->

            <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
                <div class="sidebar-module sidebar-module-inset">
                    <h4><?php  echo $val[0]["a_name"] ?></h4>
                    <p><?php echo $val[0]["intro"] ?></p>
                     </div>
                <div class="sidebar-module">
                    <h4>我們想推薦給你</h4>

                    <?php
                    include "../controller/db.php";
                    require "config.php";
                    $sql = "SELECT * FROM sweetlife.news WHERE category =3  LIMIT 5";
                    $val = $conn->query($sql)->fetch_all(1);
                    $id = $val[0]['id'];
                    $url = DOMAIN."SweetsLife/view/NewsInside.php?id=".$id;
//                    echo $url;exit;
                    foreach($val as $k =>$v){
                        ?>
                    <ol class="list-unstyled">
                        <li><a href="<?php echo $url; ?>"><?php echo $v['title'];?></a></li>
                    </ol>
                    <?php }?>
                </div>

            </div><!-- /.blog-sidebar -->

        </div><!-- /.row -->

    </div><!-- /.container -->

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