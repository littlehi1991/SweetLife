<?php
    $servername = "localhost:8889";
    $username = "root";
    $dbpw = "Hi0981951456";
    $dbname = "sweetlife";
    //創建連線

    $conn = new mysqli($servername, $username ,$dbpw, $dbname);

    //echo 123; exit;
    // 判斷連線模式
    if($conn->connect_error){
        die("連線失敗： ".$conn->connect_error);
    }
