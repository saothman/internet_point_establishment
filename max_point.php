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

// Now we check if the data was submitted, isset will check if the data exists.
if (!isset($_POST['entity'], $_POST['point_no'])) {
	// Could not get the data that should have been sent.
	 $message = "الرجاء تحديد الجهة وتحديد النقاط.\\nحاول مرة أخرى.";
	die ("<script type='text/javascript'>
 window.location.href='admin_point.php';
 alert('$message');</script>");
}


// Make sure the submitted  values are not empty.
if (empty($_POST['entity']) || empty($_POST['point_no'])) {
	// One or more values are empty...
	 $message = "الرجاء تحديد الجهة وتحديد النقاط.\\nحاول مرة أخرى.";
	die ("<script type='text/javascript'>
 window.location.href='admin_point.php';
 alert('$message');</script>");
}


// We need to check if the selected entity exists
if ($stmt = $mysqli->prepare('SELECT * FROM max_point WHERE ENT_ID = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), hash the password using the PHP password_hash function.
	$stmt->bind_param('i', $_POST['entity']);
	$stmt->execute(); 
	$stmt->store_result(); 
	// Store the result so we can check if the selected entity exists in the database.
	if ($stmt->num_rows > 0) {
		// entity already exists
		$message = "الجهة المختارة موجودة مسبقا.\\nحاول مرة أخرى.";
		echo "<script type='text/javascript'>
		window.location.href='admin_point.php';
		alert('$message');</script>";
		
	} else {
		// entity doesnt exists, insert new account
		if ($stmt = $mysqli->prepare('INSERT INTO max_point (ENT_ID, MAX_POINT) VALUES (?, ?)')) {
			
			$stmt->bind_param('ii', $_POST['entity'], $_POST['point_no']);
			$stmt->execute();
			$message = "تم تحديد النقاط المسموحة لهذه الجهة.";
			echo "<script type='text/javascript'>
			window.location.href='admin_point.php';
			alert('$message');</script>";
		} else {
			echo 'Could not prepare statement!';
		}
	}
	$stmt->close();
} else {
	echo 'Could not prepare statement!';
}
$mysqli->close();
?>