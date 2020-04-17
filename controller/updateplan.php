<?php
    $id = $_POST['page'];
    $name = $_POST['name'];
    $size = $_POST['size'];
    $period = $_POST['period'];
    $price = $_POST['price'];

    include 'db.php';
    $sql = "UPDATE sweetlife.plan SET name = '" . $name . "', size ='" . $size . "' , period = '" . $period . "' , price = '" . $price . "'
    WHERE id = '" . $id . "'";
//    echo $sql;exit;
    $rs = $conn->query($sql);

    if ($rs) {
        echo "<script>alert('修改成功!');location.href='../view/programadmin.php'</script>";
        //todo 錯誤處理
    }else{
        echo "<script>alert('更新失敗!');location.href='../view/programedit.php?id='.$id;</script>";
    }

    $conn->close();