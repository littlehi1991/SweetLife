<?php
  $programname = $_POST['programname'];
  $plan = $_POST['plan'];
  $file_m = $_FILES['file_m']['name'];
  $m_narr = $_POST['main_narr'];
  $file01 = $_FILES['file01']['name'];
  $narr01 = $_POST['narr01'];
  $file02 = $_FILES['file02']['name'];
  $narr02 = $_POST['narr02'];
  $status = $_POST['status'];

//  處理圖片  將指定圖片轉存去同階層的資料夾並將路徑存為變數
    $img_m = 'upload/' . $file_m;
    $img_01 = 'upload/' . $file01;
    $img_02 = 'upload/' . $file02;

    $nimg_m = $_FILES['file_m']['tmp_name'];
    $nimg_01 = $_FILES['file01']['tmp_name'];
    $nimg_02 = $_FILES['file02']['tmp_name'];

    move_uploaded_file($nimg_m , $img_m);
    move_uploaded_file($nimg_01 , $img_01);
    move_uploaded_file($nimg_02, $img_02);

//    將陣列轉成json格式存入資料庫
    $json_plan = json_encode($plan);

    //將接到的值寫入資料庫
    include "db.php";
    $sql = "INSERT INTO sweetlife.program (name , plan_id , main_narr , main_img ,img_01 ,narr_01 , img_02 , narr_02 , status) 
            VALUES ('" . $programname ."', '" . $json_plan . "' , '" . $m_narr . "' , '" . $img_m . "' , '" . $img_01 . "' , '".$narr01 ."' , '" . $img_02 . "' , '" . $narr02 . "' , '". $status."')";
    $rs = $conn ->query($sql);

    if ($rs) {
        echo "<script>alert('新增成功!');location.href='../view/programinput.php';</script>";
        //todo 錯誤處理
    }else{
        echo "<script>alert('新增失敗!');location.href='../view/programinput.php';</script>";
    }
    $conn->close();




