<?php
    $id = $_GET['id'];

    include 'db.php';
    $sql = "DELETE FROM sweetlife.author WHERE author_id = '" . $id . "' ";
    $rs = $conn ->query($sql);

    if ($rs) {
    echo "<script>alert('已刪除!');location.href='../view/newsadmin.php'</script>";
        //todo 錯誤處理
    }else{
        echo "<script>alert('刪除失敗!');location.href='../view/newsadmin.id='.$id;</script>";
    }

    $conn->close();