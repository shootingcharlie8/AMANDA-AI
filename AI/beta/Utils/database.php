<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if (isset($_GET['keyword'])) {
    $host = 'localhost';
    $db   = 'amanda';
    $user = 'localuser';
    $pass = 'LocalPass';
    $charset = 'utf8';
    
    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    $pdo = new PDO($dsn, $user, $pass, $opt);
    
    $p = 0;
    $o = 0;
    $s = 0;
    $simarray = array();
    $simarray2 = array();
    $simarray3 = array();
    // Create connection
    $keyword3 = strtoupper($_GET['keyword']);

    $responses2 = explode(" ", $keyword3);
    $removedWords = array('OF', 'IN', 'TO', 'FOR', 'WITH', 'ON', 'AT', 'FROM', 'BY', 'AS');
    $responses = array_diff($responses2, $removedWords);
    //print_r ($responses);
  $a = 0;
    //while ($a < count($responses)) {
        //$sql = "SELECT * FROM `amanda` WHERE `Keyword` LIKE '%" . $responses[$a] . "%'";
      $stmt = $pdo->prepare ("SELECT *, LEVENSHTEIN(`Keyword`, :keyword) AS distance FROM amanda3 ORDER BY `distance` ASC");
      $stmt->execute(['keyword' => $keyword3]);
      $result = $stmt->fetch();
        $i = 0;
        echo ($result['Response']);
        //echo count($result);
        //print_r ($result);
        if (sizeof($result) > 7) {
            
            // output data of each row
            /*while($row = $result->fetch_assoc()) {
                $dbkeyword = $row["Keyword"];
                //similar_text($keyword3, $dbkeyword, $sim);
                $simarray[] = array("entry"=>$row["EntryNum"], 'sim' => $row["distance"], 'key' => $row["Keyword"], 'response' => $row["Response"], 'context' => $row["Context"]);
                echo $simarray[$i]['sim'] . " <br>";
                $i++;
            }
            */
        }
        else {
        }
        $a++;
//}
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
       /*
        if ($s >= 1){
            $randomres = rand(0, ($s));
            $bestresponse = $simarray[$randomres]['response'];
        }
        
        else if ($s == 0) {
          $bestresponse = $simarray[0]['response'];
        }
        //echo $bestresponse;

        //$lastsaid = $bestresponse;
        */
}
?>
