<?php
if (isset($_GET['keyword'])) {
    $keyword3 = $_GET['keyword'];
    $servername = "localhost";
    $username = "localuser";
    $password = "LocalPass";
    $dbname = "amanda";
    $p = 0;
    $o = 0;
    $s = 0;
    $simarray = array();
    $simarray2 = array();
    $simarray3 = array();
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    $responses = explode(" ", $keyword3);
    $a = 0;
    while ($a < count($responses)) {
        $sql = "SELECT * FROM `amanda` WHERE `Keyword` LIKE '%" . $responses[$a] . "%'";
        $result = $conn->query($sql);
        $i = 0;
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $dbkeyword = $row["Keyword"];
                similar_text($keyword3, $dbkeyword, $sim);
                $simarray[] = array("entry"=>$row["EntryNum"], 'sim' => $sim, 'key' => $row["Keyword"], 'response' => $row["Response"]);
                $i++;
            }
        }
        else {
        }
        $a++;
}
        function sort_by_order ($a, $b)
        {
           return $b['sim'] -  $a['sim'];
        }
        $d = 0;
        usort($simarray, 'sort_by_order');
        while ($d < count($simarray)) {
            $d++;
        }
        while ($o < count($simarray)) {
            while ($simarray[$p]['key'] === $simarray[0]['key']) {
                $p++;
            }
            $s = $p-1;
            $o++;
        }
        if ($p > 1){
            $randomres = rand(0, ($p-1));
            $bestresponse = $simarray[$randomres]['response'];
        }
        else
            $bestresponse = $simarray[$p]['response'];
            echo $bestresponse;
    $conn->close();
}
?>
