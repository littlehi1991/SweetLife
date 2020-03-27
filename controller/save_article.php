<?php
    $date = $_POST['date'];
    $articletitle = $_POST['articletitle'];
    $category= $_POST['category'];
    $author = $_POST['author_id'];
    $file = $_POST['file'];
    $ararticle = $_POST['article'];

  //var_dump($date);exit;
    include "../controller/db.php";

    $sql = "INSERT INTO sweetlife.news (create_time, title, category, author_id, img, contant) 
     VALUES  ('" . $date . "', '" . $articletitle . "', '" . $category . "', '" . $author . "', '" . $file . "', '" . $ararticle . "')";

    //echo $sql;exit;

    $rs = $conn->query($sql);

    if ($rs) {
        echo "<script>alert('新增成功!');location.href='../view/nwesinput.php';</script>";
        //todo 錯誤處理
    }else{
        echo "<script>alert('新增失敗!');location.href='../view/nwesinput.php';</script>";
    }

    $conn->close();