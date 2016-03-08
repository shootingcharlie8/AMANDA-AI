<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
   if ($_POST) {
      $keyword = $_POST['keyword'];
      $response = $_POST['response'];
      $keywordupper = strtoupper($keyword);
      $responseupper = strtoupper($response);
      $keywordFinal = "K" . $keywordupper . "\n";
      $responseFinal = "K" . $responseupper . "\n";
      if( strpos(file_get_contents("user.txt"),$keywordFinal) !== false) {
         if (strpos(file_get_contents("script.txt"),$keywordFinal) !== false) {
            echo "Error: Keyword Exists!!";
               // do stuff
            }
            else {
               file_put_contents("user.txt", $keywordFinal, FILE_APPEND);
               file_put_contents("user.txt", $responseFinal, FILE_APPEND);
               file_put_contents("user.txt", "#\n", FILE_APPEND);
               echo "Success!";
            }
         }
      }
?>
<html>
   <body>
      <form action="" method="post">
         Keyword: <input type="text" name="keyword" value="keyword" />
         Response: <input type="text" name="response" value="response" />
         <input type = "submit" />
      </form>
      
   
   </body>
</html>