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

//echo $value;


mysqli_select_db($con,"ajax_demo");
$sql="SELECT * FROM products";

$result = mysqli_query($con,$sql);

?>
<div>
<table> 
<tr>
<th>PRODUCT ID</th>
<th>PRODUCT NAME</th>
<th>RFID TAG</th>
</tr>
<form action="func.php" method="POST"> 
<tr>
<?php
$total_amount= 0;
while($row = mysqli_fetch_array($result)) {
?>
	

<td><input class='select' name="productID<?php echo $row['productID'] ?>" value="<?php echo $row['productID'] ?>" readonly="readonly"></td>
<td><?php echo $row['product_name'] ?> </td>
    <td><?php
$rfid_sql = "SELECT rfid_id FROM rfid_details where status=0";
$rfid_result = mysqli_query($con,$rfid_sql);

echo "<select name='rfid".$row['productID']."'>";
while ($rfid_row = mysqli_fetch_array($rfid_result)) {
	
    echo "<option value='".$rfid_row['rfid_id']."'>".$rfid_row['rfid_id'] ."</option>";
	
}
echo "</select>";

?></td>
	
</tr>


	  <?php }
mysqli_close($con);


?>
<tr><td></td><td></td><td><button class="select" name="attach_product" type="submit" placeholder="Submit" >Submit</button></td></tr>
</form>
</table>

</div>

</body>
</html>
