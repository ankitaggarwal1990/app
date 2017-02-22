<?php 

echo $_POST['username'];
 require 'database-config.php';
echo "a";

 session_start();

 $username = "";
 $password = "";
 
 if(isset($_POST['username'])){
  $username = $_POST['username'];
 }
echo "b";
 if (isset($_POST['password'])) {
  $password = $_POST['password'];

 }
 


 $q = 'SELECT * FROM users WHERE username=:username AND password=:password';


 $query = $dbh->prepare($q);
echo "1";

 $query->execute(array(':username' => $username, ':password' => $password));

echo "2";

 if($query->rowCount() == 0){
  header('Location: index.php?err=1');
 }else{

  $row = $query->fetch(PDO::FETCH_ASSOC);
  
  echo "dssdfsd";

  session_regenerate_id();
  $_SESSION['sess_user_id'] = $row['id'];
  $_SESSION['sess_username'] = $row['username'];
        $_SESSION['sess_userrole'] = $row['role'];

        echo $_SESSION['sess_userrole'];
  session_write_close();

  if( $_SESSION['sess_userrole'] == "admin"){
   header('Location: admin/index.php');
  } 
  else if( $_SESSION['sess_userrole'] == "warehouse"){
   header('Location: warehouse/index.php');
  }
  else if( $_SESSION['sess_userrole'] == "retailer"){
   header('Location: retailer/index.php');
  }
  else if( $_SESSION['sess_userrole'] == "transporter"){
   header('Location: transporter/index.php');
  }
  
  
 }


?>
