<?php

$name = $_POST["Username"];
$passwordUser = $_POST["Password"];
$Email = $_POST["Email"];

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

$sql = "INSERT into UserDetail (Username,Email,Password) VALUES(?,?,?)";
// prepare and bind
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $name, $Email, $passwordUser);
$stmt->execute(); 
$stmt->close();
$conn->close();
session_start();
$_SESSION['userID'] = $user['ID'];
echo "worked";
?>