<?php
    error_reporting(E_ALL);
    session_start();
    $pid = $_POST['page'];
    $size = $_POST['size'];
    $period = $_POST['period'];
    $others = $_POST['others'];

    $proarray = array($pid , $size , $period , $others );

    $chk = true;
    if(!empty($_SESSION['orderlist'])){
        foreach ($_SESSION['orderlist'] as $k => $v){
            if((int)$pid===$v['pid']){
                $chk = false;
                continue;
            }
        }
    }
    if($chk ===false){
        echo '此產品已存在於購物車';
        header( 'Location:' . "../view/programinside.php?id=".$pid);
    }

    $_SESSION['orderlist'][] = $proarray;
//    echo count($_SESSION['orderlist'][0]);exi t;

    if($proarray != null ) {
        echo '已加入購物車';
        header( 'Location:' . "../view/programinside.php?id=".$pid);
    }else{
        echo '加入失敗，請與客服人員聯絡';
    }