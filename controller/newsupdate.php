<?php
    $updatsid = $_POST['page'];
    $active = $_POST['active'];
    $title = $_POST['title'];
    $type = $_POST['type'];
    $author = $_POST['author'];
    $img = $_FILES['file']['name'];
    $article = $_POST['article'];

    //  班圖片到指定資料夾
    $nimg = 'upload/'. $img;
    $nfile = $_FILES['file']['tmp_name'];
     move_uploaded_file($img , $nimg);


    include 'db.php';

    $sql = "UPDATE sweetlife.news SET title = '" . $title . "' , img = '" . $nimg . "'  , contant ='" . $article . "' , type ='" . $type . "' , author_id ='" . $author . "',  active = '" . $active . "'
            WHERE id  = '" . $updatsid . "'";

    $rs = $conn->query($sql);

    if ($rs) {
        echo "<script>alert('修改成功!');location.href='../view/newsadmin.php'</script>";
        //todo 錯誤處理
    }else{
        echo "<script>alert('更新失敗!');location.href='../view/newedit.php?id='.$id;</script>";
    }

    $conn->close();