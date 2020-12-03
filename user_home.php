<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: login.php');
	exit();
}
?>
<!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>الصفحة الرئيسية</title>
		<link rel="icon" type="image/png" href="icons/ksu2.png"/>
		<link rel="stylesheet" type="text/css" href="css/admin-home.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

		<style>
		.p{
	font-family: ge-dinar-one-medium;
	text-align:center;
	margin-top:5%;
	}
	.p2{
	font-family: ge-dinar-one-medium;
	text-align:center;
	margin-top:5px;
	}
	.table {
		font-family: ge-dinar-one-medium;
		border-collapse: collapse;
		width: 50%;
		margin-top: 20px;
		color:#0c8eca;
		}
		.table th{
		background-color:#0c8eca;
		color:#fff;
		padding: 10px;
		text-align: center;
		border-bottom: 1px solid #ddd;
		}
		td {
		padding: 10px;
		text-align: center;
		border-bottom: 1px solid #ddd;
		}
		 .modal_submit {
	font-family:ge-dinar-one-medium;
  background-color:  #0c8eca;
  color: white;
  padding: 6px 12px;
  border: 2px solid #0c8eca;
  border-radius: 7px;
  cursor: pointer;
  margin-top: 5px;
}

.modal_submit:hover {
  background-color: #fff;
  color:  #0c8eca;
  border: 2px solid #0c8eca;}
  .modal_label{
  font-family:ge-dinar-one-medium;
  float:right;
  text-align: right;
  color:#0c8eca;
  }

a:hover {
  text-decoration:none;
		</style>
		</head>
	<body>
	<header>
		<div class="grid-container">
		    <div>
				<h2>عمادة التعاملات الالكترونية والاتصالات</h2>
				<h3>طلباتي</h3>
			</div>
			<img src="icons/ksu2.png" alt="جامعة الملك سعود" class="site-logo">
			
			

				 
		</div>
	    
		</header>
			<div class="vertical-menu">
  <a class="active" href="user_home.php">الرئيسية</a>
  <a href="user_new_order.php">طلب جديد</a>
  <a href="logout.php">تسجيل الخروج</a>
</div>

<?php

$db = mysqli_connect('localhost', 'root', '', 'internet_point_establishment');
  
  // Change character set to utf8
mysqli_set_charset($db,"utf8");

// statement for displaying data to the employee
$session_id = $_SESSION['EMP_ID'];
$table = "SELECT * FROM new_order WHERE EMP_ID = '$session_id'";
$result= mysqli_query($db, $table);

$row = mysqli_num_rows($result); 

if($row == 0 ){
	echo" <p class='p'>لا يوجد طلبات حاليا</p> ";
}else{
	
$max = "SELECT MAX_POINT FROM max_point WHERE ENT_ID =(SELECT ENT_ID FROM new_order WHERE EMP_ID = '$session_id' LIMIT 1)";
$res_max = mysqli_query($db, $max);
$row = mysqli_fetch_assoc($res_max);
$max_row = 	$row['MAX_POINT'];

	echo"<p class='p2'> لديك $max_row نقطة محددة لهذه الجهة</p>";
	echo "<table class='table' style='margin-left: 18% ;'>";
	
	echo "<th>تفاصيل الطلب</th>";
	echo "<th>التاريخ</th>";
	echo "<th>رقم الطلب</th>";
	echo "<th>حالة الطلب</th>";
	while($row = mysqli_fetch_assoc($result)){ 
?>
	<tr>


	<td><input type="button" name="view" value="عرض" id="<?php echo $row["ORDER_ID"]; ?>" class="btn btn-info btn-xs view_data" /></td>
	
	<td><?php echo $row['DATE']; ?></td>
	<td><?php echo $row['ORDER_ID']; ?></td>
	<td><?php $status = $row['STATUS'];
			 $sql = "SELECT STATUS FROM new_order WHERE STATUS = '$status'";
			 $res_sql = mysqli_query($db, $sql);
			 $row = mysqli_fetch_assoc($res_sql); 
			 $stat =  $row['STATUS'];
			 if($stat == 'جديد'){
				 echo"<p class='btn btn-primary'>".$status."</p>";
			 }elseif($stat == 'تحت الدراسة'){
				 echo"<p class='btn btn-warning'>".$status."</p>";
			 }elseif ($stat == 'جاري الإنشاء'){
				 echo"<p class='btn btn-info'>".$status."</p>";
			 }elseif ($stat == 'تم التنفيذ'){
				 echo"<p class='btn btn-success'>".$status."</p>";
			 }
			 ?></td>


</tr>
<?php	}
echo "</table>"; 
}
?>


		<footer class="footer">
		
			<div>
				<a href="http://ksu.edu.sa">جامعة الملك سعود</a> © 2019 &nbsp;&nbsp; <br>
				 تصميم و تطوير : 				<a href="http://etc.ksu.edu.sa">عمادة التعاملات الإلكترونية و الاتصالات</a> &nbsp;&nbsp;
							</div>
		</div>
		</footer>

</html>
<div id="dataModal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <h4 class="modal-title" style="font-family: ge-dinar-one-medium;
						text-align:center;">تفاصيل الطلب</h4>  
				<button type="button" class="close" data-dismiss="modal">&times;</button>  
                </div>  
                <div class="modal-body" id="order_detail">  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="modal_submit" data-dismiss="modal">إغلاق</button>  
                </div>  
           </div>  
      </div>  
 </div>  
 <script>  
 $(document).ready(function(){  
      $('.view_data').click(function(){  
           var order_id = $(this).attr("id");  
           $.ajax({  
                url:"php/user_view_order.php",  
                method:"post",  
                data:{order_id:order_id},  
                success:function(data){  
                     $('#order_detail').html(data);  
                     $('#dataModal').modal("show");  
                }  
           });  
      });  
 });  
 </script>