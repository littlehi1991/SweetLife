<?php
  $programname = $_POST['programname'];
  $plan = implode(“,”,$_POST[‘plan’]);
  $file_m = $_FILES['file_m']['name'];
  $m_narr = $_POST['main_narr'];
  $file01 = $_FILES['file01']['name'];
  $narr01 = $_POST['narr01'];
  $file02 = $_FILES['file02']['name'];
  $narr02 = $_POST['narr02'];
  $status = $_POST['status'];

  echo $programname;
  echo $plan;
  echo $file_m;
  echo $m_narr;
  echo $file01;
  echo $narr01;
  echo $file02;
  echo $narr02;
  echo $status;exit;

