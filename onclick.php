<?php

$item = [];
for ($i = 1; $i <= 10; $i++) {
    $item[] = [
        'id' => $i,
        'name' => 'name_' . str_pad($i, 2, '0', STR_PAD_LEFT),
        'des' => 'des_' . str_pad($i, 2, '0', STR_PAD_LEFT)
    ];
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>onclick</title>
    <script src="https://code.jquery.com/jquery-3.5.0.js" integrity="sha256-r/AaFHrszJtwpe+tHyNi/XCfMxYpbsRg2Uqn0x3s2zc=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script>
        $(document).on('click', '.table_body tr td', function () {
            if ($(this).attr('class') !== 'id') {
                $('.light_box').css('display', 'block');
                let text = $(this).html();
                let col = $(this).attr('class');
                let id = $(this).parent().find('td:first-child').html();
                showLightBox(id, text, col);
            }
        });
        
        function showLightBox(id, text, col) {
            let html = '<input type="text" class="data form-control" name="'+col+'" value="'+text+'" style="margin-top: 20px;"><input class="update_id" type="hidden" value="'+id+'">';
            $('.form_object').html(html);
        }

        function cancelLightBox() {
            $('.light_box').css('display', 'none');
        }

        function sendRequest() {
            let id = $('.update_id').val();
            let col = $('.data').attr('name');
            let val = $('.data').val();
            
            $.ajax({
                type: 'POST',
                dataType: 'JSON',
                url: 'ajax.php',
                data: {id: id, col: col, val: val}, // {欄位: 值}
                success: function (kakuya) {
                    alert(kakuya['status']);
                    cancelLightBox();
                }
            });
        }
    </script>
</head>
<body>
    <div class="light_box" style="width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5); z-index: 9999; position: absolute; left: 0; top: 0; display: none;">
        <div class="light_box_content" style="width: 40%; height: 200px; background-color: white; position: relative; left: 30%; top: 20%; text-align: center; padding-top: 30px; padding-left: 5%;">
            <div class="form_object" style="width: 80%;">

            </div>
            <div class="buttons" style="text-align: center; margin-top: 20px;">
                <button type="button" class="btn btn-primary" onclick="sendRequest()">submit</button>
                <button type="button" class="btn btn-secondary" onclick="cancelLightBox();">cancel</button>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="container">
            <table class="table table-bordered" style="margin-top: 150px;">
                <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">name</th>
                    <th scope="col">des</th>
                </tr>
                </thead>
                <tbody class="table_body">
                    <?php foreach($item as $k => $v) { ?>
                        <tr>
                            <td class="id"><?= $v['id'] ?></td>
                            <td class="name"><?= $v['name'] ?></td>
                            <td class="des"><?= $v['des'] ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>