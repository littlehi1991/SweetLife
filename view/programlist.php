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
        <main>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">首頁</a></li>
                    <li class="breadcrumb-item active" aria-current="page">商品列表</li>
                </ol>
            </nav>
            <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
                <h1 class="display-4">商品介紹文字</h1>
                <p class="lead">文字文字文字文字文字文字文字文字文字文字文字文字文字文字文字文字文字文字文字文字文字文字文字文字文字文字文字文字文字文字文字文字文字文字文字文字文字文字文字文字文字文字文字文字</p>
            </div>

            <div class="container">
                <div class="card-deck mb-3 text-center">
                    <?php
//                        include "../controller/db.php";
//                        require "config.php";
//                        $sql= "SELECT * FROM sweetlife.program";
//                        $val= $conn->query($sql)->fetch_all(1);
////                        var_dump($val);exit;
//                        var_dump($val[0]['plan_id']);exit;
//                        $php_plan = json_decode($val[0]['plan_id']);
//                        $arr_plan = implode(",",$php_plan);
////                        echo $arr_plan;exit;
//                        $p_sql = "SELECT * FROM sweetlife.plan WHERE id IN  ( $arr_plan )";
//                        echo $p_sql;exit;
//                    ?>
                    <div class="card mb-4 shadow-sm">
                        <div class="card-header">
                            <h4 class="my-0 font-weight-normal">SweetLife 經典包</h4>
                        </div>
                        <div class="card-body">
<!--                            <h1 class="card-title pricing-card-title">專案文字Ａ </h1>-->
                            <img src="img/S__52101127.jpg" alt="產品文字" width="80%;">
                            <ul class="list-unstyled mt-3 mb-4">
                                <li>容量：大/中/小</li>
                            </ul>
                            <button type="button" class="btn btn-lg btn-block btn-primary">查看更多</button>
                        </div>
                    </div>
                    <div class="card mb-4 shadow-sm">
                        <div class="card-header">
                            <h4 class="my-0 font-weight-normal">SweetLife 嚐鮮包</h4>
                        </div>
                        <div class="card-body">
<!--                            <h1 class="card-title pricing-card-title">專案文字Ｂ </h1>-->
                            <img src="img/S__52101127.jpg" alt="產品文字" width="80%;">
                            <ul class="list-unstyled mt-3 mb-4">
                                <li>容量：大/中/小</li>
                            </ul>
                            <button type="button" class="btn btn-lg btn-block btn-primary">查看更多</button>
                        </div>
                    </div>
                    <div class="card mb-4 shadow-sm">
                        <div class="card-header">
                            <h4 class="my-0 font-weight-normal">SweetLife 特別贈禮</h4>
                        </div>
                        <div class="card-body">
<!--                            <h1 class="card-title pricing-card-title">專案文字Ｃ</h1>-->
                            <img src="img/S__52101127.jpg" alt="產品文字" width="80%;">
                            <ul class="list-unstyled mt-3 mb-4">
                                <li>容量：大/中/小</li>
                            </ul>
                            <button type="button" class="btn btn-lg btn-block btn-primary">查看更多</button>
                        </div>
                    </div>
                </div>

            </div>
        </main>
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