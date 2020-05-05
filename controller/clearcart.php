<?php
    error_reporting(E_ALL);
    session_start();

    unset($_SESSION['orderlist']);
    echo "<script>alert('已清空購物車!');history.back();</script>";
