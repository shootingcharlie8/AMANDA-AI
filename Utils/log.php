<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
if (isset($_GET['keyword'])&&(isset($_GET['response']))) {
        //$keyword = $_GET['keyword'];
        //$response = $_GET['response'];
        //file_put_contents("log.txt", $keyword, FILE_APPEND);
        //file_put_contents("log.txt", $response, FILE_APPEND);
        //$file_name = "../assets/log.txt";
        //$file_handler = fopen($file_name, 'a');
        //fwrite($file_handler, "$keyword \n$response \n#\n");
        //fclose($file_handler);
    $servername = "localhost";
    $username = "localuser";
    $password = "LocalPass";
    $dbname = "amanda";
    $keyword = $_GET['keyword'];
    $response = $_GET['response'];
    $keywordupper = strtoupper($keyword);
    $responseupper = strtoupper($response);
    $ip = $_SERVER["REMOTE_ADDR"];
    //$client_ip = ip2long ( $ip );
// Create connection

    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    $sql = "INSERT INTO Log (input, output, client_ip)
    VALUES ('" . $keywordupper . "', '" . $responseupper . "', '" . $ip . "')";

    if ($conn->query($sql) === TRUE) {
        //echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();     
    
}
?>