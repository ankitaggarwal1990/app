<?php 
    session_start();
	require 'config.php';
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="admin"){
      header('Location: ../index.php?err=2');
    }
?>


<?php
//echo "abc";
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
if (!$conn) {
    die('Could not connect11111 ');
}
else{
	//echo "connect11111";
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
$sql = "SELECT * from runtime_data";
$stmt = sqlsrv_query( $conn, $sql );
if( $stmt === false) {
    die( print_r( sqlsrv_errors(), true) );
}
?>
<div>
<table> 
<tr>
<th>DEVICE ID</th>
<th>TAG ID</th>
<th>GROSS WEIGHT</th>
<th>TIME STAMP</th>
</tr>
	
<?php
while($row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)) {
?>
	<tr>

<td><?php echo $row['deviceid'] ?></td>
<td><?php echo $row['TagID'] ?></td>
<td><?php echo $row['GrossWeight'] ?></td>
<td><?php echo $row['time_stamp'] ?></td>
</tr>
<?php
}
?>


</table>

</div>

</body
	</html>
