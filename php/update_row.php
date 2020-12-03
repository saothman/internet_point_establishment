<?php
$connection =	mysqli_connect('localhost' , 'root' ,'' ,'internet_point_establishment');


// Change character set to utf8
mysqli_set_charset($connection,"utf8");


// trigger the updating button
if(isset($_POST['EMP_ID'])){
	
	$EMP_NAME = $_POST['EMP_NAME'];
	$EMP_ID = $_POST['EMP_ID'];
	$EMP_EMAIL = $_POST['EMP_EMAIL'];
	$EMP_OFFICE = $_POST['EMP_OFFICE'];
	$EMP_TELE = $_POST['EMP_TELE'];
	$ID = $_POST['ID'];

	//  query to update data 
	 
	$result  = mysqli_query($connection , "UPDATE employee SET EMP_ID ='$EMP_ID' , EMP_NAME ='$EMP_NAME'
	, EMP_OFFICE = '$EMP_OFFICE', EMP_TELE = '$EMP_TELE', EMP_EMAIL = '$EMP_EMAIL' WHERE ID ='$ID'");
	if($result){
		echo 'data updated';
	}

}
?>