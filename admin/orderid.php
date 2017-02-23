<?php 
    session_start();
	require 'config.php';
	
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="admin"){
      header('Location: ../index.php?err=2');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Haldiram</title>

    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  


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
</style>
</head>
  <body>
    
        <div >
		<table style="padding:10px; border-radius:15px; opacity=.8;">
		<td><!--<a href="http://localhost:8080/Haldiram/index.php"><img src="../images/logo.png" alt="HALDIRAM"></a>--></td>
		<td class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
		  <li><a href="index.php">ALERTS</a></li>
		  <li><a href="addproduct.php">ADD PRODUCTS</a></li>
		  <li><a href="products.php">PRODUCTS</a></li>
		  <li><a href="location.php">ADD LOCATION</a></li>
		  <li><a href="warehouses.php">ADD WAREHOUSES</a></li>		  
		  <li><a href="transporter.php">ADD TRANSPORTER</a></li>
		  <li><a href="retailers.php"> ADD RETAILERS</a></li>
		  <li><a href="rfid.php"> ADD RFID TAG</a></li>
		  <li><a href="productattach.php">PRODUCT ATTACH WITH RFID TAG</a></li>
		  <li><a href="orders.php">ORDERS</a></li>
		  <li><a href="attach.php">ORDERS ATTACH WITH RFID AND TRANSPORTER</a></li>
		  <li><a href="track.php">TRACK PRODUCT</a></li>
		  <li><a href="logout.php">LOGOUT</a></li>
            <li><a href="#">HI!  <?php echo $_SESSION['sess_username'];?></a></li>
            
          </ul>
		  </td>
		  </table>
        </div>

<?php 
$orderid = $_GET['order_id'];

mysqli_select_db($con,"ajax_demo");
$sql="SELECT * FROM orders where order_id='$orderid'";

$result = mysqli_query($con,$sql);

?>
<div>
<table> 
<tr>
<th>ORDER ID</th>
<th>RETAILER ID</th>

<th>PRODUCT ID</th>
<th>PRODUCT NAME</th>
<th>RFID ID</th>
<th>WAREHOUSE</th>
<th>TRANSPORTER</th>
<th>RETAILER</th>
</tr>
<tr>
<?php
$total_amount= 0;
while($row = mysqli_fetch_array($result)) {
?>
	

<td><?php echo $row['order_id'] ?> </td>

<td><?php echo $row['retailer_id'] ?> </td>

<td><?php echo "PROD".$product_id=$row['product_id'];    

$product_sql = "SELECT * FROM products where productID='$product_id'";
$product_result = mysqli_query($con,$product_sql);

?> </td>
    <td><?php
while ($product_row = mysqli_fetch_array($product_result)) {
	
    echo $product_row['product_name'];
	
}

?></td>

<td><?php
$rfid_sql = "SELECT * FROM rfid_details where product_id='$product_id'";
$rfid_result = mysqli_query($con,$rfid_sql);

while ($rfid_row = mysqli_fetch_array($rfid_result)) {
	
    echo $rfid_id=$rfid_row['rfid_id'];
	
	
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
	echo $tag_sql = "SELECT * FROM runtime_data where TagID='$rfid_id'";
$tag_result = sqlsrv_query( $conn,$tag_sql);

while ($tag_row = mysqli_fetch_array($tag_result)) {
	echo $tag_row['deviceID'];
?> 
<td>

 <?php	if($tag_row['deviceID']==""){echo "dsadasf";}
 else{echo "<img src='../images/check.png' alt='HALDIRAM'>";}
}
?>
</td>

<?php	
}
?></td>
	
</tr>
	  <?php }
mysqli_close($con);


?>

</table>

</div>

</body>
</html>

