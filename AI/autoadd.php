<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
   if ($_POST) {
       $file = "script.txt";
      $keyword = $_POST['keyword'];
      $response = $_POST['response'];
      $keywordupper = strtoupper($keyword);
      $responseupper = strtoupper($response);
      $keywordFinal = "K" . $keywordupper . "\n";
      $responseFinal = "R" . $responseupper . "\n";
      $responseFinal2 = "R" . $responseupper;
      if (strpos(file_get_contents("script2.txt"),$keywordFinal) !== false) {
        echo "Keyword Exists, adding additional response.\n";

        //$file = "script.txt"; 
        //$file = "script2.txt"; 
        $lines = file($file);//file in to an array
        $i = 0;
        
        $countlines = count(file($file)); 
        $written = false;
        //echo "There are $countlines lines in $file\n"; 
        while ($countlines > $i & $written == false) {
            //echo($i);
            if ($lines[$i] == $keywordFinal) {
                $i++;
                $filepathname = $file;
                $target = $lines[$i];
                $newline = $responseFinal2;
                
                $stats = file($filepathname, FILE_IGNORE_NEW_LINES);   
                $offset = array_search($target,$stats) +1;
                array_splice($stats, $i, 0, $newline);   
                file_put_contents($filepathname, join("\n", $stats));   
                $written = true;
            }
            $i++;
        }
        //echo $lines[1];
            // do stuff
         }
         else {
            file_put_contents($file, $keywordFinal, FILE_APPEND);
            file_put_contents($file, $responseFinal, FILE_APPEND);
            file_put_contents($file, "#\n", FILE_APPEND);
            echo "Success!\n";
            file_put_contents("user.txt", $keywordFinal, FILE_APPEND);
            file_put_contents("user.txt", $responseFinal, FILE_APPEND);
            file_put_contents("user.txt", "#\n", FILE_APPEND);
            echo "Success!\n";
         }
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