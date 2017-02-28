<?php 
print_r($_POST);

// PHP Data Objects(PDO) Sample Code:
try {
    $conn = new PDO("sqlsrv:server = tcp:trident1.database.windows.net,1433; Database = database_azure", "trident", "password@123");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}

// SQL Server Extension Sample Code:
$connectionInfo = array("UID" => "trident@trident1", "pwd" => "password@123", "Database" => "database_azure", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:trident1.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);

if(isset($_POST['place_order'])){

	
	$sql="SELECT * FROM products";

$result = sqlsrv_query($conn,$sql);


$query2 = "SELECT DISTINCT MAX(order_id) FROM orders";
$result2 = sqlsrv_query($conn,$query2);
$orderid =0;
while($row2 = sqlsrv_fetch_array($result2, SQLSRV_FETCH_ASSOC)) {
 echo $orderid = $row2['order_id'];
}
	
	$orderid= $orderid + 1;

echo $orderid;
//while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
//	echo $row['productID'];
	
//	echo $product = $row['productID'];
//	if(isset($_POST[$product])){
//		$quantity1 = "quantity".$_POST[$product];
//		echo $quantity = $_POST[$quantity1];
		//$sql = "INSERT INTO `orders`(`order_id`, `product_id`, `quantity`, `rfid_tag_id`, `destination_id`, `transport_id`, `delivery_time`, `product_total_amount`, `status`) VALUES ('$orderid','$product','$quantity',0,0,0,NOW(),0,1)";
		//$query = "INSERT INTO `orders`(`order_id`, `product_id`, `quantity`, `rfid_tag_id`, `destination_id`, `delivery_time`, `transport_id`, `product_total_amount`) VALUES ('$orderid','$product','$quantity',1,1,1,now(),1)"
		
//		$sql = "INSERT INTO orders(order_id, product_id, quantity, rfid_tag_id, destination_id, transport_id,delivery_time, product_total_amount, retailer_id, orderstatus, product_status) VALUES ('$orderid','$product','$quantity',0,0,0,DEFAULT,0,1,1,1)";
		
		
//		$result1 = sqlsrv_query($conn,$sql);
//		if($result1){ echo "Submitted";}
//		else{ echo "Not Submitted";}
		//echo "dsdfsd";
//	}
	
	
}
	
//	header('Location: finalorder.php?order='.$orderid.'');
	//echo "asdfghjkl";
}

if(isset($_POST['final_order']))
{
	$orderno = $_POST['final_order'];
	$query = "UPDATE `orders` SET `status`=1 WHERE `order_id`= $orderno";		
    $result1 = sqlsrv_query($conn,$query);
	header('Location: orders.php');
	
	
}



?>
