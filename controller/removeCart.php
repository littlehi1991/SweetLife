<?php
session_start();
$pid = $_GET['id'];
$cartNum = $_SESSION['orderlist'] ;


foreach ($cartNum as $k => $v) {
    if ((int)$v[0] === (int)$pid) {
        unset($cartNum[$k]);
    }
}

$_SESSION['orderlist'] = $cartNum;


echo "<script>alert('已移除!');history.back();</script>";