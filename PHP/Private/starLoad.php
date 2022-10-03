<?php
function starLoad($num){
  $string = "";
  $half = "";
  $string .= str_repeat("<i class=\"bx bxs-star\"></i>", $num);
  if (strstr($num, '.')){
    $num = ceil($num);
    $half .= "<i class=\"bx bxs-star-half\"></i>";
  }
  $string .= $half;
  $string .= str_repeat("<i class=\"bx bx-star\"></i>", (5-$num));

  return $string;
}
?>