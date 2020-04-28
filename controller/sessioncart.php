<?php
    error_reporting(E_ALL);
    session_start();
    $userid = $_SESSION['email'];
    $pid = $_POST['page'];
    $size = $_POST['size'];
    $period = $_POST['period'];
    $others = $_POST['others'];

    $proarray = array($pid , $size , $period , $others);
    $_SESSION['orderlist'] = $proarray;
    var_dump($proarray);
