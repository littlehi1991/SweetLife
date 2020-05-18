
<!--標題從這邊來-->
    <?php
    require "config.php";
    session_start();
    $userId = $_SESSION['email'];
    $cartNum = $_SESSION['orderlist'] ;
    include '../controller/db.php';
    $ssql = "SELECT username , type FROM sweetlife.member WHERE email = '" . $userId . "'";
    $vval = $conn->query($ssql)->fetch_all(1);
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
            <?php
                if(isset($userId)){
            ?>
            <a href="<?php echo DOMAIN . 'Sweetslife/view/cart.php'?>"><img src="img/cart.png" alt="購物車圖示" title="購物車圖示" width="35x;"></a>
            <?php } else {?>
            <a href="<?php echo DOMAIN . 'Sweetslife/view/login.php'?>"><img src="img/cart.png" alt="購物車圖示" title="購物車圖示" width="35x;"></a>
            <?php }
                if(!isset($cartNum)){

                } else {
                    echo count($cartNum).'&nbsp';
                    echo '<a href='. DOMAIN . "SweetsLife/controller/clearcart.php".'><span>清空<span></a>';
               }?>
        </div>
        <div>
            <?php
                 if( !isset($userId) ){
                     echo '<a href='. DOMAIN . "Sweetslife/view/login.php".'><img src="img/icon.png" alt="會員圖示" title="會員頭像" width="50px;"></a>';
                     echo '歡迎光臨';
                 } else {
                     switch ($vval[0]['type']) {
                         case '1':
                             echo '<a href=' . DOMAIN . "Sweetslife/view/member.php" . '><img src="img/icon.png" alt="會員圖示" title="會員頭像" width="50px;"></a>';
                             echo 'HI！' . $vval[0]['username'] . '，<a href =' . DOMAIN . "SweetsLife/controller/logout.php" . '>' . '登出' . '</a>';
                         break;
                         case '0':
                             echo '<a href=' . DOMAIN . "Sweetslife/view/memberadmin.php" . '><img src="img/icon.png" alt="會員圖示" title="會員頭像" width="50px;"></a>';
                             echo 'HI！' . $vval[0]['username'] . '，<a href =' . DOMAIN . "SweetsLife/controller/logout.php" . '>' . '登出' . '</a>';
                         break;
                     }
                 }?>
        </div>
    </nav>