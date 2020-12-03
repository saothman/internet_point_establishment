<?php  

 if(isset($_POST["order_id"]))  
 {  
      $output = '';  
      $connect = mysqli_connect("localhost", "root", "", "internet_point_establishment");  
	    // Change character set to utf8
		mysqli_set_charset($connect,"utf8");
      $query = "SELECT * FROM new_order WHERE ORDER_ID = '".$_POST["order_id"]."'";  
      $result = mysqli_query($connect, $query);  
      $output .= '  
      <div class="table-responsive">  
           <table style="width:100%;" class="table table-bordered">';  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= ' 
				<tr>  
                     <td width="70%">'.$row["FLOOR"].'</td>  
					 <td width="30%"><label>رقم الدور</label></td>  
                </tr>  
                <tr>  
                     <td width="70%">'.$row["ORDER_OFFICE"].'</td>  
					 <td width="30%"><label>رقم المكتب</label></td>  
                </tr>  
                <tr>  
                     <td width="70%">'.$row["SERIAL_NO"].'</td>  
					 <td width="30%"><label>الرقم الهندسي</label></td>  
                </tr>  
                <tr>   
                     <td width="70%">'.$row["POINT_NO"].'</td>  
					 <td width="30%"><label>عدد النقاط</label></td> 
                </tr>
				<tr>   
                     <td width="70%">'.$row["NOTE"].'</td>  
					 <td width="30%"><label>الملاحظات</label></td> 
                </tr>  
                <tr>   
					 <td width="70%">'.$row["OTHER_NAME"].'</td> 
					 <td width="30%"><label>اسم المستفيد</label></td> 
                </tr>  
                <tr>   
                     <td width="70%">'.$row["ORDER_TELE"].'</td>  
					 <td width="30%"><label>رقم التحويلة</label></td> 
                </tr>  
                ';  
      }  
      $output .= "</table></div>";  
      echo $output;  
 }  
 ?>
