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
  // Create connection

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
  $keyword3 = strtoupper($_GET['keyword']);

  $responses2 = explode(" ", $keyword3);
  $removedWords = array('OF', 'IN', 'TO', 'FOR', 'WITH', 'ON', 'AT', 'FROM', 'BY', 'AS');
  $responses = array_diff($responses2, $removedWords);
  $a = 0;
  $stmt = $pdo->prepare ("SELECT *, LEVENSHTEIN(`Keyword`, :keyword) AS distance FROM amanda3 ORDER BY `distance` ASC LIMIT 1");
  $stmt->execute(['keyword' => $keyword3]);
  $result = $stmt->fetch();
  $i = 0;
  echo ($result['Response']);
  if (sizeof($result) > 7) {

}
else {
}
$a++;

function sort_by_order ($a, $b)
{
  return $b['sim'] -  $a['sim'];
}
$d = 0;
while ($o < count($simarray)) {

  while ($simarray[$p]['sim'] === $simarray[0]['sim']) {
    $p++;
  }
  $o++;
}
$s = $p-1;

}
?>
