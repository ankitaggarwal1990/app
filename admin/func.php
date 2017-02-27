<?php
    session_start();
	require 'config.php';
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="admin"){
      header('Location: ../index.php?err=2');
    }
require '../database-config.php';
require 'config.php';

print_r($_POST);

if(isset($_POST['submitted'])){
	
	echo $_POST['productname'];

	
	
	
$product = $_POST['productid'];
 $name1= $_POST['productname'];
$type = $_POST['producttype'];
$productprice = $_POST['productprice'];
$perishduration   = $_POST['perishduration'];
$weight = $_POST['weight'];
	$query = "INSERT INTO `products` (`productID`, `productType`, `productPrice`, `perishDuration`, `weight`, `product_name`, `productstatus`) VALUES ('$product', '$type', '$productprice', '$perishduration', '$weight', '$name1', 0)";
	
	//mysql_select_db('database');
	//$retval = mysql_query($query,$conn);
	$query1 = sqlsrv_query($conn,$query);
	
	
	if($query1)
	{
		echo "Submitted";
		header('Location: addproduct.php?err=1');
	}
	else{
		echo "error";
		header('Location: addproduct.php?err=2');
	}
}
if(isset($_POST['transportsubmitted'])){
	
$id = $_POST[transporterid];
$name = $_POST[transportername];
$acct_number = $_POST[accountnumber];
$phone_number   = $_POST[phonenumber];


	$query = "INSERT INTO `transporter` (`TransporterID`, `TransporterName`, `AccountNo`, `Ph no`) VALUES ('$id', '$name', '$acct_number', '$phone_number')";
	
	//mysql_select_db('database');
	//$retval = mysql_query($query,$conn);
	$query1 = sqlsrv_query($conn,$query);
	
	
	if($query1)
	{
		echo "Submitted";
		header('Location: transporter.php?err=1');
	}
	else{
		echo "error";
		header('Location: transporter.php?err=2');
	}
}


if(isset($_POST['devicesubmitted'])){
$deviceid = $_POST[deviceid];
$devicetype = $_POST[devicetype];
$devicekey = $_POST[devicekey];
$hostname   = $_POST[hostname];
$movable   = $_POST[movable];
$locationID   = $_POST[locationID];
$devicenames   = $_POST[devicenames];


	$query = "INSERT INTO `devices`(`Deviceid`, `DeviceType`, `DeviceKey`, `hostname`, `Locationid`, `isMovable`, `DeviceName`) VALUES ('$deviceid', '$devicetype', '$devicekey', '$hostname', '$locationID', '$movable', '$devicenames')";
	
	//mysql_select_db('database');
	//$retval = mysql_query($query,$conn);
	$query1 = sqlsrv_query($conn,$query);
	
	
	if($query1)
	{
		echo "Submitted";
		header('Location: device.php?err=1');
	}
	else{
		echo "error";
		header('Location: device.php?err=2');
	}
}




if(isset($_POST['retailerasubmitted'])){
$retailerid = $_POST[retailerid];
$locationid = $_POST[locationid];
$retailername = $_POST[retailername];


	$query = "INSERT INTO `retailer`(`RetailerID`, `LocationID`, `RetailerName`) VALUES ('$retailerid', '$locationid', '$retailername')";
	
	//mysql_select_db('database');
	//$retval = mysql_query($query,$conn);
	$query1 = sqlsrv_query($conn,$query);
	
	
	if($query1)
	{
		echo "Submitted";
		header('Location: retailers.php?err=1');
	}
	else{
		echo "error";
		header('Location: retailers.php?err=2');
	}
}






if(isset($_POST['contactsubmitted'])){
$warehouseid = $_POST[warehouseid];
$warehousename = $_POST[warehousename];
$location = $_POST[location];
$contact_no = $_POST[contact_no];


	$query = "INSERT INTO `warehouse`(`warehouse_name`, `warehouse_id`, `location`, `contact_no`) VALUES ('$warehouseid', '$warehousename', '$location', '$contact_no')";
	
	//mysql_select_db('database');
	//$retval = mysql_query($query,$conn);
	$query1 = sqlsrv_query($conn,$query);
	
	
	if($query1)
	{
		echo "Submitted";
		header('Location: warehouses.php?err=1');
	}
	else{
		echo "error";
		header('Location: warehouses.php?err=2');
	}
}





if(isset($_POST['attach_product'])){
$sql="SELECT * FROM products";


$result = mysqli_query($con,$sql);


$query2 = "SELECT rfid_id FROM rfid_details where status=0";
$result2 = sqlsrv_query($conn,$query2);
$orderid =0;
while($row2 = sqlsrv_fetch_array($result2)) {
 echo $orderid = $row2['order_id'];
}
	
	$orderid= $orderid + 1;

echo $orderid;
while($row = sqlsrv_fetch_array($result)) {
	echo $row['productID'];
	
	echo $product = $row['productID'];
	if(isset($_POST[$product])){
		$quantity1 = "quantity".$_POST[$product];
		echo $quantity = $_POST[$quantity1];
		$sql = "UPDATE `rfid_details` SET `rfid_id`=[value-1],`type`=[value-2],`product_id`=[value-3],`status`=[value-4] ";
		
		$result1 = sqlsrv_query($conn,$sql);
		if($result1){ echo "Submitted";}
		else{ echo "Not Submitted";}
		//echo "dsdfsd";
	}
	


}


?>
