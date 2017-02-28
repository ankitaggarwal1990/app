<!DOCTYPE html>
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
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
} 

</style>
<script>
function showUser(str) {
	//alert(str);
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","getuser.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>
</head>
<body>

<p>Search for the required Feild/s:</p>

<form>
  <input type="text" name="search" onkeyup="showUser(this.value)" placeholder="Search..">
	</form>


<?php 

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
$sql="SELECT * FROM products";

$result = sqlsrv_query($conn,$sql);

?>
<div>
<table> 

<tr>
<th>Select</th>
<th>Product ID</th>
<th>Product Name</th>
<th>Product Type</th>
<th>Price</th>
<th>Quantity</th>
</tr>
	<form action="func.php" method="POST"> 
<?php
$i=0;
while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
	
	?>
	
<tr>
<td><input type="checkbox" value="checked" name="<?php echo $i ?>"/>
<td><input type="text" readonly="readonly" name="<?php echo $row['productID'] ?>" value="<?php echo $row['productID'] ?>" > </td>
    <td><?php echo $row['product_name'] ?></td>
	<td><?php echo $row['productType'] ?></td>
	<td><?php echo $row['productPrice']?></td>
	<td> <input type="text" name="quantity<?php echo $row['productID']?>" placeholder="Quantity.." required></td>
</tr>
 <?php $i++ ?>
<?php }
mysqli_close($con);
?>

<tr>
<td></td><td></td><td></td><td></td><td></td><td><div ><button class="button" type="submit" name="place_order">Place Order</button></div></td></tr>

	</form></table></div>


<table id="txtHint">
    	
</table>

</body>
</html>
