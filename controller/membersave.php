<?php
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password =  $_POST['password'];
    $phont = $_POST['phone'];
    $address = $_POST['address'];


    //將密碼轉乘md5
    $dbpassword = md5($password);

    include 'db.php';
    $sql =  "INSERT INTO sweetlife.member (email , username , password , phone , address )
            VALUES ('" . $email .  "' , '" . $name . "' , '" . $dbpassword . "', '" . $phone . "' , '" . $address."')";
                echo $sql;eixt;

    $rs = $conn->query($sql);

    if ($rs) {
        echo "<script>alert('註冊成功!');location.href='../view/login.php';</script>";
        //todo 錯誤處理
    }else{
        echo "<script>alert('註冊失敗!');location.href='../view/sighup.php';</script>";
    }

    $conn->close();