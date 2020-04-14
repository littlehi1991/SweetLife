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
         <nav aria-label="breadcrumb">
             <ol class="breadcrumb">
                 <li class="breadcrumb-item"><a href="">首頁</a></li>
                 <li class="breadcrumb-item active" aria-current="page">Library</li>
             </ol>
         </nav>
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <?php
                            include "../controller/db.php";
                            require "config.php";
                            //取得指定頁次,判斷沒有GET資訊時要給1
                            $cur_page = (empty($_GET['page'])) ? 1 : (int)$_GET['page'];
                            $per_page = 2;//每頁幾筆資料

                            //計算有開啟閱覽的全部文章筆數
                            $totol_num = 'SELECT count(*) FROM sweetlife.news WHERE active=1';
                            $pages =  $conn ->query($totol_num)->fetch_all(1);
//
                            //全部有幾頁
                            $totol_page = ceil($pages[0]['count(*)']/ $per_page);
//
                            //每次要從總數量的文章筆數的第幾序位撈出幾筆資料
                            $sql = "SELECT * FROM sweetlife.news n 
                                    JOIN sweetlife.author a ON n.author_id = a.author_id 
                                    ORDER BY create_time DESC 
                                    LIMIT " .($cur_page - 1) * $per_page. ',' .$per_page;


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

                        <div class="card" style="width: 18rem;">
                            <a href="<?php echo DOMAIN . "SweetsLife/view/NewsInside.php?id=".$v['id'];?>" ><img src=<?php echo "../controller/".$v['img']?> class="card-img-top" alt="..."></a>
                            <span class="<?php echo $class;?>"><?php echo $cate; ?></span>
                            <div class="card-body">
                                <a href="<?php echo DOMAIN."Sweetslife/view/NewsInside.php?id=".$v['id'];?> "><h3 class="card-title"><?php echo $v['title'];?></h3></a>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><?php echo $v['a_name'];?></li>
                                <li class="list-group-item"><?php echo $v['create_time'];?></li>
                            </ul>
                            <div class="card-body">
                                <a href="<?php echo DOMAIN . "SweetsLife/view/NewsInside.php?id=".$v['id'];?>" class="card-link">閱讀全文</a>
                                <a href="<?php echo DOMAIN. "SweetsLife/view/newsadmin.php";?>" class="card-link">編輯</a>
                            </div>
                        </div>
                    </div>
                        <?php }?>
                </div>
            </div>
        <br>
         <div style="text-align:center;background-color:darkgray;width:100%;">
             <nav  aria-label="Page navigation example">
                 <ul class="pagination">
                     <li class="page-item">
                         <a class="page-link" href="<?php echo DOMAIN . "SweetsLife/view/newslist.php?page=".(($cur_page -1===0) ? 1 :$cur_page-1); ?>" aria-label="Previous">
                             <span aria-hidden="true">上一頁</span>
                         </a>
                     </li>
                     <?php
                        for($i=1 ; $i<=$totol_page ; $i++) {
                     ?>
                     <li class="page-item"><a class="page-link" href="<?php echo DOMAIN ."SweetsLife/view/newslist.php?page=".$i;?>"><?php echo $i;?></a></li>
                    <?php }?>
                     <li class="page-item">
                         <a class="page-link" href="<?php echo DOMAIN . "SweetsLife/view/newslist.php?page=".(($cur_page +1 >$totol_page ) ? $cur_page :$totol_page ) ;?>" aria-label="Next">
                             <span aria-hidden="true">下一頁</span>
                         </a>
                     </li>
                 </ul>
             </nav>
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