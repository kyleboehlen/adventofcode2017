<?php
if(isset($_POST['input'])){
  $input = '';
  for($i = 0; $i < strlen($_POST['input']); $i += 1){
    $input .= substr($_POST['input'], $i, 1).",";
  }
  $input = substr($input, 0, (strlen($input) - 1));
  $input_array = explode(",", $input);

  $output = 0;

  foreach($input_array as $index => $num){
    if($_POST['part'] == "partone"){
      if($index >= count($input_array) - 1){
        if($num == $input_array[0]){
          $output += $num;
        }
      }else{
        if($num == $input_array[$index + 1]){
          $output += $num;
        }
      }
    }elseif($_POST['part'] == "parttwo"){
      $alt_index = $index + (count($input_array) / 2);
      if($alt_index > count($input_array) - 1){
        $alt_index -= count($input_array);
      }
      if($num == $input_array[$alt_index]){
        $output += $num;
      }
    }
  }
  echo $output;
}
 ?>
