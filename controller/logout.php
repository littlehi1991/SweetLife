<?php
    error_reporting(E_ALL);
    session_start();

    unset($_SESSION['email']);
    echo '登出中...';
    echo '<meta http-equiv=REFRESH CONTENT=1;url=../view/index.php>';
    //    header('Location :' . DOMAIN . 'SweetsLife/view/index.php');

