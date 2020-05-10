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
                        include "../controller/db.php";
                        require "config.php";
                        $sql= "SELECT * FROM sweetlife.program";
                        $val= $conn->query($sql)->fetch_all(1);

//                        unset($val[0]);
//                        unset($val[1]);

                        $psql = "SELECT * FROM sweetlife.plan";
                        $pval = $conn->query($psql)->fetch_all(1);
                        foreach ($val as $k => $v){
                            $plan = json_decode($v['plan_id']);
                            ?>
                                <div class="card mb-4 shadow-sm">
                                <div class="card-header">
                                    <h4 class="my-0 font-weight-normal"><?php echo $v['name']; ?></h4>
                                </div>
                                <div class="card-body">
                                <img src="<?php echo '../controller/' . $v['main_img']; ?>" alt="產品文字" width="80%;">
                                <ul class="list-unstyled mt-3 mb-4">
                                    <?php
                                    //.= 字串相加，將foreach出來的值用字串相加後丟入變數中
                                    $size = '';
                                    $period = '';
                                    foreach ($plan as $k2 => $v2) {
                                        foreach ($pval as $kk => $vv ) {
                                            if ((int)$v2 ===(int)$vv['id'] ){
                                                $size .= $pval[$kk]['size'] . '/';
                                                $period .= $pval[$kk]['period'] . '/';
                                            }
                                        }
                                    }
                                    ?>
                                <li>容量<br/>
                                    <?php echo rtrim($size, "/") ;?>
                                </li>
                                <li>期數：<br/>
                                    <?php echo rtrim($period,'/');?>
                                </li>
                                </ul>
                                <a href="<?php echo DOMAIN ."SweetsLife/view/programinside.php?id=".$v['id'];?>"><button type="button" class="btn btn-lg btn-block btn-primary">查看更多</button></a>
                            </div>
                        </div>
                        <?php }?>
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