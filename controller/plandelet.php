<?php
    $id = $_GET['id'];

    include 'db.php';
    $sql = "DELETE FROM sweetlife.plan WHERE id = '" . $id . "' ";
    $rs = $conn ->query($sql);
    if ($rs) {
        echo "<script>alert('已刪除!');location.href='../view/programadmin.php'</script>";
        //todo 錯誤處理
    }else{
        echo "<script>alert('刪除失敗!');location.href='../view/programadmain.id='.$id;</script>";
    }

    $conn->close();