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
    background-color: #f44336;
    color: white;
}
td {
    text-align: center; /* center checkbox horizontally */
    vertical-align: middle; /* center checkbox vertically */
}
.button {
    background-color: #f44336; /* Green */
    
    color: white;
    
    text-align: center;
    
} 
</style>
</head>


<body>

<?php 

$value = $_GET['order'];

//echo $value;
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

//mysqli_select_db($con,"ajax_demo");
$sql="SELECT * FROM orders WHERE order_id='$value'";

$result = sqlsrv_query($conn,$sql);

?>
<div>
<table> 
<tr><td>ORDER ID</td><td><?php echo $value;?></td></tr>

<tr>
<th>Product ID</th>
<th>Product Name</th>
<th>Price</th>
<th>Quantity</th>
<th>Amount</th>
</tr>
<?php
$total_amount= 0;
while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
	
	$productid = $row['product_id'];
	$sql1="SELECT * FROM products WHERE productID='$productid'";

    $result1 = sqlsrv_query($conn,$sql1);
      while($row1 =sqlsrv_fetch_array($result1, SQLSRV_FETCH_ASSOC)) {
?>
	
<tr>
<td><?php echo $row['product_id'] ?> </td>
    <td><?php echo $row1['product_name'] ?></td>
	<td><?php echo $row1['productPrice'] ?></td>
	<td><?php echo $row['quantity']?></td>
	<td><?php
$total_amount += $row['quantity'] *$row1['productPrice'];
	echo $row['quantity'] *$row1['productPrice']; ?> </td>
</tr>
	  <?php }}
mysqli_close($con);


?>
<tr><td></td><td></td><td></td>
<td class="button">TOTAL AMOUNT</td><td class="button"><?php echo  $total_amount;?></td></tr>
</table>

</div>
<div>

<form method="POST" action="func.php">

     <button class="button" type="submit"  value="<?php echo $value;?>" name="final_order">Final Order</button>

</form>


</div>

</body>
</html>
