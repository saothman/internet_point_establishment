<?php 
  $db = mysqli_connect('localhost', 'root', '', 'internet_point_establishment');
  
  // Change character set to utf8
mysqli_set_charset($db,"utf8");

	 

  if (isset($_POST['submit'])) {
	  
	  $ID = $_POST['ID'];
	  $floor = $_POST['floor'];
	  $office_no = $_POST['office_no'];
	  $serial_no = $_POST['serial_no'];
	  $point_no = $_POST['point_no'];
	  $note = $_POST['note'];
	  $name = $_POST['name'];
	  $tele = $_POST['tele'];
	  
	  
	  	// queries for checking each input
		$sql_ID = "SELECT * FROM employee WHERE EMP_ID ='$ID'";
		
		
		// continue queries
		$sql_office = "SELECT * FROM new_order WHERE ORDER_OFFICE ='$office_no'";
		$sql_serial = "SELECT * FROM new_order WHERE SERIAL_NO ='$serial_no'";
		$sql_max = "SELECT MAX_POINT FROM max_point WHERE ENT_ID =(SELECT ENTITY_ID FROM employee WHERE EMP_ID = '$ID')"; //max point num from max_point table
		$sql_sum = "SELECT sum(POINT_NO) as pointsum FROM new_order WHERE EMP_ID ='$ID'"; // sum previous point num from new_order table
		
		// the result of each query
		$res_ID = mysqli_query($db, $sql_ID);
		$res_office = mysqli_query($db, $sql_office);
		$res_serial = mysqli_query($db, $sql_serial);
		$res_max = mysqli_query($db, $sql_max);
		$res_sum = mysqli_query($db, $sql_sum);

		// fetching results for max and sum point queries
		$row = mysqli_fetch_assoc($res_sum); 
		$row2 = mysqli_fetch_assoc($res_max);
		
		// store the result of each
		$sql_total =  $row['pointsum'] + $point_no; // total point num ready for comparison
		$max_row = 	$row2['MAX_POINT'];	
		
		if (mysqli_num_rows($res_ID) == 0) {
  	  $ID_error = "عفوا.. الرقم الوظيفي غير مسجل"; 	
  	}else if(mysqli_num_rows($res_office) > 0){
	  $office_no_error = "عفوا.. رقم المكتب مسجل مسبقا";
	}else if(mysqli_num_rows($res_serial) > 0){
	  $serial_no_error = "عفوا.. الرقم الهندسي مسجل مسبقا";
	}else if($sql_total > $max_row){
	  $point_no_error = "عفوا.. لقد تجاوزت عدد النقاط المحدد لهذه الجهة";
	}else if($floor == 'null'){
		$floor_error = "عفوا.. ادخل رقم الدور المطلوب";
	}
	else{
		   $orderId = date("ymdhis");
		   $date = date("Y/m/d");
		   $status = "جديد";
           $query = "INSERT INTO new_order (DATE, ORDER_ID, EMP_ID, ENT_ID, FLOOR, ORDER_OFFICE, SERIAL_NO, POINT_NO, NOTE, OTHER_NAME, ORDER_TELE, STATUS ) 
      	    	  VALUES ('$date', '$orderId', '$ID', (SELECT ENTITY_ID FROM employee WHERE EMP_ID ='$ID') , '$floor', '$office_no', '$serial_no', '$point_no', '$note', '$name', '$tele', '$status')";
           $results = mysqli_query($db, $query);
           $message = "تم إرسال طلبك";
			echo "<script type='text/javascript'>
			window.location.href='user_home.php';
			alert('$message');</script>";
           exit();
  	}
		
  }
  
  ?>