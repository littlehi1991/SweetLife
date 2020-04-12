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
        <main style="padding: 1%; ">
            <div style="padding: 0.5%; border: 1px black dotted;">
                <h2>新增商品</h2>
                <form method="POST" action="../controller/save_program.php" enctype="multipart/form-data">
                    請輸入專案名稱：
                    <input type="text" name="programname">
                    <hr/>
                    <a class="btn btn-primary" href="<?php echo DOMAIN.'SweetsLife/view/planinput.php';?>" role="button"style="float: right;">新增方案</a>
                    方案選擇：<br/>
                    <?php
                        include "../controller/db.php";
                        $sql = "SELECT * FROM sweetlife.plan";
                        $val = $conn->query($sql)->fetch_all(1);
                        foreach ($val as $k => $v){
        //                    var_dump($value);exit;?>
                            <input name="plan[]" type="checkbox"  value="<?php echo $v['id'];?>"><label><?php echo $v['name'];?></label><br/>
                        <?php } ?>
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