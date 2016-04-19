<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if (isset($_GET['keyword'])) {
    $keyword3 = strtoupper($_GET['keyword']);
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
    if (isset($_GET['lastsaid'])) {
      $lastsaid = strtoupper($_GET['lastsaid']);
      //echo $lastsaid . "<br>";
    }
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    //$beforeresponse = explode(" ", $keyword3);
    $responses2 = explode(" ", $keyword3);
    $removedWords = array('OF', 'IN', 'TO', 'FOR', 'WITH', 'ON', 'AT', 'FROM', 'BY', 'AS');
    $responses = array_diff($responses2, $removedWords);
    //print_r ($responses);
  $a = 0;
    while ($a < count($responses)) {
        //$sql = "SELECT * FROM `amanda` WHERE `Keyword` LIKE '%" . $responses[$a] . "%'";
      $sql = "SELECT *, LEVENSHTEIN(`Keyword`, '" . $keyword3 . "') AS distance FROM amanda3 ORDER BY `distance` ASC";
        $result = $conn->query($sql);
        $i = 0;
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $dbkeyword = $row["Keyword"];
                //similar_text($keyword3, $dbkeyword, $sim);
                $simarray[] = array("entry"=>$row["EntryNum"], 'sim' => $row["distance"], 'key' => $row["Keyword"], 'response' => $row["Response"], 'context' => $row["Context"]);
                //echo $simarray[$i]['sim'] . " <br>";
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
        //usort($simarray, 'sort_by_order');
        while ($o < count($simarray)) {
          
            while ($simarray[$p]['sim'] === $simarray[0]['sim']) {
                $p++;
              //if ($simarray[$p]['context'] === "WHY ARE YOU SAD?") {
                //echo "Context found!" . $simarray[$p]['context'] . "<br>";
              //}
            }
            $o++;
        }
        $s = $p-1;

  //echo $p . "<br>";
  //echo $s . "<br>";
  //echo $simarray[$p]['context'];
        //if ($simarray[$p]['context'] === $lastsaid) {
          //$responseentry = $simarray['entry']['entry'];
          //echo ("context found: " . $simarray[$p]['context'] . "<br>");
//          while ($simarray[$p]['context'] === $lastsaid){
            //if ($p >= 1){
              //$randomres = rand(0, ($p));
              //$bestresponse = $simarray[$randomres]['response'];
          //}
         // else {
              //$bestresponse = $simarray[$p]['response'];
//            $p++;
          //}
       // }
        if ($s >= 1){
            $randomres = rand(0, ($s));
            $bestresponse = $simarray[$randomres]['response'];
        }
        
        else if ($s == 0) {
          $bestresponse = $simarray[0]['response'];
        }
        echo $bestresponse;

        //$lastsaid = $bestresponse;
    $conn->close();
}
?>
