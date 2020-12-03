<?php 
  $db = mysqli_connect('localhost', 'root', '', 'internet_point_establishment');
  
  // Change character set to utf8
mysqli_set_charset($db,"utf8");

  if (isset($_POST['submit'])) {
  	$email = $_POST['email'];
	$ID = $_POST['ID'];
	
	// queries for checking each input
  	$sql_email = "SELECT * FROM employee WHERE EMP_EMAIL ='$email'";
  	$sql_ID = "SELECT * FROM employee WHERE EMP_ID ='$ID'";
	$sql_type = "SELECT TYPE FROM employee WHERE EMP_EMAIL ='$email' AND EMP_ID = '$ID'";
	
	// the result of each query
  	$res_email = mysqli_query($db, $sql_email);
  	$res_ID = mysqli_query($db, $sql_ID);
	$res_type = mysqli_query($db, $sql_type);
	$row = mysqli_fetch_assoc($res_type);
	
	if (mysqli_num_rows($res_email) == 0) {
  	  $email_error = "عفوا.. البريد الالكتروني غير مسجل"; 	
  	}else if(mysqli_num_rows($res_ID) == 0){
  	  $ID_error = "عفوا.. الرقم الوظيفي غير مسجل"; 	
  	}else{
		session_start();
			  $_SESSION['loggedin'] = TRUE;
			  $_SESSION["EMP_ID"] = $ID;
			  $_SESSION["EMP_EMAIL"] = $email;
			  
			  if( $row['TYPE'] == 'مدير'){
				  header("Location:admin_home.php");
			  }elseif($row['TYPE'] == 'موظف مسؤول'){
				  header("Location:user_home.php");
				  exit();
			  }else{
				  $error ="عفوا.. البريد الالكتروني لا يطابق الرقم الوظيفي";
			  }
	}
  }	
?>