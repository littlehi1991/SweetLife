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
            <?php
            $page = $_GET['id'];
            include "../controller/db.php";
            $sql = "SELECT * FROM sweetlife.author WHERE author_id ='$page'";
            $val = $conn->query($sql)->fetch_all(1);
            ?>
            <form method="POST" action=" ../controller/authorupdate.php">
<!--                使用hidden的方式該頁id一同post近update的那隻程式中-->
                <input type="hidden" name="page" value="<?php echo $page;?>">
                請輸入作者名稱：<input type="text" name="name" value="<?php echo $val[0]['a_name'];?>">
                <br/><br/>
                請輸入作者敘述：<textarea type="'text"  name="intro"  style="width:200px;height:50px;"><?php echo $val[0]['intro']  ;?></textarea>
                <br><br>
                <input type="submit" value="送出資料">
                <button type="button" class="btn btn-link"onclick="history.back()" value="回到上一頁" ">回上頁</button>
            </form>
        </main>
    </body>
</html>