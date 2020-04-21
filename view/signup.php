<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


        <title>精緻人生文章列表</title>
    </head>
    <body>
        <header>
            <?php include "nav.php"; ?>
        </header>
        <main>
            <div aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo DOMAIN .'SweetsLife/view/index.php';?>">首頁</a></li>
                    <li class="breadcrumb-item active" aria-current="page">註冊</li>
                </ol>
            </div>
            <div style="width: 35%; margin:0px auto;">
                <div class="text-center"  valign="center">
                    <form class="form-signin" style="width: 500px;">
                        <h2>會員註冊</h2>
                        <br/>
                        <div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">電子郵件</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="ex:123456@gmil.com">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">密碼</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="請輸入6~12位數中英混合密碼">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">確認密碼</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="請再輸入一次您的密碼">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress2">手機號碼</label>
                                <input type="text" class="form-control" id="inputAddress2" placeholder="0912123456">
                            </div>
                            <label for="inputAddress2">通訊地址</label>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <select id="inputState" class="form-control">
                                        <option selected>請選擇</option>
                                        <option>...</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <select id="inputState" class="form-control">
                                        <option selected>請選擇</option>
                                        <option>...</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-12">
                                    <input type="text" class="form-control" id="inputZip" placeholder="請輸入詳細地址">
                                </div>
                            </div>
                            <button class="btn btn-lg btn-primary btn-block" type="submit">註冊</button>
                        </div>
                    </form>
                </div>
            </div>
        </body>
        <footer class="text-muted">
            <div class="container">
                <!--            <p class="float-right">-->
                <!--                <a href="#">Back to top</a>-->
                <!--            </p>-->

            </div>
        </footer>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="/docs/4.4/assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="/docs/4.4/dist/js/bootstrap.bundle.min.js" integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm" crossorigin="anonymous"></script>
