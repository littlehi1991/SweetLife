
<!--標題從這邊來-->
    <?php
    require "config.php";
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

        </div>
    </nav>