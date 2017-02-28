
<?php 
    session_start();
	require 'config.php';
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="admin"){
      header('Location: ../index.php?err=2');
    }
?>

<html>
<head>


<style> 
input[type=text] {
    width: 130px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    background-color: white;
    background-image: url('searchicon.png');
    background-position: 10px 10px; 
    background-repeat: no-repeat;
    padding: 12px 20px 12px 40px;
    -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
}

input[type=text]:focus {
    width: 100%;
}

table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    text-align: left;
    padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
	text-align: center;
    background-color: #4CAF50;
    color: white;
}
td {
    text-align: center; /* center checkbox horizontally */
    vertical-align: middle; /* center checkbox vertically */
}
.button {
    background-color: #4CAF50; /* Green */
    
    color: white;
    
    text-align: center;
    
} 
.select{
	
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    background-color: white;
    background-image: url('searchicon.png');
    background-position: 10px 10px; 
    background-repeat: no-repeat;
    padding: 12px 20px 12px 40px;
    -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
}
</style>
</head>


<body>

<?php 

//echo $value;


//mysqli_select_db($con,"ajax_demo");
$sql="SELECT DISTINCT order_id,destination_id,transport_id,rfid_tag_id FROM orders where orderstatus=1";

$result = sqlsrv_query($conn,$sql);

?>
<div>
<table> 
<tr>
<th>ORDER ID</th>
	<th>RFID TAG</th>
<th>TRANSPORT NAME</th>
</tr>
<tr>
<?php
$total_amount= 0;
while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
?>
<td><a href="orderid.php?order_id=<?php echo $row['order_id'] ?>"><?php echo $row['order_id'] ?></a> </td>

<td><?php
echo $row['rgid_tag_id'];

?></td>

	<td><?php echo $row['transport_id'];
//$transporter_sql = "SELECT * FROM `transporter` where tranportID='$row['transport_id']'";
//$transporter_result = sqlsrv_query($conn,$transporter_sql);

//while ($transporter_row = sqlsrv_fetch_array($transporter_result, SQLSRV_FETCH_ASSOC)) {
	
//    echo $transporter_row['TransporterName'];
	
//}
?></td>
	
</tr>
	  <?php }
//mysqli_close($con);


?>

<!--<tr><td></td><td></td><td><button class="select" name="attach_rfid" type="submit" placeholder="Submit" >Submit</button></td>
</tr> -->

</table>

</div>

</body>
</html>
