<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="admin"){
      header('Location: index.php?err=2');
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
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    
 <!--  <div class="navbar navbar-default navbar-fixed-top" role="navigation">
       <div class="container">
         <div class="navbar-header">
           <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">gsdgsgs</span>
            <span class="icon-bar">sdgsdgsdg</span>
            <span class="icon-bar">gsdgsdgsd</span>
            <span class="icon-bar">gsdgsdgdg</span>
           </button>
           <a class="navbar-brand" href="">fdsfdssdgsddg</a>
          </div>
        <div>
       </div>-->
		
		
		
<!--<a href="default.asp"><img src="images/logo.png" alt="HALDIRAM" style="width:42px;height:42px;border:0;"></a>-->
        <div >
		<table style="padding:10px">
		<td><a href="http://localhost:8080/Haldiram/index.php"><img src="images/logo.png" alt="HALDIRAM"></a></td>
		<td class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
		  <!--<li><a href="default.asp"><img src="images/logo.png" alt="HALDIRAM" style="width:42px;height:42px;border:0;"></a></li>-->
		  <li><a href="adminhome.php">HOME</a></li>
		  <li><a href="ready_products.php">READY PRODUCTS</a></li>
		  <!--<li><a href="#contact">ORDERED PRODUCTS</a></li>-->
		  <li><a href="ready_for_dispatch.php">READY TO DISPATCH</a></li>		  
		  <!--<li><a href="#about">TRANSPORT CARRY ITEM</a></li>-->
		  <li><a href="transport_environment.php">TRANSPORT ENVIRONMENT</a></li>
		  <!--<li><a href="#about">TRANSPORTER LOCATION</a></li>-->
		  <li><a href="delivered_items.php">DELIVERED ITEMS</a></li>
		  <li><a href="logout.php">LOGOUT</a></li>
            <li><a href="#">HI!  <?php echo $_SESSION['sess_username'];?></a></li>
            
          </ul>
		  </td>
        </div>
      </div>
    </div>

    <div class="container homepage">
      <div class="row">
         <div class="col-md-3"></div>
            <div class="col-md-6">
			  <table  class="table" id='transport'>
			       <tr> <th colspan="5">DELIVERED ITEMS</th></tr>
		          <tr><th>TRANSPORT ENTER TIME</th><th>DELIVERY ITEM</th><th>SOURCE</th><th>CARRIER</th><th>RETAIL OUTLET</th></tr>
		          <tr><td>7/11/2016 2:04:00 PM</td><td>Rasgulla</td><td>Warehouse</td><td style="background-color:#006400";>ECCO1221</td><td>Outlet Kashmere Gate</td></tr>
		         <tr><td>6/10/2016 11:05:00 AM</td><td>Barfee</td><td>Warehouse</td><td style="background-color:#006400";>ECCO8791</td><td>Outlet Greater Kailash II</td></tr>
		         <tr><td>6/10/2016 12:02:00 AM</td><td>Rasgulla</td><td>Warehouse</td><td style="background-color:#006400";>ECCO1671</td><td>Outlet Ashram</td></tr>
		         <tr><td>31/10/2016 01:08:00 AM</td><td>Dodha</td><td>Warehouse</td><td style="background-color:#006400";>ECCO2345</td><td>Outlet Rohini</td></tr>
		         		</table>
            </div>
          <div class="col-md-3"></div>
        </div>
    </div>    

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    </body>
</html>
