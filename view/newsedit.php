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
                請選擇上架日期：
                <?php
                    $page = $_GET['id'];
                    include '../controller/db.php';
                    $sql = "SELECT * FROM sweetlife.news n JOIN sweetlife.author a ON n.author_id = a.author_id WHERE n.id = '$page'";
                    $val =$conn->query($sql)->fetch_all(1);
                ?>
                <input name="date" type="date" placeholder="123456" >
                <br/>
                文章標題：<input type="text" name="articletitle" style="width: 300px;" placeholder="12345"><br>
                文章類別：
                <select name="category"style="height:30px; font-size: 14px;"/>
                <option value=""><?php echo $v['category']?></option>
                </select><br>

                作者：

                <select name="author" style="height:30px; font-size: 14px;"/>
                <option value=" "></option>

                </select><br>

                文章首圖：<input type="file" name="file" id="file" style="font-size: 16px;"><br />
                文章內容：<br/>
                <textarea  name="article" style="width:500px;height:300px;"></textarea>
                <br/>
                <br/>
                <input type="submit" value="送出文章" />
            </form>
        </main>
    </body>
</html>