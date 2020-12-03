
	<?php
	// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: login.php');
	exit();
}
    try{
        $sqlconnection = new pdo('mysql:host=localhost;dbname=internet_point_establishment;charset=utf8','root','');

        }   
    catch(PDOException $pe){
        echo 'Cannot connect to database';
        die;
    }
?>

	
<!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge; charset=utf8">
		<title>إدارة مستخدم</title>
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
	.form-radio
{
     -webkit-appearance: none;
     -moz-appearance: none;
     appearance: none;
     display: inline-block;
     position: relative;
     background-color: #f1f1f1;
     color: #666;
     top: 10px;
     height: 30px;
     width: 30px;
     border: 0;
     border-radius: 50px;
     cursor: pointer;     
     margin-right: 7px;
     outline: none;
}
.form-radio:checked::before
{
     position: absolute;
     font: 13px/1 'Open Sans', sans-serif;
     left: 11px;
     top: 7px;
     content: '\02143';
     transform: rotate(40deg);
}
.form-radio:hover
{
     background-color: #f7f7f7;
}
.form-radio:checked
{
     background-color: #f1f1f1;
}


		 </style>
		</head>
	<body>
	<header>
		<div class="grid-container">
		    <div>
				<h2>عمادة التعاملات الالكترونية والاتصالات</h2>
				<h3>تسجيل مستخدم جديد</h3>
			</div>
			<img src="icons/ksu2.png" alt="جامعة الملك سعود" class="site-logo">
			
			
		
				 
		</div>
	    
		</header>
			<div class="vertical-menu">
  <a >الرئيسية</a>
  <a href="#">الطلبات</a>
  <a href="#">التقارير</a>
  <a class="click" href="admin_user_viewtb.php" >إدارة مستخدم </a>
  <a href="admin_point.php" >إدارة النقاط </a>
  <a href="#">تسجيل الخروج</a>
</div>

	<?php include('php/register.php');?>
		<form method="POST" accept-charset="utf-8" id="form" action="admin_register_form.php">
				
  <fieldset>
    <legend>نموذج التسجيل</legend>
		
		<div <?php if (isset($name_error)): ?> class="form_error" <?php endif ?> >
        <input class="input" name="name" type="text" value="<?php echo (isset($name)) ? $name : ''; ?>" required>
       <label class="label" for="name">الاسم</label>
	   <br>
	   	<?php if (isset($name_error)): ?>
	  	<span><?php echo $name_error; ?></span>
	  <?php endif ?>
		
	   </div>
	   
         
		 <div <?php if (isset($ID_error)): ?> class="form_error" <?php endif ?> >
		 	<input class="input" name="ID"  type="text" value="<?php echo(isset($ID)) ? $ID : ''; ?>"
			 pattern="[0-9]{10}$" title="الرقم الوظيفي أكثر من 10" required>
       <label class="label" for="ID">الرقم الوظيفي</label>
	   <br>
	   <?php if (isset($ID_error)): ?>
			<span><?php echo $ID_error; ?></span>
		  <?php endif ?>
	   </div>
	   
		 
		  <div <?php if (isset($email_error)): ?> class="form_error" <?php endif ?> >
        <input class="input" type="email" name="email" value="<?php echo (isset($email)) ? $email : ''; ?>"
			pattern="[a-z0-9._%+-]+@[a-z.-]+\.[a-z]{2,}$" title="البريد الالكتروني غير صحيح" required>
		<label class="label" for="email">البريد الالكتروني</label>
		<br>
				<?php if (isset($email_error)): ?>
	  	<span><?php echo $email_error; ?></span>
	  <?php endif ?>
		</div>
		
	 <div <?php if (isset($entity_error)): ?> class="form_error" <?php endif ?> >
   <input class="input" list="buildings" name="entity"  class="form" value="<?php echo (isset($entity)) ? $entity : ''; ?>" required>
  <datalist class="input" id="buildings">
      <?php
                $commandtext = "SELECT ID, ENTITY_NAME from entity order by ID";
                $cmd = $sqlconnection->prepare($commandtext);
                $cmd->execute();
                $result = $cmd->fetchAll(PDO::FETCH_ASSOC);
                foreach($result as $row) {
                    echo '<option value="'.$row['ID'].''.$row['ENTITY_NAME'].'">';
                }
            ?>

  </datalist>
	
   <label class="label" for="entity"> الجهة</label>
  <br>   
     <?php if (isset($entity_error)): ?>
	  	<span><?php echo $entity_error; ?></span>
	  <?php endif ?>
	</div>
	

	<div <?php if (isset($office_no_error)): ?> class="form_error" <?php endif ?> >
   <input class="input" name="office_no" type="text"  placeholder="Ex:20T24" value="<?php echo (isset($office_no)) ? $office_no : ''; ?>"  pattern="([0-9]{1,2})+([A-Z]{1})+([0-9]{2,3})$" title="رقم المكتب غير صحيح" required>
   <label class="label" for="office_no">  رقم المكتب</label>
   <br>
      <?php if (isset($office_no_error)): ?>
	  	<span><?php echo $office_no_error; ?></span>
	  <?php endif ?>
		
   </div>
   
		<div <?php if (isset($tele_error)): ?> class="form_error" <?php endif ?> >
           <input class="input" name="tele" type="text" value="<?php echo (isset($tele)) ? $tele : ''; ?>" 
			pattern="[0-9]{5}" title="رقم التحويلة أكثر من 6" required>		
          <label class="label" for="tele">رقم التحويلة</label>
		  <br>
		  		   <?php if (isset($tele_error)): ?>
	  	<span><?php echo $tele_error; ?></span>
	  <?php endif ?>
		  </div>
		  
		  <label class="label" for="tele">الصلاحية</label>
			<label for="one">مدير<input type="radio" name="type" value="مدير" id="one" class="form-radio" required ></label>
			<br>
			<label for="two">موظف مسؤول<input type="radio" name="type" value="موظف مسؤول" id="two" class="form-radio" required ></label>
  </fieldset>
 
  <input class="submit" type="submit" name="submit" value="تسجيل">
  

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