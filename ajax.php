<?php

$id = $_POST['id'];
$col = $_POST['col'];
$val = $_POST['val'];

//todo DB 操作
// query = xxx
if (empty($id) or empty($col) or empty($val)) {
    echo json_encode(['status' => false, 'data' => []]);
    exit;
}

echo json_encode(['status' => true, 'data' => ['id' => $id, 'col' => $col, 'val' => $val]]);