<html>
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <title>編輯文章</title>
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
                <li class="breadcrumb-item active" aria-current="page">文章編輯</li>
            </ol>
        </nav>

        <?php include 'navadmin.php';?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">文章編輯</h1>
            </div>
            <form method="POST" action="../controller/update_article.php" enctype="multipart/form-data" >
                <?php
                    $page = $_GET['id'];
                    include '../controller/db.php';
                    $sql = "SELECT n.id AS nid , title ,img ,contant , type , create_time , n.author_id AS naid , active , a.author_id AS aid , a_name , t.*  FROM sweetlife.news n 
                                JOIN sweetlife.author a ON n.author_id = a.author_id
                                JOIN sweetlife.type t ON n.type = t.id
                                WHERE n.id = '$page'";
                    $val =$conn->query($sql)->fetch_all(1);
                ?>
                文章上架日期：<?php echo $val[0]['create_time']?>
                <br/>
                狀態：
<!--                <input type="radio" name="action" value="Taipei"> 開啟-->
<!--                <input type="radio" name="action" value="Taoyuan">關閉<br>-->
                <?php
                    switch ($val[0]['active']){
                        case '1':
                            echo '<input type="radio" name="active" value="1" checked="true">開啟'.'&nbsp';
                            echo '<input type="radio" name="active" value="0">關閉';
                            break;
                        case '0':
                            echo '<input type="radio" name="active" value="1"">開啟';
                            echo '<input type="radio" name="active"  value="0" checked="true">關閉'.'&nbsp';
                            break;
                    }?>
                <br/>
                文章標題：<input type="text" name="title" style="width: 300px;" value="<?php echo $val[0]['title'];?>"><br>
                文章類別：

                <select name="type" style="height:30px; font-size: 14px;"/>
                    <?php
                        $thistype=$val[0]['type'];
                        $tsql = "SELECT * FROM sweetlife.type";
                        $tval = $conn ->query($tsql)->fetch_all(1);
                        foreach ($tval as $k => $v){
                            if($thistype = $v['id']){
                                var_dump($thistype);
                                var_dump($v['id']);
                                ?>
                                <option value="<?php echo $v['id'];?>" selected><?php echo $v['n_type'];?></option>
                            <?php }else{ ?>
                                <option value="<?php echo $v['id'];?>" <?php echo $v['n_type'];?> ></option>
                    <?php        }
                        }
                    ?>
                </select><br>
                作者：
                <select name="author" style="height:30px; font-size: 14px;"/>
                <option value=" "></option>

                </select><br>

                文章首圖：<input type="file" name="file" id="file" style="font-size: 16px;"><br />
                文章內容：<br/>
                <textarea  name="article" style="width:500px;height:300px;"><?php echo $val[0]['contant'];?></textarea>
                <br/>
                <br/>
                <input type="submit" value="送出文章" />
            </form>
        </main>
    </body>
</html>