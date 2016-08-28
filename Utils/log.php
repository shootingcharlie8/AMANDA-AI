<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
if (isset($_GET['keyword'])&&(isset($_GET['response']))) {
  // Create connection
  $servername = "localhost";
  $username = "localuser";
  $password = "LocalPass";
  $dbname = "amanda";
  $keyword = $_GET['keyword'];
  $response = $_GET['response'];
  $keywordupper = strtoupper($keyword);
  $responseupper = strtoupper($response);
  $ip = $_SERVER["REMOTE_ADDR"];

  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  // Inserts into Log
  $sql = "INSERT INTO Log (input, output, client_ip)
  VALUES ('" . $keywordupper . "', '" . $responseupper . "', '" . $ip . "')";
  // Check for errors
  if ($conn->query($sql) === TRUE) {
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  // Close connection
  $conn->close();

}
?>
