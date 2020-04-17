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
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">首頁</a></li>
                <li class="breadcrumb-item active" aria-current="page">方案編輯頁</li>
            </ol>
        </nav>
        <?php include 'navadmin.php';?>
        <main style="margin: 2%;">
            <?php
            $page = $_GET['id'];
            include '../controller/db.php';
            $sql = "SELECT * FROM sweetlife.plan WHERE id = '".$page ."'";
            $val = $conn->query($sql)->fetch_all(1);
            ?>
            <h2>修改方案</h2>
            <form method="POST" action=" ../controller/updateplan.php">
                <input type="hidden" name="page" value="<?php echo $page;?>">
                方案名稱：<input type="text" name="name" value="<?php echo $val[0]['name'];?>">
                <hr/>
                份量：<input type="text" name="size" style="width:100px;" value="<?php echo $val[0]['size'];?>">g<br/><br/>
                期數：共
                <select name="period">
                    <?php $arr =array(1,3,4,6,12);//寫死的固定期數，option回圈產出
                    foreach ($arr as $k =>$v){
                        if((int)$val[0]['period'] === (int)$v) {?>
                            <option value="<?php echo $v; ?>" selected><?php echo $v; ?></option>
                            <?php }else{?>
                            <option option value="<?php echo $v; ?>" ><?php echo $v; ?></option>
                            <?php
                        }
                    } ?>
                </select>期<br><br/>
                每期金額：<input type="text" name="price" style="width: 100px; " value="<?php echo $val[0]['price'];?>">元<br/><br/>
                <input type="submit" value="送出資料">
            </form>
        </main>
    </body>
</html>