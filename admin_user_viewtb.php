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
	
		<title>إدارة مستخدم</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" type="image/png" href="icons/ksu2.png"/>
		 <link rel="stylesheet" type="text/css" href="css/user-new-order.css">
		   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
		  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
		<style>
		table {
		font-family: ge-dinar-one-medium;
		border-collapse: collapse;
		width: 50%;
		margin-top: 50px;
		margin-left: 18% ;
		color:#0c8eca;
		}
		th{
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

		tr:hover {background-color:#0c8eca;
		color:#fff;
		opacity:0.7;}
		.btn{
			font-family:ge-dinar-one-medium;
		  background-color:  #0c8eca;
		  color: white;
		  padding: 12px 20px;
		  border: 2px solid #0c8eca;
		  border-radius: 7px;
		  margin-top: 10px;
		  margin-bottom: 10%;
		  margin-left:18%;
		}

		.btn:hover {
		  background-color: #fff;
		  color:  #0c8eca;
		  border: 2px solid #0c8eca;
		  
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
}
.lbl{
	font-family: ge-dinar-one-medium;
	color:  #0c8eca;
	float:right;
}
input{
	font-family: ge-dinar-one-medium;
	text-align:right;
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
  <!-- Modal -->
  <div class="modal fade" id="myModal3" role="dialog">
    <div class="modal-dialog  modal-sm">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal_label">تعديل بيانات المستخدم</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
		
           <form action="" method="POST" style="width:100%;">
		   
	
  <label  class="lbl">الاسم</label>
  <input type="text" id="EMP_NAME" style="width:100%;0px;margin:0px;" class="form-control" >


  <label  class="lbl" >الرقم الوظيفي</label>
  <input type="text" class="form-control" id="EMP_ID" style="width:100%;"  pattern="[0-9]{10}$" title="الرقم الوظيفي أكثر من 10">


  <label  class="lbl">البريد الالكتروني</label>
  <input type="email" class="form-control" id="EMP_EMAIL" style="width:100%;" pattern="[a-z0-9._%+-]+@[a-z.-]+\.[a-z]{2,}$" title="البريد الالكتروني غير صحيح">

  <label  class="lbl">رقم المكتب</label>
  <input type="text" class="form-control" id="EMP_OFFICE" style="width:100%;"  pattern="([0-9]{1})+([A-Z]{1})+([0-9]{2,3})$" title="رقم المكتب غير صحيح">

  <label  for="tele" class="lbl">رقم التحويله</label>
  <input type="text" class="form-control"id="EMP_TELE" style="width:100%;margin-bottom:10px;" pattern="[0-9]{6}" title="رقم التحويلة أكثر من 6">
  
  <input type="hidden" id="userId" class="form-control">

        <div class="modal-footer">
           <button type="button" class="modal_submit" data-dismiss="modal">إغلاق</button>
		  <input class="modal_submit" type="submit" id="save" value="تعديل" style="padding: 6px 12px;margin-top: 5px;"
		  onclick="return confirm('هل تريد تعديل بيانات هذا المستخدم؟');">
        </div>
        </form>
      </div>
      
    </div>
  </div>
</div>
<!-- end of modal -->

 


	<header>
	

		<div class="grid-container">
		    <div>
				<h2>عمادة التعاملات الالكترونية والاتصالات</h2>
				<h3>إدارة مستخدم</h3>
			</div>
			<img src="icons/ksu2.png" alt="جامعة الملك سعود" class="site-logo">
			
			

				 
		</div>
	    
		</header>
		
		


		<div class="vertical-menu">
  <a href="admin_home.php">الرئيسية</a>
  <a href="admin_orders.php">الطلبات</a>
  <a href="search.php">بحث الطلبات</a>
  <a href="admin_user_viewtb.php" class="click" >إدارة مستخدم </a>
  <a href="admin_point.php" >إدارة النقاط </a>
  <a href="logout.php">تسجيل الخروج</a>
		</div>
		
	
		<?php

// Change this to your connection info.
$DB_HOST = 'localhost';
$DB_USER = 'root';
$DB_PASS = '';
$DB_NAME = 'internet_point_establishment';

// Try and connect using the info above.
$mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
if ($mysqli->connect_errno) {
	// If there is an error with the connection, stop the script and display the error.
	die ('Failed to connect to MySQL: ' . $mysqli->connect_errno);
}

// Change character set to utf8
mysqli_set_charset($mysqli,"utf8"); 

// statement for displaying data to the admin
$stmt = $mysqli->prepare("SELECT * FROM employee");
$stmt-> execute();

$result = $stmt-> get_result();

	echo "<table>";
	echo "<th>حذف</th>";
	echo "<th>تعديل</th>";
	echo "<th>الصلاحية</th>";
	echo "<th>رقم التحويلة</th>";
	echo "<th>رقم المكتب</th>";
	echo "<th>الجهة</th>";
	echo "<th>البريد الالكتروني</th>";
	echo "<th>الرقم الوظيفي</th>";
	echo "<th>الاسم</th>";
	
	

	while( $row = $result->fetch_assoc()){ ?>
		
		<tr id="<?php echo $row['ID']; ?>">
		<td><a <?php echo "href='delete_row.php?ID=" . $row['EMP_ID'] . "' onclick=\"return confirm('هل تريد حذف بيانات هذا المستخدم؟');\" ";?> > 
								<img src='icons/delete.png'
									alt='حذف'
									style='width:30px;height:30px;border:0;'></a></td>
		
		<td><a data-toggle="modal" href="#" data-role="update" data-id="<?php echo $row['ID'] ;?>">
		<img src='icons/edit.png' alt='تعديل'style='width:30px;height:30px;border:0;'></a></td>
				
				<td><?php echo $row['TYPE']; ?></td>
				<td data-target="EMP_TELE"><?php echo $row['EMP_TELE']; ?></td>
				<td data-target="EMP_OFFICE"><?php echo $row['EMP_OFFICE']; ?></td>
				<td><?php echo $row['ENTITY_ID']; ?></td>
				<td data-target="EMP_EMAIL"><?php echo $row['EMP_EMAIL']; ?></td>
				<td data-target="EMP_ID"><?php echo $row['EMP_ID']; ?></td>
				<td data-target="EMP_NAME"><?php echo $row['EMP_NAME']; ?></td>
				</tr>
<?php
	}
	
	echo "</table>";
?>
		
		<input type="button" class="btn" value="إضافة مستخدم" onclick="window.location='admin_register_form.php'">




		
		
			
			<div class="footer1">
				<a href="http://ksu.edu.sa">جامعة الملك سعود</a> © 2019 &nbsp;&nbsp; <br>
				 تصميم و تطوير : 				<a href="http://etc.ksu.edu.sa">عمادة التعاملات الإلكترونية و الاتصالات</a> &nbsp;&nbsp;
							</div>
			

	</body>
	 <script>  
 $(document).ready(function(){
	 
	  $("#myBtn3").click(function(){
    $("#myModal3").modal({backdrop: "static"});
  });

    //  append values in input fields
      $(document).on('click','a[data-role=update]',function(){
            var id  = $(this).data('id');
            var EMP_NAME  = $('#'+id).children('td[data-target=EMP_NAME]').text();
            var EMP_ID  = $('#'+id).children('td[data-target=EMP_ID]').text();
            var EMP_EMAIL  = $('#'+id).children('td[data-target=EMP_EMAIL]').text();
			var EMP_OFFICE  = $('#'+id).children('td[data-target=EMP_OFFICE]').text();
			var EMP_TELE  = $('#'+id).children('td[data-target=EMP_TELE]').text();

            $('#EMP_NAME').val(EMP_NAME);
            $('#EMP_ID').val(EMP_ID);
            $('#EMP_EMAIL').val(EMP_EMAIL);
            $('#EMP_OFFICE').val(EMP_OFFICE);
			$('#EMP_TELE').val(EMP_TELE);
			$('#userId').val(id);
            $('#myModal3').modal({backdrop: "static"});
      });
	   // now create event to get data from fields and update in database 

       $('#save').click(function(){
          var ID = $('#userId').val(); 
         var EMP_NAME =  $('#EMP_NAME').val();
          var EMP_ID =  $('#EMP_ID').val();
          var EMP_EMAIL =   $('#EMP_EMAIL').val();
		  var EMP_OFFICE =   $('#EMP_OFFICE').val();
		  var EMP_TELE =   $('#EMP_TELE').val();

          $.ajax({
              url      : 'php/update_row.php',
              method   : 'post', 
              data     : {EMP_ID : EMP_ID, EMP_NAME : EMP_NAME, EMP_OFFICE : EMP_OFFICE, EMP_TELE : EMP_TELE 
						,EMP_EMAIL : EMP_EMAIL, ID: ID},
              success  : function(response){
                            // now update user record in table 
                             $('#'+id).children('td[data-target=EMP_NAME]').text(EMP_NAME);
                             $('#'+id).children('td[data-target=EMP_ID]').text(EMP_ID);
                             $('#'+id).children('td[data-target=EMP_EMAIL]').text(EMP_EMAIL);
							 $('#'+id).children('td[data-target=EMP_OFFICE]').text(EMP_OFFICE);
							 $('#'+id).children('td[data-target=EMP_TELE]').text(EMP_TELE);
                             $('#myModal3').modal('toggle'); 

                         }
          });
       });
 });
 </script>
</html>