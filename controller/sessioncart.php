<?php
    error_reporting(E_ALL);
    session_start();
    $pid = $_POST['page'];
    $size = $_POST['size'];
    $period = $_POST['period'];
    $others = $_POST['others'];

    $proarray = array($pid , $size , $period , $others );

    $chk = true;
    if(isset($_SESSION['orderlist'])){
       foreach ($_SESSION['orderlist'] as $k => $v){
           if((int)$pid === (int)$v[0]){
                $chk = false;
               continue;
           }
       }
    }

    if($chk === false){
        echo "<script>alert('此產品已存在於購物車!');history.back();</script>";
    } else {

        $_SESSION['orderlist'][] = $proarray;
        echo "<script>alert('已加入購物車!');history.back();</script>";

    }
