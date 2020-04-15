<?php
    $dev === 'DEVELOP';
    if ($dev === 'DEVELOP') {
        error_reporting(E_ALL);
    }
   define("DOMAIN","http://localhost:8888/") ;
    $type= [
        1 => '活動',
        2 => '健康',
        3 => '食譜'
    ];

