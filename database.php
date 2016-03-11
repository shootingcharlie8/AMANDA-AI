<?php
$servername = "localhost";
$username = "localuser";
$password = "Localpass";
$dbname = "amanda";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

#$sql = "INSERT INTO amanda (firstname, lastname, email) VALUES ('John', 'Doe', 'john@example.com')";
$sql = "";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>