<?PHP
echo "<title>Day Two</title><link href=\"../coding.png\" type=\"image/png\" rel=\"icon\">";

if(isset($_POST['part'])){
  if($_POST['part'] == "partone"){
    $even = false;
  }else{
    $even = true;
  }
}else{
  $even = true;
}

$checksum = 0;


$input = file('./sampleinput.txt');

foreach($input as $line){
	$checksum += minMaxDiff($line, $even);
}

echo $checksum;

function minMaxDiff($line, $even){
  $line = trim($line);
  $line = preg_replace('/\s+/', ',', $line);
	$array = explode(",", $line);

  $max = 0;
  $min = 0;
  $first = true;

  foreach($array as $num){
    if($even){
      foreach($array as $num2){
        if($num % $num2 == 0 && $num / $num2 > 1){
          $diff = $num / $num2;
        }elseif($num2 % $num == 0 && $num2 / $num > 1){
          $diff = $num2 / $num;
        }
      }
    }else{
      if($first){
        $min = $num;
        $first = false;
      }
      if($num < $min){
        $min = $num;
      }
      if($num > $max){
        $max = $num;
      }
    }
  }

  if(!$even){
    $diff = $max - $min;
  }

	return $diff;
}
?>
