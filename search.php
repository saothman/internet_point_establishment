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
		<title>بحث الطلبات</title>
		<link rel="icon" type="image/png" href="icons/ksu2.png"/>
		<link rel="stylesheet" type="text/css" href="css/admin-home.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
		<style>
		.footer1 {
   position: static;
   left: 0;
   bottom: 0;
   width: 100%;
   text-align: center;
   font-family: ge-dinar-one-medium;
   font-size:15px;
   padding-bottom: 20px;
   padding-top: 20px;
   border-top: 1px solid #0c8eca;
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
				<h3>التقارير</h3>
			</div>
			<img src="icons/ksu2.png" alt="جامعة الملك سعود" class="site-logo">
			
			

				 
		</div>
	    
		</header>
			<div style="margin-bottom:5%;" class="vertical-menu">
  <a href="admin_home.php">الرئيسية</a>
  <a href="admin_orders.php">الطلبات</a>
  <a href="search.php" class="active">بحث الطلبات</a>
  <a href="admin_user_viewtb.php" >إدارة مستخدم </a>
  <a href="admin_point.php" >إدارة النقاط </a>
  <a href="logout.php">تسجيل الخروج</a>
</div>

 <div class="container">

   <div class="form-group">
    <div style="font-family: ge-dinar-one-medium;
		margin-top: 10px;
		margin-left: 5%;
		color:#0c8eca;" class="input-group">
     <span class=" input-group-addon">بحث</span>
     <input type="text" name="search_text" id="search_text" placeholder="ابحث هنا..." class="form-control" style="width:70%;" />
    </div>
   </div>
   <br />
   <div style="font-family: ge-dinar-one-medium;
		margin-top: 10px;
		margin-bottom: 10px;
		color:#0c8eca;" id="result"></div>
  </div>

			<div class="footer1">
				<a href="http://ksu.edu.sa">جامعة الملك سعود</a> © 2019 &nbsp;&nbsp; <br>
				 تصميم و تطوير : 				<a href="http://etc.ksu.edu.sa">عمادة التعاملات الإلكترونية و الاتصالات</a> &nbsp;&nbsp;
							</div>
		</div>
		</footer>
		
		
	</body>
</html>
<script>
$(document).ready(function(){

 $('#search_text').keyup(function(){
  var txt = $(this).val();
  if(txt != '')
  {
   $.ajax({
   url:"php/fetch.php",
   method:"POST",
   data:{search:txt},
   success:function(data)
   {
    $('#result').html(data);
   }
  });
 
  }
  else
  {
	 $('#result').html('');
  }
 });
});
</script>