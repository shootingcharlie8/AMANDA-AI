<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
if ($_GET) {
        $keyword = $_GET['keyword'];
        $response = $_GET['response'];
        //file_put_contents("log.txt", $keyword, FILE_APPEND);
        //file_put_contents("log.txt", $response, FILE_APPEND);
        $file_name = "../assets/log.txt";
        $file_handler = fopen($file_name, 'a');
        fwrite($file_handler, "$keyword \n$response \n#\n");
        fclose($file_handler);
}
?>