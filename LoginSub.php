<?php
  
  $conn = "";
   
  try {
      $servername = "localhost:3306";
      $dbname = "Shopping_Website";
      $username = "root";
      $password = "";
     
      $conn = new PDO(
          "mysql:host=$servername; dbname=Shopping_Website",
          $username, $password
      );
        
     $conn->setAttribute(PDO::ATTR_ERRMODE,
                      PDO::ERRMODE_EXCEPTION);
  }
  catch(PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
  }

function test_input($data) {
      
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
   
if ($_SERVER["REQUEST_METHOD"]== "POST") {
      
    $adminname = test_input($_POST["name"]);
    $password = test_input($_POST["pass"]);
    $stmt = $conn->prepare("SELECT * FROM UserDetail");
    $stmt->execute();
    $users = $stmt->fetchAll();
      
    foreach($users as $user) {
          
        if(($user['Username'] == $adminname) && 
            ($user['Password'] == $password)) {
                session_start();
                $_SESSION['userID'] = $user['ID'];
                $_SESSION['userName'] = $user['Username'];
                echo "worked";
        }
    }
}
  
?>
<?php 

?>