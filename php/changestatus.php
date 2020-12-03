<?php
$connection =	mysqli_connect('localhost' , 'root' ,'' ,'internet_point_establishment');


// Change character set to utf8
mysqli_set_charset($connection,"utf8");


    $changeStatus=$_POST['selectFieldValue'];
    $id=$_POST['ord_Id'];

    $sql='UPDATE new_order SET STATUS="'.$changeStatus.'" WHERE ORDER_ID ="'.$id.'"';
	 $result = mysqli_query($connection, $sql);


?>
