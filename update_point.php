<?php

 $db = mysqli_connect('localhost', 'root', '', 'internet_point_establishment');
  
  // Change character set to utf8
mysqli_set_charset($db,"utf8");


if(isset($_POST['update'])){
	
	$entity = $_POST['entity'];
	$point_no = $_POST['point_no'];
	
	$sql_entity = "SELECT * FROM MAX_POINT WHERE ENT_ID ='$entity'";
	
	$res_entity = mysqli_query($db, $sql_entity);

if (mysqli_num_rows($res_entity) > 0){

$sql_point = "UPDATE max_point SET MAX_POINT = '$point_no' WHERE ENT_ID = '$entity'";
$results = mysqli_query($db, $sql_point);

$message = "تم تحديث حد النقاط المسموح";
   echo"<script type='text/javascript'>
 window.location.href='admin_point.php';
 alert('$message');</script>";

}
else{
	$message = "عفوا.. يجب إضافة هذه الجهة أولا";
   echo"<script type='text/javascript'>
 window.location.href='admin_point.php';
 alert('$message');</script>";
}
}

?>