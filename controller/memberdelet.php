<?php
    $id = $_GET['id'];

    include 'db.php';
    $sql = "DELETE  FROM sweetlife.member WHERE id = '" . $id . "' ";

    $rs = $conn->query($sql);
    if($rs){
        echo "<script>alert('已刪除');location.href='../view/memberadmin.php'</script>";
    }else{
        echo "<script>alert('刪除失敗！'); location.href='../view/memberadmin.php'</script>";
    }