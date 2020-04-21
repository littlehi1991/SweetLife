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
                <li class="breadcrumb-item active" aria-current="page">Library</li>
            </ol>
        </div>
         <div style="width: 35%; margin:0px auto;">
            <div class="text-center"  valign="center">
                <form class="form-signin" style="width: 500px;">
                    <img class="mb-4" src="/docs/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
                    <h1 class="h3 mb-3 font-weight-normal">會員登入</h1>
                    <br/>
                    <label for="inputEmail" class="sr-only">Email address</label>
                    <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                    <label for="inputPassword" class="sr-only">Password</label>
                    <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
                    <br/>
                    <div class="checkbox mb-3">
                        <label>
                            <input type="checkbox" value="remember-me"> 記住我
                        </label>
                    </div>
                    <button class="btn btn-lg btn-primary btn-block" type="submit">會員登入</button>
                    <br/>
                    <a href="<?php echo DOMAIN . 'SweetsLife/view/signup.php';?>" <p>還不是會員？</p></a>
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
    <script>window.jQuery || document.write('<script src="/docs/4.4/assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="/docs/4.4/dist/js/bootstrap.bundle.min.js" integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm" crossorigin="anonymous"></script></body>