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
            <?php include "nav.php";?>
        </header>
     <main>
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
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
                        <div class="card mb-4 shadow-sm">
                           <a href="<?php echo DOMAIN ."SweetsLife/view/NewsInside.php?id=".$v['id'];?>" title="title"><img src=<?php echo "../controller/".$v['img']?> alt="測試圖片"  width="300px" ></a>
                                <span class="<?php echo $class;?>"><?php echo $cate; ?></span>
<!--                                <span class="badge badge-success"> 健康</span>-->
<!--                                <span class="badge badge-warning"><食譜</span>-->

                            <a class="card-body">
                                <a href="<?php echo DOMAIN ."SweetsLife/view/NewsInside.php?id=".$v['id'];?>"><p class="card-text"><?PHP echo $v['title'];?></p>
                            </a>
                                <small class="text-muted"><?PHP echo $v['a_name'];?></small>
                                <hr/>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary" onclick="javascript:location.href='<?PHP echo DOMAIN . "SweetsLife/view/NewsInside.php?id=".$v['id']?>'">查看全文</button>
                                        <button type="button" class="btn btn-sm btn-outline-secondary">編輯</button>
                                    </div>
                                    <small class="text-muted"><?PHP echo $v['create_time'];?></small>
                                </div>

                        </div>
                    </div>
                        <?php }?>
                </div>
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