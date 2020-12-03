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
		 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
		<style>
		.div{
	font-family: ge-dinar-one-medium;
	text-align:center;
	margin-top:5%;
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
				<h3>الرئيسية</h3>
			</div>
			<img src="icons/ksu2.png" alt="جامعة الملك سعود" class="site-logo">
			
			

				 
		</div>
	    
		</header>
			<div class="vertical-menu">
  <a href="admin_home.php" class="active">الرئيسية</a>
  <a href="admin_orders.php">الطلبات</a>
  <a href="search.php">بحث الطلبات</a>
  <a href="admin_user_viewtb.php" >إدارة مستخدم </a>
  <a href="admin_point.php" >إدارة النقاط </a>
  <a href="logout.php">تسجيل الخروج</a>
</div>

	<?php

$db = mysqli_connect('localhost', 'root', '', 'internet_point_establishment');
  
  // Change character set to utf8
mysqli_set_charset($db,"utf8");
$new = "جديد";
$checking ="تحت الدراسة";
$processing = "جاري الإنشاء";
$done = "تم التنفيذ";

//runing queries
$sql_new = "SELECT * FROM new_order WHERE STATUS = '$new'";
$sql_checking = "SELECT * FROM new_order WHERE STATUS = '$checking'";
$sql_processing = "SELECT * FROM new_order WHERE STATUS = '$processing'";
$sql_done = "SELECT * FROM new_order WHERE STATUS = '$done'";

// results
$res_new= mysqli_query($db, $sql_new);
$res_checking= mysqli_query($db, $sql_checking);
$res_processing= mysqli_query($db, $sql_processing);
$res_done= mysqli_query($db, $sql_done);

// fetching num of rows
$new_row = mysqli_num_rows($res_new);
$checking_row = mysqli_num_rows($res_checking);
$processing_row = mysqli_num_rows($res_processing);
$done_row = mysqli_num_rows($res_done);

?>

<div class="div">
<p class="btn btn-success">
<span class="badge"><?php echo $done_row; ?></span>
تم التنفيذ</p>
<p class="btn btn-primary">
<span class="badge"><?php echo $new_row; ?></span>
جديد</p>
<p class="btn btn-warning">
<span class="badge"><?php echo $checking_row; ?></span>
تحت الدراسة</p>
<p class="btn btn-info"> 
<span class="badge"><?php echo $processing_row; ?></span>
جاري الإنشاء</p>
</div>

		<footer class="footer">
		
			<div>
				<a href="http://ksu.edu.sa">جامعة الملك سعود</a> © 2019 &nbsp;&nbsp; <br>
				 تصميم و تطوير : 				<a href="http://etc.ksu.edu.sa">عمادة التعاملات الإلكترونية و الاتصالات</a> &nbsp;&nbsp;
							</div>
		</div>
		</footer>
		
		
	</body>
</html>