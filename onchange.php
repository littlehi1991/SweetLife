<?php

$items = [
    ['id' => 1, 'name' => 'product 01', 'price' => 100],
    ['id' => 2, 'name' => 'product 02', 'price' => 200],
    ['id' => 3, 'name' => 'product 03', 'price' => 300],
];
$quantity = 10;
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>onchange</title>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {
            replaceTotalPrice();
        });
        
        $(document).on('change', '#item', function() {
            replaceTotalPrice();
        });
        
        $(document).on('change', '#quantity', function () {
            replaceTotalPrice();
        });

        function replaceTotalPrice() {
            let price = $('#item :selected').attr('data-price');
            let id = $('#item').val();
            let quantity = $('#quantity').val();

            $('.show_price').html(price * quantity);
        }
    </script>
</head>
<body>
<div class="container" style="text-align: center;">
    <div class="container" style="width: 30%; height: 350px; border: 5px solid black; text-align: center; margin-top: 150px; border-radius: 2%;">
        <div class="form-group" style="margin-top: 10px;">
            <label for="item">商品</label>
            <select class="form-control" id="item">
                <?php foreach ($items as $k => $v) { ?>
                    <option value="<?= $v['id'] ?>" data-price="<?= $v['price'] ?>"><?= $v['name'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="quantity">數量</label>
            <select class="form-control" id="quantity">
                <?php for ($i = 1; $i <= $quantity; $i++) { ?>
                    <option value="<?= $i ?>"><?= $i ?></option>
                <?php } ?>
            </select>
        </div>
        <div style="margin-top: 50px;"><p class="show_price"></p></div>
        <div><button type="button" class="btn btn-primary">Submit</button></div>
    </div>
</div>
</body>
</html>