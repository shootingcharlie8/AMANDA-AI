<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
        $keyword = $_GET['keyword'];
        $file_name = "../textfiles/unknown.txt";
        $file_handler = fopen($file_name, 'a');
        fwrite($file_handler, "$keyword\n#\n");
        fclose($file_handler);
?>