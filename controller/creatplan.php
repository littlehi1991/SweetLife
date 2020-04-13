<?php
    include "db.php";

    $name = $_POST['name'];
    $size = $_POST['size'];
    $price = $_POST['price'];
    $period = $_POST['period'];


    $sql = "INSERT INTO sweetlife.plan( name , size , price , period )
            VALUES ('". $name ."','" .$size. "','".$price."','" . $period . "')";


    $rs = $conn->query($sql);

    //新增成功跳轉回前頁。失敗則回覆錯誤訊息
    if ($rs) {
        echo "<script>alert('新增成功!');location.href='../view/planinput.php';</script>";
        //todo 錯誤處理
    }else{
        echo "<script>alert('新增失敗!');location.href='../view/planinput.php';</script>";
    }

$conn->close();