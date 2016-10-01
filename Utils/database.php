<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


class Field_calculate {
    const PATTERN = '/(?:\-?\d+(?:\.?\d+)?[\+\-\*\/])+\-?\d+(?:\.?\d+)?/';

    const PARENTHESIS_DEPTH = 10;

    public function calculate($input){
        if(strpos($input, '+') != null || strpos($input, '-') != null || strpos($input, '/') != null || strpos($input, '*') != null){
            //  Remove white spaces and invalid math chars
            $input = str_replace(',', '.', $input);
            $input = preg_replace('[^0-9\.\+\-\*\/\(\)]', '', $input);

            //  Calculate each of the parenthesis from the top
            $i = 0;
            while(strpos($input, '(') || strpos($input, ')')){
                $input = preg_replace_callback('/\(([^\(\)]+)\)/', 'self::callback', $input);

                $i++;
                if($i > self::PARENTHESIS_DEPTH){
                    break;
                }
            }

            //  Calculate the result
            if(preg_match(self::PATTERN, $input, $match)){
                return $this->compute($match[0]);
            }

            return 0;
        }

        return $input;
    }

    private function compute($input){
        $compute = create_function('', 'return '.$input.';');

        return 0 + $compute();
    }

    private function callback($input){
        if(is_numeric($input[1])){
            return $input[1];
        }
        elseif(preg_match(self::PATTERN, $input[1], $match)){
            return $this->compute($match[0]);
        }

        return 0;
    }
}


$Cal = new Field_calculate();

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
  // Counting Varibles (Some are not needed, I know.)
  $p = 0;
  $o = 0;
  $s = 0;
  $simarray = array();
  $simarray2 = array();
  $simarray3 = array();
  // Puts input to UPPERCASE for easier parsing
  $keyword3 = strtoupper($_GET['keyword']);
  // Seperates every word

if(1 === preg_match('~[0-9]~', $keyword3) AND strpos($keyword3, 'WEATHER') == false){
    #echo ("has numbers");
  $stripped = preg_replace('[a-zA-Z]', '', $keyword3);

    echo ($Cal->calculate($stripped));
}
  elseif (strpos($keyword3, 'WEATHER') !== false) {
    $strippedzip = (preg_replace('/\D/', '', $keyword3));
    $mapurl = 'http://maps.googleapis.com/maps/api/geocode/json?address=%20'.$strippedzip.'&sensor=false';
    $mapcontent = file_get_contents($mapurl);
    $mapjson = json_decode($mapcontent, true);
    $lat = ($mapjson["results"][0]['geometry']['location']['lat']);
    $lng = ($mapjson["results"][0]['geometry']['location']['lng']);
    $url = 'https://api.darksky.net/forecast/23f974c6c1a8870802812097922056b6/' . $lat . ',' . $lng . '';
    $content = file_get_contents($url);
    $weatherjson = json_decode($content, true);
    echo "It is currently: ", $weatherjson['currently']['summary'], " with a tempreture of ", $weatherjson['currently']['temperature'], ' degrees F.';

  }
  else {
    
      $responses2 = explode(" ", $keyword3);
      // Lists common words to remove
      $removedWords = array('OF', 'IN', 'TO', 'FOR', 'WITH', 'ON', 'AT', 'FROM', 'BY', 'AS');
      // Removes common words
      $responses = array_diff($responses2, $removedWords);
      $a = 0;
      // Call database for response

      $stmt = $pdo->prepare ("SELECT *, LEVENSHTEIN(`Keyword`, :keyword) AS distance FROM amanda3 ORDER BY `distance` ASC LIMIT 1");
      $stmt->execute(['keyword' => $keyword3]);
      $result = $stmt->fetch();
      $i = 0;
      // ****IMPORTANT****
      //WITHOUT THIS ECHO, THE SCRIPT WOULD NOT BE ABLE TO REPLY
      echo ($result['Response']);
      $a++;

      function sort_by_order ($a, $b)
      {
        return $b['sim'] -  $a['sim'];
      }
      while ($o < count($simarray)) {

        while ($simarray[$p]['sim'] === $simarray[0]['sim']) {
          $p++;
        }
        $o++;
      }
      $s = $p-1;
  }
  

}
?>
