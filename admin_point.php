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
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>إدارة النقاط</title>
		<link rel="icon" type="image/png" href="icons/ksu2.png"/>
		 <link rel="stylesheet" type="text/css" href="css/admin-point.css">

		</head>
	<body>
	<header>
		<div class="grid-container">
		    <div>
				<h2>عمادة التعاملات الالكترونية والاتصالات</h2>
				<h3>إدارة النقاط</h3>
			</div>
			<img src="icons/ksu2.png" alt="جامعة الملك سعود" class="site-logo">
			
			

				 
		</div>
	    
		</header>
			<div class="vertical-menu">
  <a href="admin_home.php">الرئيسية</a>
  <a href="admin_orders.php">الطلبات</a>
  <a href="search.php">التقارير</a>
  <a href="admin_user_viewtb.php" >إدارة مستخدم </a>
  <a class="click" href="admin_point.php" >إدارة النقاط </a>
  <a href="logout.php">تسجيل الخروج</a>
</div>

		<form action="max_point.php"method="POST">
  <fieldset>
    <legend>عدد الاحتياج للجهة</legend>
           
   <input list="buildings" name="entity" class="form" required>
  <datalist id="buildings">
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
   <label for="entity"> الجهة</label> 

  <br>
   <input name="point_no" type="number"  min="0" required>
   <label for="point_no"> العدد</label>
   <br>


  </fieldset>
 
  <input type="submit" value="إضافة">
  <input type="submit" name="update" value="تحديث" formaction="update_point.php" style="margin-left:10px;">
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