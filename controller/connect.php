<?php
error_reporting(E_ALL);
    session_start();
    include 'db.php';
    require '../view/config.php';
    $id = $_POST['id'];


    $sql ="SELECT * FROM sweetlife.member WHERE email = '" . $id . "' AND password  = '" . md5($_POST['pw']) . "'";
    $val = $conn->query($sql) ->fetch_all(1);

    //判斷帳號與密碼是否為空白
    //以及MySQL資料庫裡是否有這個會員

        if($id != null && md5($_POST['pw']) != null && $val[0]['email']==$id && $val[0]['password'] == md5($_POST['pw'])){
            //將帳號寫入session，方便驗證使用者身份
            if ((int)$val[0]['type']===0){
                echo '登入成功';
                $_SESSION['email'] = $val[0]['email'] ;
                header( 'Location:' . DOMAIN . "SweetsLife/view/memberadmin.php?id=".$val[0]['id']);
            }else{
                echo '登入成功';
                $_SESSION['email'] = $val[0]['email'] ;
                header( 'Location:' . DOMAIN . "SweetsLife/view/member.php?id=".$val[0]['id']);
            }

            die();
        } else {
            echo '登入失敗!';
            header('Location :' . DOMAIN . 'SweetsLife/view/index.php');
            die();;
        }



