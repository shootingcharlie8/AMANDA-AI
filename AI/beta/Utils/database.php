<?php

//error_reporting(E_ALL);
//ini_set('display_errors', 1);
//    $keyword = $_GET['keyword'];
//$keyword2 = ($_GET['keyword']);
    //echo ($keyword3);

    //echo ('<script>console.log("' . gettype($_GET['keyword']) . '")</script>');
    //$foundkeyword = false;
if (isset($_GET['keyword'])) {
    //echo ('<script>console.log("Ran!")</script>');
//if (isset($_GET['keyword'])) {
//    echo("Hey");
    $keyword3 = $_GET['keyword'];

    //$keyword3 = "HEY";

//    $response = $_GET['response'];
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
    //($keyword3);
    //$sql = "SELECT * FROM `amanda` WHERE LENGTH('" . $keyword3 . "') > 1 AND pictures LIKE '%" . $keyword3 . "%'";
    $responses = explode(" ", $keyword3);
    $a = 0;
    while ($a < count($responses)) {
        //echo ("explode: " . $responses[$a]);
        
        
        $sql = "SELECT * FROM `amanda` WHERE `Keyword` LIKE '%" . $responses[$a] . "%'";
        //$sql  = "SELECT *, MATCH(keyword) AGAINST ('HEY' IN NATURAL LANGUAGE MODE) AS score FROM tutorial;";
        $result = $conn->query($sql);
        //echo $result;
        $i = 0;
        if ($result->num_rows > 0) {
            // output data of each row
            //echo ("Looped");
            while($row = $result->fetch_assoc()) {
                //echo "id: " . $row["EntryNum"]. " - Keyword: " . $row["Keyword"]. " - Response: " . $row["Response"]. "<br>";
                //echo "Response = " . $row["Response"] . "<br>";
                $dbkeyword = $row["Keyword"];
                similar_text($keyword3, $dbkeyword, $sim);
                //echo ("Percentage of " . $keyword3 . " and " . $dbkeyword . "is: " . $sim . "<br>");
                $simarray[] = array("entry"=>$row["EntryNum"], 'sim' => $sim, 'key' => $row["Keyword"], 'response' => $row["Response"]);
                //array_push($simarray, $row["EntryNum"], $sim, $row["Keyword"], $row["Response"]);
                //$simarray = array_merge($simarray, array("entry"=>$row["EntryNum"], 'sim' => $sim, 'key' => $row["Keyword"], 'response' => $row["Response"]));
                //$simarray2 = array_merge($simarray2, array('sim' => $sim));
                //array_push($simarray2, $sim);
                //echo $simarray[$i][0] . '<br>'; // "0"
                //echo $simarray[$i][1] . '<br>'; // "0"
                $i++;
            }
            //echo "<br>";
            
            
        } else {
            //echo "*RESPONSE NOT FOUND*";
        }
        $a++;
    }
        //rsort($simarray2);
        //rsort($simarray, 1);
// Obtain a list of columns
        //echo (count($simarray));
        function sort_by_order ($a, $b)
        {
           return $b['sim'] -  $a['sim'];
        }
        $d = 0;
        usort($simarray, 'sort_by_order');
        while ($d < count($simarray)) {
            //print_r ($simarray[$d]['sim'] . "<br>");
            $d++;
        }
        
        //echo count($simarray) . '<br>';
        
        while ($o < count($simarray)) {
            //echo ("Percentage = " . $simarray[$o]['sim'] . "<br>");
            //echo ($simarray2[$o] . "<br>");
            //echo ($simarray[$o][0] . "<br>");
            //echo $searched;
            while ($simarray[$p]['key'] === $simarray[0]['key']) {
                //$searched = array_search($simarray[$p][1], $simarray);
                //echo ("Best Keyword: " . $simarray[$p]['key']. " <br>");
                //echo ("Best Response: " . $simarray[$p]['response']. " <br>");
                $p++;
                
                //echo ("counting p: " . $p . " <br>");

                
            }
            
                
            $s = $p-1;
            $o++;
        }
        if ($p > 1){
            $randomres = rand(0, ($p-1));
            //echo ("Chosen Response: " .$simarray[$randomres]['response'] . "<br>");
            //echo ($randomres . "<br>");
            $bestresponse = $simarray[$randomres]['response'];
            //echo $bestresponse;
            //echo json_encode($bestresponse);

        }
        else
            $bestresponse = $simarray[$p]['response'];
            echo $bestresponse;
    
        //echo ("p = " . $p . "<br>");
        //echo ("randomres = " . $randomres . "<br>");
        //echo ('Chosen Keyword: ' . $simarray[$randomres][2] . "<br>");
        //echo ("Chosen Response: " . $simarray[$randomres][3] . "<br>");
        
        //echo json_encode($simarray[$randomres][3]);
        //print_r ($simarray);
        //echo(stripslashes($simarray[$randomres][3]));
        
        
        
    //echo json_encode(stripslashes($simarray[$randomres][3]));
    $conn->close();

//echo ('<input type="hidden" id="myPhpValue" value="<?php echo $simarray[$randomres][3]
//echo ('<input id="myPhpValue" value="' . $simarray[$randomres][3] . '" />');
}

?>
