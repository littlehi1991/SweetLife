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
                <li class="breadcrumb-item " ><a href="#">商品列表</li></a>
                <li class="breadcrumb-item " ><a href="#"></a> 商品明細</li></a>
            </ol>
        </nav>
        <body>
            <?php
                $page = $_GET['id'];
                include '../controller/db.php';
                require 'config.php';
                $sql = "SELECT * FROM sweetlife.program WHERE id IN ('$page')";
                $val = $conn ->query($sql)->fetch_all(1);
                $plan = json_decode($val[0]['plan_id']);
                $plann = implode(',',$plan);
                $psql = "SELECT * FROM sweetlife.plan WHERE id IN ($plann)";
                $pval = $conn->query($psql)->fetch_all(1);
            ?>
            <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
                    <div class="col-md-5 p-lg-5 mx-auto my-5">
                        <h1 class="display-4 font-weight-normal"><?php echo $val[0]['name'];?></h1>
                        <p class="lead font-weight-normal"><?php echo $val[0]['main_narr'];?>.</p>
                        <div class="accordion" id="accordionExample">
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                           選擇方案內容
                                        </button>
                                    </h2>
                                </div>

                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                    <div class="card-body">
                                    <form>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">盒子尺寸</label>
                                            <select class="form-control" id="exampleFormControlSelect1">
                                                <?php
                                                foreach ($pval as $k => $v){
                                               ?>
                                                <option><?php echo $v['size'];?></option>
                                                <?php  }?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">配送期數</label>
                                            <select class="form-control" id="exampleFormControlSelect1">
                                                <?php
                                                foreach ($pval as $k => $v){ ?>
                                                    <option><?php echo $v['period'];?></option>
                                                <?php }?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">特別要求</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                        </div>
                                        <small class="text-muted">共計金額？？？元</small>
                                        <hr/>
                                        <input type="submit" value="前往結帳"/>
                                    </form>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="product-device shadow-sm d-none d-md-block"></div>
                    <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
            </div>
        <div style=" padding-left: 5%;">

            <hr class="featurette-divider">

            <div class="row featurette">
                <div class="col-md-7 order-md-2">
                    <h2 class="featurette-heading">文字文字文字文字 </h2>
                    <p class="lead"><?php echo $val[0]['narr_02'];?></p>
            </div>
                <div class="col-md-5 order-md-1">
                    <img src="<?php echo '../controller/'.$val[0]['img_01'];?>" class="lead" alt="產品圖" width="80%;" >
                </div>
            </div>

            <hr class="featurette-divider">

            <div class="row featurette">
                <div class="col-md-7">
                    <h2 class="featurette-heading">And lastly, this one. <span class="text-muted">Checkmate.</span></h2>
                    <p class="lead"><?php echo $val[0]['narr_02'];?>></php>
                </div>
                <div class="col-md-5">
                    <img src="<?php echo '../controller/'.$val[0]['img_02'];?>" class="lead" alt="產品圖" width="80%;" >
                </div>
            </div>
        </div>
        </body>
    </main>
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