<?php
    session_start();
    include 'db.php';
    $id = $_POST['id'];
    $pw = $_POST['pw'];

    $sql ="SELECT * FROM sweetlife.member WHERE email = '" . $id . "'";
    $val = $conn->query($sql) ->fetch_all(1);

    //判斷帳號與密碼是否為空白
    //以及MySQL資料庫裡是否有這個會員

    if($id != null && $pw != null && $val[0]['email']==$id && $val[0]['password']){
        //將帳號寫入session，方便驗證使用者身份
        $_SESSION['email'] = $id;
        echo '登入成功';
        echo '<meta http-equiv=REFRESH CONTENT=1;url=../view/member.php>';
    }
    else
    {
        echo '登入失敗!';
        echo '<meta http-equiv=REFRESH CONTENT=1;url=../view/index.php>';
    }



