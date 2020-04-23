<?php
    $id = $_POST['page'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pw = $_POST['pw'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $password = md5($pw);


    include 'db.php';
    $sql = "UPDATE sweetlife.member SET email = '" . $email . "' , username = '" . $name . "' , password = '" . $password . "' , phone = '" . $phone . "' , address = '" . $address . "' 
            WHERE id = '" . $id . "'";


    $rs = $conn->query($sql);

    if($rs){
        echo "<script> alert('修改成功'); location.href='../view/memberadmin.php'</script>";
    }else{
        echo "<script> alert('修改失敗'); location.href='../view/mamberadmin.php'</script>";
    }