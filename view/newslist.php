<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <title>精緻人生文章列表</title>
    </head>
    <body>
        <header>
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
        </header>
        <div class="album py-5 bg-light">
            <div class="container">
                <?php
                //陣列取出指定的資料表欄位
                include "../controller/db.php";
                require "config.php";
                $sql = "SELECT * FROM sweetlife.news n JOIN sweetlife.author a ON n.author_id = a.author_id LIMIT 2";
                $val = $conn->query($sql)->fetch_all(1);
                //迴圈取出資料表內的鍵跟值
                foreach ($val as $k => $v){
                    $cate  = '' ;
                    $class = '' ;
                    switch($v['category']){
                        case '1':
                            $cate = "活動";
                            $class = "badge badge-danger";
                            break;
                        case '2':
                            $cate = "健康";
                            $class = "badge badge-success";
                            break;
                        default :
                            $cate = "食譜";
                            $class ="badge badge-warning";
                            break;
                    }
                    $val[$k]['category'] = $cate;
                ?>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                            <div style="width: ˇ30%;"><a href="#" title="title"><img src=<?php echo "../controller/".$v['img']?> alt="測試圖片"  width="350px" ></a></div>
                                <span class="<?php echo $class;?>"><?php echo $cate; ?></span>
<!--                                <span class="badge badge-success"> 健康</span>-->
<!--                                <span class="badge badge-warning"><食譜</span>-->

                            <a class="card-body">
                                <a href="#"><p class="card-text">文章標題標題</p></a>
                                <small class="text-muted">作者名稱</small><hr/>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">查看全文</button>
                                        <button type="button" class="btn btn-sm btn-outline-secondary">編輯</button>
                                    </div>
                                    <small class="text-muted">文章創立時間></small>
                                </div>
                            </div>
                        </div>
                <?php }?>
                    </div>


    </main>

    <footer class="text-muted">
        <div class="container">
<!--            <p class="float-right">-->
<!--                <a href="#">Back to top</a>-->
<!--            </p>-->

        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="/docs/4.4/assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="/docs/4.4/dist/js/bootstrap.bundle.min.js" integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm" crossorigin="anonymous"></script></body>