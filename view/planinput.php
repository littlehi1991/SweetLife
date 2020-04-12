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
            <?php include "nav.php";?>
        </header>
        <h2>新增方案</h2>
        <form method="POST" action=" ../controller/creatplan.php">
            請輸入方案名稱：<input type="text" name="name">
            <hr/>
            請輸入份量：<input type="text" name="size" style="width:100px;">
            請輸入金額：<input type="text" name="price" style="width: 100px; ">
            <input type="submit" value="送出資料">
        </form>
    </body>
</html>