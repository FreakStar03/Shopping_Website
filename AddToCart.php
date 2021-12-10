
<?php

$UserId = $_POST['UserId'];
$ProdID = $_POST['ProductId'];
$Quantity = $_POST['Quantity'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Shopping_Website";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT into Transiction (UserID,ProductID,Quantity) VALUES(?,?,?)";
// prepare and bind
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $UserId, $ProdID, $Quantity);
$stmt->execute(); 
$stmt->close();
$conn->close();
echo "Added To Cart";
?>