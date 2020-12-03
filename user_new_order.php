<?php include('php/ordering.php');

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
		<title>طلب جديد</title>
		<link rel="icon" type="image/png" href="icons/ksu2.png"/>
		 <link rel="stylesheet" type="text/css" href="css/user-new-order.css">
		<style>
		.input {
 font-family:ge-dinar-one-medium;
  width: 50%;
  padding: 8px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: 2px solid #ccc;
  -webkit-transition: 0.5s;
  transition: 0.5s;
  outline: none;
  border-radius: 7px;
  text-align: right;
}
.input:focus {
  border: 2px solid #0c8eca;
}
.form_error span {
  width: 80%;
  height: 35px;
  margin: 3px 25%;
  font-size: 1.0em;
  color: #D83D5A;
}
.form_error input {
  border: 1px solid #D83D5A;
}
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
		</style>
		</head>
	<body>
	<header>
		<div class="grid-container">
		    <div>
				<h2>عمادة التعاملات الالكترونية والاتصالات</h2>
				<h3>طلب جديد</h3>
			</div>
			<img src="icons/ksu2.png" alt="جامعة الملك سعود" class="site-logo">
			
			
		
				 
		</div>
	    
		</header>
			<div class="vertical-menu">
  <a href="user_home.php" >الرئيسية</a>
  <a class="click" href="user_new_order.php">طلب جديد</a>
  <a href="logout.php">تسجيل الخروج</a>
</div>

		<form id="form" action="user_new_order.php"method="POST">
  <fieldset>
    <legend>نموذج طلب جديد</legend>
	
	 <div <?php if (isset($ID_error)): ?> class="form_error" <?php endif ?> >
	 <input class="input" name="ID" type="text"  pattern="[0-9]{10}$" title="الرقم الوظيفي أكثر من 10" value="<?php echo(isset($ID)) ? $ID : ''; ?>" required>
   <label class="label" for="ID"> الرقم الوظيفي</label>
   <br>
	<?php if (isset($ID_error)): ?>
			<span><?php echo $ID_error; ?></span>
		  <?php endif ?>
	   </div>
	  
	<div <?php if (isset($floor_error)): ?> class="form_error" <?php endif ?> >  
  	 <select class="input"  name="floor"  class="form"  required >
	<option value="null">رقم الدور</option>
    <option >G-0</option>
    <option >F-1</option>
    <option >S-2</option>
    <option >T-3</option>
  </select>
 <label class="label" for="floor"> الدور</label> 
  <br>
  <?php if (isset($floor_error)): ?>
	  	<span><?php echo $floor_error; ?></span>
	  <?php endif ?>
   </div>
   
  <div <?php if (isset($office_no_error)): ?> class="form_error" <?php endif ?> >
   <input class="input"  name="office_no" type="text"  placeholder="Ex:20T24" pattern="([0-9]{1,2})+([A-Z]{1})+([0-9]{2,3})$" title="رقم المكتب غير صحيح"  value="<?php echo (isset($office_no)) ? $office_no : ''; ?>" required>
   <label class="label" for="office_no">  رقم المكتب</label>
   <br>
   <?php if (isset($office_no_error)): ?>
	  	<span><?php echo $office_no_error; ?></span>
	  <?php endif ?>
   </div>
   
   <div <?php if (isset($serial_no_error)): ?> class="form_error" <?php endif ?> >
 	<input class="input"  name="serial_no" type="text" placeholder="الملصق الموجود على الباب" pattern="[A-Z0-9\-]{3,6}" title="الرقم الهندسي غير صحيح" value="<?php echo (isset($serial_no)) ? $serial_no : ''; ?>" required>
   <label class="label" for="serial_no">الرقم الهندسي</label>
   <br>
	<?php if (isset($serial_no_error)): ?>
	  	<span><?php echo $serial_no_error; ?></span>
	  <?php endif ?>
   </div>
  
  <div <?php if (isset($point_no_error)): ?> class="form_error" <?php endif ?> >
  <input class="input" name="point_no" type="number" min="0" pattern="[0-9]{2}" value="<?php echo (isset($point_no)) ? $point_no : ''; ?>" required>
   <label class="label" for="point_no"> عدد النقاط المطلوبة</label>
     <br>
	 <?php if (isset($point_no_error)): ?>
	  	<span><?php echo $point_no_error; ?></span>
	  <?php endif ?>
   </div>
	<br>
      <label class="label" for="note">الملاحظات</label>
      <br>
      <textarea name="note" rows="2" cols="50" placeholder="ملاحظات حول الطلب" class="form " >
	  <?php echo(isset($note)) ? $note : ''; ?>
	  </textarea>
      <br>
        <fieldset>
       <legend>بيانات شخص آخر للتواصل</legend>
        
         <input class="input"  name="name" type="text" value="<?php echo(isset($name)) ? $name : ''; ?>">
       <label class="label" for="name">الاسم</label>
         <br>
        
         <input class="input"  name="tele" type="text" pattern="[0-9]{6}" title="رقم التحويلة أكثر من 6" value="<?php echo(isset($tele)) ? $tele : ''; ?>">
          <label class="label" for="tele">رقم التحويلة</label>
  </fieldset>
  </fieldset>
 
  <input type="submit" class="submit" name="submit" value="إنشاء">

</form>



		
		
		<div class="footer1">
				<a href="http://ksu.edu.sa">جامعة الملك سعود</a> © 2019 &nbsp;&nbsp; <br>
				 تصميم و تطوير : 				<a href="http://etc.ksu.edu.sa">عمادة التعاملات الإلكترونية و الاتصالات</a> &nbsp;&nbsp;
							</div>
		</div>
	
		
		
	</body>
</html>