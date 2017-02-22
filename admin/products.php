<?php 
    session_start();
	require 'config.php';
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="admin"){
      header('Location: ../index.php?err=2');
    }
	//require '../database-config.php';
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
	
	
	mysqli_select_db($con,"ajax_demo");
$sql="SELECT * FROM products";

$result = mysqli_query($con,$sql);

?>

	
	
	
	<div class="login">
       <legend class="legend">PRODUCT DETAILS</legend>
	<table class="table">
		<tr><th>PRODUCT ID</th><th>PRODUCT NAME</th><th>PRODUCT TYPE</th><th>PRODUCT PRICE</th><th>PERISH DURATION</th><th>WEIGHT</th><tr>
	
	<?php while($query1 = mysqli_fetch_array($result)) { ?>
	<tr><td><?php echo $query1['productID'];?> </td><td><?php echo $query1['product_name'];?> </td> <td><?php echo $query1['productType'];?> </td> <td><?php echo $query1['productPrice'];?> </td> 
	<td><?php echo $query1['perishDuration'];?> </td> <td> <?php echo $query1['weight'];?></td></tr>
	
	
	<?php } ?>
	</table>
  
  
</div>
  
	

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    
    </body>
</html>
