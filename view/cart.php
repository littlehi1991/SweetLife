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
            <div aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">首頁</a></li>
                    <li class="breadcrumb-item active" aria-current="page">購物車清單</li>
                </ol>
            </div>
            <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
                <h1 class="display-4">購物車清單</h1>
                <p class="lead">請在此確認您的商品</p>
            </div>

            <div class="container">
                <div class="card-deck mb-3 text-center">
                    <?php
                    include "../controller/db.php";
                    require "config.php";
                    $sql= "SELECT * FROM sweetlife.program";
                    $val= $conn->query($sql)->fetch_all(1);
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
                                <div class="card-body">
                                    <form method="post" action="../controller/sessioncart.php">
                                        <input type="hidden" name="page" value="<?php echo $page;?>">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">餅乾淨重</label>
                                            <select  class="form-control" id="exampleFormControlSelect1" name="size">
                                                <?php
                                                foreach ($pval as $k => $v){?>
                                                    <option value="<?php echo $v['size'];?>" data-price="<?php echo $v['price'];?>"><?php echo $v['size'];?></option>
                                                <?php  }?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">配送期數</label>
                                            <select  class="form-control" id="exampleFormControlSelect2" name="period">
                                                <?php
                                                foreach ($pval as $k => $v){ ?>
                                                    <option value="<?php echo $v['period'];?>"><?php echo $v['period'];?></option>
                                                <?php }?>
                                            </select>
                                        </div>
                                        <div >共計<p class="show_price"></p><span>元</span></div>
                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1" >特別要求</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="others"></textarea>
                                        </div>
                                        <input type="submit" value="加入購物車">
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php }?>
                </div>
            </div>
        </main>
    </body>
    <footer class="blog-footer">
        <h5 style="text-align: center;">共計？？？元</h5>
        <p style="text-align: center;">
            <a href="#">前往結帳</a>
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