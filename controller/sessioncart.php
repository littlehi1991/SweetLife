<?php
    error_reporting(E_ALL);
    session_start();
    $pid = $_POST['page'];
    $size = $_POST['size'];
    $period = $_POST['period'];
    $others = $_POST['others'];

    $proarray = array($pid , $size , $period , $others);
    $_SESSION['orderlist'] = $proarray;

    if($proarray != null) {
        echo '已加入購物車';
        header( 'Location:' . "../view/programinside.php?id=".$pid);
    }else{
        echo '加入失敗，請與客服人員聯絡';
    }