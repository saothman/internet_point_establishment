<?php 
  $db = mysqli_connect('localhost', 'root', '', 'internet_point_establishment');
  
  // Change character set to utf8
mysqli_set_charset($db,"utf8");

  if (isset($_POST['submit'])) {
  	$name = $_POST['name'];
	$ID = $_POST['ID'];
  	$email = $_POST['email'];
  	$entity = $_POST['entity'];
	$office_no = $_POST['office_no'];
  	$tele = $_POST['tele'];
	$type = $_POST['type'];

	// queries for checking each input
  	$sql_name = "SELECT * FROM employee WHERE EMP_NAME ='$name'";
  	$sql_ID = "SELECT * FROM employee WHERE EMP_ID ='$ID'";
	$sql_email = "SELECT * FROM employee WHERE EMP_EMAIL ='$email'";
  	$sql_entity = "SELECT * FROM employee WHERE ENTITY_ID ='$entity'";
	$sql_office = "SELECT * FROM employee WHERE EMP_OFFICE ='$office_no'";
  	$sql_tele = "SELECT * FROM employee WHERE EMP_TELE ='$tele'";
	
	// the result of each query
  	$res_name = mysqli_query($db, $sql_name);
  	$res_ID = mysqli_query($db, $sql_ID);
	$res_email = mysqli_query($db, $sql_email);
  	$res_entity = mysqli_query($db, $sql_entity);
	$res_office = mysqli_query($db, $sql_office);
  	$res_tele = mysqli_query($db, $sql_tele);

  	if (mysqli_num_rows($res_name) > 0) {
  	  $name_error = "عفوا.. الاسم مسجل مسبقا"; 	
  	}else if(mysqli_num_rows($res_ID) > 0){
  	  $ID_error = "عفوا.. الرقم الوظيفي مسجل مسبقا"; 	
  	}else if(mysqli_num_rows($res_email) > 0){
  	  $email_error = "عفوا.. البريد الالكتروني مسجل مسبقا"; 	
  	}else if(mysqli_num_rows($res_entity) > 0){
  	  $entity_error = "عفوا.. الجهة مسجلة مسبقا"; 	
  	}else if(mysqli_num_rows($res_office) > 0){
  	  $office_no_error = "عفوا.. رقم المكتب مسجل مسبقا"; 	
  	}else if(mysqli_num_rows($res_tele) > 0){
  	  $tele_error = "عفوا.. رقم التحويلة مسجل مسبقا"; 	
  	}else{
           $query = "INSERT INTO employee (EMP_ID, EMP_NAME, ENTITY_ID, EMP_OFFICE, EMP_TELE, EMP_EMAIL, TYPE) 
      	    	  VALUES ('$ID', '$name', '$entity', '$office_no', '$tele', '$email', '$type')";
           $results = mysqli_query($db, $query);
           $message = "تم إضافة المستخدم بنجاح.";
			echo "<script type='text/javascript'>
			window.location.href='admin_user_viewtb.php';
			alert('$message');</script>";
           exit();
  	}
  }
?>