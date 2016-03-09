<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
//    $keyword = $_GET['keyword'];
    $keyword2 = 'hey';
//    $response = $_GET['response'];
    $servername = "localhost";
    $username = "localuser";
    $password = "LocalPass";
    $dbname = "amanda";
    $simarray = array();
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    
    $sql = "SELECT * FROM `amanda` WHERE `Keyword` LIKE '%" . $keyword2 . "%'";
    $result = $conn->query($sql);
    $i = 0;
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            //echo "id: " . $row["EntryNum"]. " - Keyword: " . $row["Keyword"]. " - Response: " . $row["Response"]. "<br>";
            $dbkeyword = $row["Keyword"];
            similar_text('HEY', $dbkeyword, $sim);
            array_push($simarray, [$row["EntryNum"], $sim]);
            echo $simarray[$i][0] . '<br>'; // "0"
            echo $simarray[$i][1] . '<br>'; // "0"
            $i++;
            //echo json_encode($sim);
        }
        //print_r ($simarray[0]);
        //print_r ($simarray);
    } else {
        echo "0 results";
    }
    $conn->close();

?>