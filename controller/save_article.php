<?php
    $date = $_POST['date'];
    $articletitle = $_POST['articletitle'];
    $category= $_POST['category'];
    $author = $_POST['author'];
    $file = $_FILES['file']['name'];
    $ararticle = $_POST['article'];

    //搬移圖片至指定資料夾
    $dest = 'upload/' . $file;
    if (file_exists('upload/' . $file)){
        //todo img exist exception
        //echo '檔案已存在。<br/>';
    } else {
        $nfile = $_FILES['file']['tmp_name'];
        # 將檔案移至指定位置
        move_uploaded_file($nfile, $dest);
    }
   include "db.php";
    $sql = "INSERT INTO sweetlife.news (create_time, title, category, author_id, img, contant)
     VALUES  ('" . $date . "', '" . $articletitle . "', '" . $category . "', '" . $author . "', '" . $dest . "', '" . $ararticle . "')";

    //echo $sql;exit;
//
    $rs = $conn->query($sql);

    if ($rs) {
        echo "<script>alert('新增成功!');location.href='../view/nwesinput.php';</script>";
        //todo 錯誤處理
    }else{
        echo "<script>alert('新增失敗!');location.href='../view/nwesinput.php';</script>";
    }

    $conn->close();