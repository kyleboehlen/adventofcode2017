<?php
if(isset($_POST['input'])){
  $input = '';
  $input = $_POST['input'];

  //cover corner case for step one
  if($input == 1){
    $output = 0;
    echo $output;
    exit();
  }

//reach starts at one
$r = 1;
while($num < $input){
  $r++; //reach goes up by 2 every cycle
  $l = $r * 2 + 1; //lenth one one side of the grid
  $num = $l * $l; //largest number on the grid for the cycle
}

$p = ($l * 2) + (($l - 2) * 2); //perimeter of the grid where input is on the outer edge
$s = $num - $p + 1; //starting number of the grid

//check first side
$min = $s;
$max = $s + ($l - 2);
if($input >= $min && $input <= $max){
  $center = ($l - 1) / 2;
  $center--;
  $center += $s;

  $output = $center - $input;
  $output = abs($output);
  $output += $r;
  echo $output;
  exit();
}

//figure out which side it is on if not on side 1
while(!($input >= $min && $input <= $max)){
  $min = $max;
  $max = $min + ($l - 1);
}

 //calculate steps from center and add the reach
 $center = ($l - 1) / 2;
 $center += $min;

 $output = $center - $input;
 $output = abs($output);
 $output += $r;
 echo $output;

}
 ?>
