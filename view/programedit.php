<html>
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <title>新增方案</title>
    </head>
    <body>
        <header>
            <?php include "nav.php";
            require "config.php";
            ?>
        </header>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">首頁</a></li>
                <li class="breadcrumb-item active" aria-current="page">修改商品頁</li>
            </ol>
        </nav>

        <?php include 'navadmin.php';?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">修改商品</h1>
            </div>
            <?php
                $page =$_GET['id'];
                include "../controller/db.php";
                $sql = "SELECT * FROM sweetlife.program WHERE id = '" . $page . "'";
                $val = $conn->query($sql)->fetch_all(1);
                $psql = "SELECT * FROM sweetlife.plan";
                $pval = $conn->query($psql)->fetch_all(1);
            ?>
            <div>
                <form method="POST" action="../controller/save_program.php" enctype="multipart/form-data">
                    <input type="hidden" name="page" value="<?php echo $page;?>">
                    請輸入專案名稱：
                    <input type="text" name="name" value="<?php echo $val[0]['name'];?>">
                    <hr/>
                    <a class="btn btn-primary" href="<?php echo DOMAIN.'SweetsLife/view/planinput.php';?>" role="button"style="float: right;">新增方案</a>
                    方案選擇：<br/>
                    <?php
                    $plan = json_decode($val[0]['plan_id']);
                    var_dump($plan);
                    foreach ($plan as $k => $v) {
                        foreach ($pval as $k1 => $v1) {
                            if ((int)$v === (int)$v1['id']) { ?>
                                <input name="plan[]" type="checkbox" value="<?php echo $v1['id']; ?>" checked>
                                <label><?php echo $v1['name']; ?></label><br/>
                            <?php } else { ?>
                                <input name="plan[]" type="checkbox" value="<?php echo $v1['id']; ?>">
                                <label><?php echo $v1['name']; ?></label><br/>
                            <?php }
                        }
                    }   ?>

                    <hr/>
                    專案首圖：
                    <input type="file" name="file_m" id="file_m" ><br/><br/>
                    專案主要敘述：
                    <textarea name="main_narr" style="width: 500px;"></textarea>
                    <hr>
                    專案圖片（一）：
                    <input type="file" name="file01" id="file02" ><br/><br/>
                    內文敘述（一）：
                    <textarea name="narr01" style="width: 500px;"></textarea>
                    <hr>
                    專案圖片（二）：
                    <input type="file" name="file02" id="file02" ><br/><br/>
                    內文敘述（二）：
                    <textarea name="narr02" style="width: 500px;"></textarea>
                    <hr>
                    請選擇文章開啟狀態狀態：
                    <input type="radio" name="status" value="1">開啟
                    <input type="radio" name="status" value="0">關閉
                    <hr/>
                    <input type="submit" value="新增產品專案" style="margin: 10px;">
                </form>
            </div>
        </main>
    </body>
</html>