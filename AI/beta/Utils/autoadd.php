<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
   if ($_POST) {
    $servername = "localhost";
    $username = "localuser";
    $password = "LocalPass";
    $dbname = "amanda";
    $keyword = $_POST['keyword'];
    $response = $_POST['response'];
    $keywordupper = strtoupper($keyword);
    $responseupper = strtoupper($response);
    // Create connection
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    
    $sql = "INSERT INTO amanda (keyword, response)
    VALUES ('" . $keywordupper . "', '" . $responseupper . "')";
    
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();     
    }
?>
<html>
   <body>
      <form action="" method="post">
         Keyword: <input type="text" name="keyword" required />
         Response: <input type="text" name="response" required />
         <input type = "submit" />
      </form>
      
   
   </body>
</html>