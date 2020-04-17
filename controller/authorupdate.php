<?php
    $name = $_POST['name'];
    $intro = $_POST['intro'];
    $id = $_POST['page'];
    include 'db.php';

    $sql ="UPDATE sweetlife.author SET a_name = '" .$name. "' , intro = '". $intro ."' WHERE  author_id = '" . $id . "'";
    $rs =$conn->query($sql);


    if ($rs) {
        echo "<script>alert('修改成功!');location.href='../view/newsadmin.php'</script>";
        //todo 錯誤處理
    }else{
        echo "<script>alert('更新失敗!');location.href='../view/authoredit.php?id='.$id;</script>";
    }

    $conn->close();

