<?php
    session_start();
    $userid = $_SESSION['email'];
    $cartNum = $_SESSION['orderlist'] ;
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
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <!--        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>-->
    <script>
        // function getItemPrice(getPrice,id) {
        //     let price = $(getPrice).attr('class');
        //     let itemPrice = $(getPrice).find(':selected').attr('data-price');
        //     countItem(id , itemPrice);
        // }
        //
        // function getItemPeriod(getPeriod,id) {
        //     let period = $(getPeriod).attr('class');
        //     let itemPeriod = $(getPeriod).find(':selected').val();
        //     countItem(id , itemPeriod);
        // }
        function getId(id) {
            countItem(id);
        }

        function countItem(id) {
            let countPrice = $('.item_select_'+id).find(':selected').attr('data-price');
            let countPeriod = $('.period_select_'+id).find(':selected').val();
            $('.show_price_'+id).text(countPrice * countPeriod);
        }

    </script>
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
                $sql= "SELECT * FROM sweetlife.program ";
                $val= $conn -> query($sql) -> fetch_all(1);

                $psql = "SELECT * FROM sweetlife.plan";
                $pval = $conn -> query($psql) -> fetch_all(1);

                if(!isset($cartNum)){
                    echo "<script>alert('購物車內沒有商品!');history.back();</script>";
                }
                if(isset($cartNum)){
                    foreach ($val as $k0 => $v0){
                            foreach ($cartNum as $k => $v){
                                if((int)$v0['id']===(int)$v[0]){?>
                                        <div class="card mb-4 shadow-sm">
                                            <div class="card-header">
                                                <h4 class="my-0 font-weight-normal"><?php echo $v0['name'];?></h4>
                                            </div>
                                            <div class="card-body">
                                                <img src="<?php echo '../controller/' . $v0['main_img']; ?>" alt="產品文字" width="50%;">
                                                <form method="post" action="../controller/sessioncart.php">
                                                    <div class="form-group">
                                                        <label for="exampleFormControlSelect1">餅乾淨重</label>
                                                        <select onchange="getId(<?= $v0['id'] ?>)" class="form-control item_select_<?php echo $v0['id'];?>" id="item" name="size">
                                                            <?php
                                                                foreach ($pval as $k2 => $v2) {
                                                                    if ((int)$v[1] === (int)$v2['size']) { ?>
                                                                        <option value="<?php echo $v2['size']; ?>" data-price="<?php echo $v2['price']; ?>" selected><?php echo $v2['size']; ?></option>
                                                                    <?php } else { ?>
                                                                        <option value="<?php echo $v2['size']; ?>" data-price="<?php echo $v2['price']; ?>"><?php echo $v2['size']; ?></option>
                                                                    <?php }
                                                                }?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleFormControlSelect2">配送期數</label>
                                                        <select onchange="getId( <?= $v0['id'] ?>)" class="form-control period_select_<?php echo $v0['id'];?>" id="period" name="period">
                                                            <?php
                                                                foreach ($pval as $k2 => $v2){
                                                                    if((int)$v[2] === (int)$v2['period']){ ?>
                                                                        <option value="<?php echo $v2['period'];?>" selected><?php echo $v2['period'];?></option>
                                                                    <?php } else { ?>
                                                                        <option value="<?php echo $v2['period'];?>"><?php echo $v2['period'];?></option>
                                                        <?php           }
                                                                }?>
                                                        </select>
                                                    </div>
                                                    <div >方案金額$<p class="show_price_<?php echo $v0['id'];?>"><?php echo $v[4];?></p></div>
                                                    <div class="form-group">
                                                        <label for="exampleFormControlTextarea1" >特別要求</label>
                                                        <textarea class="form-control" id="exampleFormControlTextarea" rows="3" name="others"><?php echo $v[3];?></textarea>
                                                    </div>
                                                </form>
                                                <a href="<?php echo DOMAIN ."SweetsLife/view/programinside.php?id=".$v[0];?>"><button type="button" class="btn btn-primary" >查看商品</button></a>
                                                <a href="<?php echo DOMAIN ."SweetsLife/controller/removeCart.php?id=".$v[0];?>" onclick="return confirm('確定移除？')"><button type="button" class="btn btn btn-secondary">移除商品</button></a>
                                            </div>
                                        </div>
             <?php                   }

                            }
                    }
                } ?>
            </div>
        </main>
    </body>
    <footer class="blog-footer">
        <h5 class="totle_price" style="text-align: center;"></h5>元
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