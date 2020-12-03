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
	
		<title>الطلبات</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" type="image/png" href="icons/ksu2.png"/>
		<link rel="stylesheet" type="text/css" href="css/user-new-order.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<script>
$(document).ready(function(){
    $(".clickcls").on("change",function(){
    alert("لقد تم تغيير حالة الطلب");
    });
});
</script>
		 <style>
body{font-size:160%;}		 
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
table {
		font-family: ge-dinar-one-medium;
		border-collapse: collapse;
		width: 50%;
		margin-top: 50px;
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

.pagination {
  display: inline-block;
  margin-top: 30px;
  margin-left:10px;

  
}

.pagination a {
  color: black;
  padding: 8px 16px;
  text-decoration: none;
}

.pagination a.active {
  background-color: #0c8eca;
  color: white;
  border-radius: 5px;
}

.pagination a:hover:not(.active) {
  background-color: #ddd;
  border-radius: 5px;
}
p{
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
				<h3>الطلبات</h3>
			</div>
			<img src="icons/ksu2.png" alt="جامعة الملك سعود" class="site-logo">
			
			

				 
		</div>
	    
	</header>
	
	<div class="vertical-menu">
  <a href="admin_home.php">الرئيسية</a>
  <a href="admin_orders.php" class="click">الطلبات</a>
  <a href="search.php">بحث الطلبات</a>
  <a href="admin_user_viewtb.php" >إدارة مستخدم </a>
  <a href="admin_point.php" >إدارة النقاط </a>
  <a href="logout.php">تسجيل الخروج</a>
	</div>

<?php

$db = mysqli_connect('localhost', 'root', '', 'internet_point_establishment');
  
  // Change character set to utf8
mysqli_set_charset($db,"utf8");


if(isset($_GET['page'])){
	$page = $_GET['page'];
}else{
	$page = 1;
}
	$page1 = ($page*4) - 4;


// statement for displaying data to the admin
$table = "SELECT * FROM new_order limit $page1,4 ";
$result= mysqli_query($db, $table);

$row = mysqli_num_rows($result); 

if($row == 0 ){
	echo" <p style='margin-bottom:22%;'>لا يوجد طلبات حالية</p> ";
}else{
	echo "<table style='margin-left: 18% ;'>";
	echo "<th>حالة الطلب</th>";
	echo "<th>التفاصيل</th>";
	echo "<th>الاسم</th>";
	echo "<th>الجهة</th>";
	echo "<th>رقم الطلب</th>";
	echo "<th>التاريخ</th>";
	
	while($row = mysqli_fetch_assoc($result)){ 
?>
		<tr>
		<td>
		<form action="" method="POST" class="clickcls">
		<select class="changeStatus" name="changeStatus" style="margin-bottom:10px;">
			<option value="<?php echo $row["STATUS"]; ?>" > <?php echo $row["STATUS"]; ?></option>
			<option value="جديد">جديد</option>
			<option value="تحت الدراسة">تحت الدراسة</option>
			<option value="جاري الإنشاء">جاري الإنشاء</option>
			<option value="تم التنفيذ">تم التنفيذ</option>
		  </select>
		   <input class="ord_Id" type="hidden" name="ord_Id" value="<?php echo $row["ORDER_ID"];?>"/>
		   </form>
		  </td>
		<td><input type="button" name="view" value="عرض" id="<?php echo $row["ORDER_ID"]; ?>" class="btn btn-info btn-xs view_data" /></td>
		<td><?php 
		$orderId = $row['ORDER_ID'];
		$name = "SELECT EMP_NAME FROM employee WHERE EMP_ID = (SELECT EMP_ID FROM new_order where ORDER_ID = '$orderId')";
$res_name = mysqli_query($db, $name);
$row_name = mysqli_fetch_assoc($res_name); 
echo $row_name['EMP_NAME'];?></td>

		<td><?php echo $row['ENT_ID']; ?></td>
		<td><?php echo $row['ORDER_ID']; ?></td>
		<td><?php echo $row['DATE']; ?></td>
		</tr>
<?php	}
echo "</table>";

//COUNTING number of pages

$query_page = "SELECT * FROM new_order";
$res_page = mysqli_query($db, $query_page);
$count = mysqli_num_rows($res_page);
$row_num = $count/4;
$row_num = ceil($row_num);

	for($p=1;$p<=$row_num;$p++){ ?>
	
		<div class="pagination">
		<a href="admin_orders.php?page=<?php echo $p; ?>" <?php if ($page == $p){ ?> class="active" <?php } ?> ><?php echo $p.""; ?></a>
		</div>
	
<?php	}
}
?>




			<div class="footer1">
				<a href="http://ksu.edu.sa">جامعة الملك سعود</a> © 2019 &nbsp;&nbsp; <br>
				 تصميم و تطوير : 				<a href="http://etc.ksu.edu.sa">عمادة التعاملات الإلكترونية و الاتصالات</a> &nbsp;&nbsp;
			</div>

<script>
$(document).ready(function() {

    $('select.changeStatus').change(function(){
        $.ajax({
                type: 'post',
                url: 'php/changeStatus.php',
                data: {selectFieldValue: $(this).val(), ord_Id:  $(this).siblings('.ord_Id').val()},
//***only select that rows .order_Id by using $.siblings() with selector
                success: function(){alert('Select field value has changed to' + $(this).val()); },
                dataType: 'html'
         });
    });
});
</script>
</body>

</html>
<div id="dataModal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title" style="font-family: ge-dinar-one-medium;
						text-align:center;">تفاصيل الطلب</h4>  
                </div>  
                <div class="modal-body" id="order_detail">  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>  
 <script>  
 $(document).ready(function(){  
      $('.view_data').click(function(){  
           var order_id = $(this).attr("id");  
           $.ajax({  
                url:"php/view_order.php",  
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
