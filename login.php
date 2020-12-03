<?php include('php/login_process.php'); ?>
<!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>إنشاء نقطة إنترنت</title>
		<link rel="icon" type="image/png" href="icons/ksu2.png"/>
		 <link rel="stylesheet" type="text/css" href="css/user-new-order.css">
		 
		 <style>
		 .logo {
    height: auto;
    margin: 10px 7px;
    display: block;
  margin-left: auto;
  margin-right: auto;
  width: 25%;
	
}
 .logo-text{
	 font-family: ge-dinar-one-medium;
	 align-items:center;
	 color:#0c8eca;
	 text-align:center;
	font-size:130%;
    margin-right: 10px;
 }
 form {

	  font-family: ge-dinar-one-medium;
	  text-align: right;
	  width: 50%;
	 margin: auto;
	 margin-top: 50px;
	 margin-bottom: 100px;
	 color:#0c8eca;
	 
	  
}
fieldset{
	 border-radius: 7px;
	 border-color: #0c8eca;
}
input {
  width: 50%;
  box-sizing: border-box;
  border: none;
  border-bottom:2px solid #ccc;
  font-size: 16px;
  background-color: white;
  background-position: 10px 10px; 
  background-repeat: no-repeat;
  padding: 12px 20px 12px 40px;
  margin:10px;
  -webkit-transition: width 0.4s ease-in-out;
  transition: width 0.4s ease-in-out;
  float:right;
  text-align:right;
  font-family: ge-dinar-one-medium;
}

input:focus {
  width: 96%;
  
}
input[type=submit] {
  font-family:ge-dinar-one-medium;
  background-color:  #0c8eca;
  color: white;
  padding: 12px 20px;
  border: 2px solid #0c8eca;
  border-radius: 7px;
  cursor: pointer;
  width:96%;
  margin-top: 10px;
  text-align:center;
}

input[type=submit]:hover {
  background-color: #fff;
  color:  #0c8eca;
  border: 2px solid #0c8eca;
  
}
.form_error span {
  float:right;
  height: 35px;
  margin: 3px auto;
  font-size: 1.0em;
  color: #D83D5A;
}
.form_error input {
  border: 1px solid #D83D5A;
}
		 </style>
		</head>
	<body>
	
		<div class="logo" style="">
			<img src="icons/ksu2.png" alt="جامعة الملك سعود" class="logo">
		</div>
		<div class="logo-text">
			
                  <h3>عمادة التعاملات الالكترونية والاتصالات</h3>
				  <h4>طلب نقطة</h4>
	    
		</div>
		 
		
		<form action="login.php" method="POST">
  <fieldset>
    <legend style="font-size:20px">تسجيل الدخول</legend>
		
		<div <?php if (isset($email_error)): ?> class="form_error" <?php endif ?> >
		<input type="text" name="email" placeholder="البريد الالكتروني" value="<?php echo (isset($email)) ? $email : ''; ?>" pattern="[a-z0-9._%+-]+@[a-z.-]+\.[a-z]{2,}$" title="البريد الالكتروني غير صحيح" required><br>
	   </div>
		
		<div <?php if (isset($ID_error)): ?> class="form_error" <?php endif ?> >
		<input type="text" name="ID" placeholder="الرقم الوظيفي" value="<?php echo (isset($ID)) ? $ID : ''; ?>" pattern="[0-9]{10}$" title="الرقم الوظيفي أكثر من 10" required><br>
	   </div>
		
		
		
		<input type="submit" name="submit" value="تسجيل">
		
	</fieldset>
	<div class="form_error">
	<?php if (isset($email_error)): ?>
	  	<span><?php echo $email_error; ?></span>
	  <?php endif ?>
	  
	  <?php if (isset($ID_error)): ?>
	  	<span><?php echo $ID_error; ?></span>
	  <?php endif ?>
	  <?php if (isset($error)): ?>
	  	<span><?php echo $error; ?></span>
	  <?php endif ?>
	  </div>
	</form>
	
	
<footer class="footer">
		
			<div>
				<a href="http://ksu.edu.sa">جامعة الملك سعود</a> © 2019 &nbsp;&nbsp; <br>
				 تصميم و تطوير : 				<a href="http://etc.ksu.edu.sa">عمادة التعاملات الإلكترونية و الاتصالات</a> &nbsp;&nbsp;
							</div>
		</div>
		</footer>

	</body>

</html>