<?php

// Change this to your connection info.
$DB_HOST = 'localhost';
$DB_USER = 'root';
$DB_PASS = '';
$DB_NAME = 'internet_point_establishment';

// Try and connect using the info above.
$mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
if ($mysqli->connect_errno) {
	// If there is an error with the connection, stop the script and display the error.
	die ('Failed to connect to MySQL: ' . $mysqli->connect_errno);
}

// Change character set to utf8
mysqli_set_charset($mysqli,"utf8");

// statement for deleting data 
if(isset($_GET['ID'])){
	$ID = $_GET['ID'];
$stmt = $mysqli->prepare('DELETE FROM employee WHERE EMP_ID = ? ');
$stmt->bind_param('i', $ID);
$stmt-> execute();

$message = "تم حذف الموظف بنجاح";
   echo"<script type='text/javascript'>
 window.location.href='admin_user_viewtb.php';
 alert('$message');</script>";
}
$stmt->close();

?>