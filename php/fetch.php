<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "internet_point_establishment");
// Change character set to utf8
mysqli_set_charset($connect,"utf8");
$output = '';
if(isset($_POST["search"]))
{
 $search = mysqli_real_escape_string($connect, $_POST["search"]);
 $query = "
  SELECT * FROM new_order 
  WHERE DATE LIKE '%".$search."%'
  OR ORDER_ID LIKE '%".$search."%' 
  OR EMP_ID LIKE'%".$search."%' 
  OR ENT_ID LIKE '%".$search."%' 
  OR FLOOR LIKE '%".$search."%'
  OR ORDER_OFFICE LIKE '%".$search."%' 
  OR SERIAL_NO LIKE'%".$search."%' 
  OR POINT_NO LIKE '%".$search."%' 
  OR NOTE LIKE '%".$search."%'
  OR OTHER_NAME LIKE '%".$search."%' 
  OR ORDER_TELE LIKE '%".$search."%'
  OR STATUS LIKE '%".$search."%'
 ";
}
else
{
 $query = "
  SELECT * FROM new_order ORDER BY ORDER_ID
 ";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive">
   <table class="table table bordered">
    <tr>
	<th>ملاحظات</th>
	<th>رقم التحويلة</th>
	<th>اسم المستفيدة</th>
    <th>عدد النقاط</th>
	<th>الرقم الهندسي</th>
	<th>رقم المكتب</th>
	<th>رقم الدور</th>
	<th>الجهة</th>
	<th>حالة الطلب</th>
	<th>رقم الطلب</th>
	<th>التاريخ</th>
    </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
   <tr>
    <td>'.$row['NOTE'].'</td>
    <td>'.$row['ORDER_TELE'].'</td>
    <td>'.$row['OTHER_NAME'].'</td>
    <td>'.$row['POINT_NO'].'</td>
    <td>'.$row['SERIAL_NO'].'</td>
	<td>'.$row['ORDER_OFFICE'].'</td>
    <td>'.$row['FLOOR'].'</td>
    <td>'.$row['ENT_ID'].'</td>
    <td>'.$row['STATUS'].'</td>
    <td>'.$row['ORDER_ID'].'</td>
	<td>'.$row['DATE'].'</td>
   </tr>
  ';
 }
 echo $output;
}
else
{
 echo 'لا يوجد نتائج';
}

?>