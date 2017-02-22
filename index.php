<!DOCTYPE html>

<?php

session_start();
error_reporting(E_ALL ^ E_NOTICE);
$sessionuser = $_SESSION['sess_userrole'];
if( sessionuser == "admin"){
   header('Location: admin/index.php');
  } 
  else if( sessionuser == "warehouse"){
   header('Location: warehouse/index.php');
  }
  else if( sessionuser == "retailer"){
   header('Location: retailer/index.php');
  }
  else if( sessionuser == "transporter"){
   header('Location: transporter/index.php');
  }
  


?>

<html >
<head>
  <meta charset="UTF-8">
  <title>Login Form</title>
  <!--<script src="http://s.codepen.io/assets/libs/modernizr.js" type="text/javascript"></script>


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

  <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css'> -->

      <link rel="stylesheet" href="css/style.css">

  
</head>

<body>
  <form class="login" action="authenticate.php" method="POST" role="form">
  
  <fieldset>
    
  	<legend class="legend" >Login</legend>
    
    <div class="input">
    	<input type="text" name="username" placeholder="Email" required />
      <span><i class="fa fa-envelope-o"></i></span>
    </div>
    
    <div class="input">
    	<input type="password" name="password" placeholder="Password" required />
      <span><i class="fa fa-lock"></i></span>
    </div>
    
    <button type="submit" class="submit"><i class="fa fa-long-arrow-right">→</i></button>
    
  </fieldset>
  
  <div class="feedback">
  <?php 

                                $errors = array(
                                    1=>"Invalid user name or password, Try again",
                                   2=>"Please login to access this area"
                                  );

                                $error_id = isset($_GET['err']) ? (int)$_GET['err'] : 0;

                                if ($error_id == 1) {
                                       echo '<p class="text-danger">'.$errors[$error_id].'</p>';
                                  }elseif ($error_id == 2) {
                                     echo '<p class="text-danger">'.$errors[$error_id].'</p>';
                                  }
                               ?>  
  	
  </div>
  
</form>
  <!--<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>-->

    <script src="js/index.js"></script>

</body>
</html>


  <!--<body>
<div class="col-md-6 col-md-offset-3">
                    <h4></span>Log in with your credentials<span class="glyphicon glyphicon-user"></h4><br/>
                            <div class="block-margin-top">
                              <?php 

                               // $errors = array(
                              ////      1=>"Invalid user name or password, Try again",
                               //     2=>"Please login to access this area"
                               //   );

                               // $error_id = isset($_GET['err']) ? (int)$_GET['err'] : 0;

                               // if ($error_id == 1) {
                                //        echo '<p class="text-danger">'.$errors[$error_id].'</p>';
                                 //   }elseif ($error_id == 2) {
                                //        echo '<p class="text-danger">'.$errors[$error_id].'</p>';
                                 //   }
                               ?>  

                              <form action="authenticate.php" method="POST" class="form-signin col-md-8 col-md-offset-2" role="form">  
                                  <input type="text" name="username" class="form-control" placeholder="Username" required autofocus><br/>
                                  <input type="password" name="password" class="form-control" placeholder="Password" required><br/>
                                  <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
                             </form>
                           </div>
            </div>
			
</body>
</html>-->
