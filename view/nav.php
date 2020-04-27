
<!--標題從這邊來-->
    <?php
    require "config.php";
    session_start();
    $userid =$_SESSION['email'];
    ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="<?php echo DOMAIN."SweetsLife/view/index.php"?>">logo</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo DOMAIN."SweetsLife/view/newslist.php"?>">最新消息</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="<?php echo DOMAIN . "SweetsLife/view/programlist.php";?>" aria-disabled="true">手工甜點</a>
                </li>
            </ul>
        </div>
        <div>
            <a href="#"></a><img src="img/cart.png" alt="購物車圖示" title="購物車圖示" width="35x;"></a>
        </div>
        <div>
            <a href="<?php echo DOMAIN . "Sweetslife/view/login.php";?>"><img src="img/icon.png" alt="會員圖示" title="會員頭像" width="50px;"></a>
            <?php
                include '../controller/db.php';
                $sql = "SELECT username FROM sweetlife.member WHERE email = '" . $userid . "'";
                $val = $conn->query($sql)->fetch_all(1);
                 if( $userid != null ){
                     echo 'HI！'.$val[0]['username'].'，<a href =' . DOMAIN . "SweetsLife/controller/logout.php".'>'.'登出'.'</a>';
                 }else{
                     echo '歡迎光臨';
              } ?>
        </div>
    </nav>