<?php
    $id = $_POST['page'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];



    include 'db.php';
    $sql = "UPDATE sweetlife.member SET  username = '" . $name . "'  , phone = '" . $phone . "' , address = '" . $address . "' 
                WHERE id = '" . $id . "'";
    $rs = $conn->query($sql);

    if($rs){
        echo "<script> alert('修改成功'); location.href='../view/member.php'</script>";
    }else{
        echo "<script> alert('修改失敗'); location.href='../view/member.php'</script>";
    }