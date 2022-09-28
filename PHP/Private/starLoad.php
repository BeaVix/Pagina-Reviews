<?php
function starLoad($num){
    $string = "";
    $half = "";
    if (is_float($num)){
      $num = floor($num);
      $half .= "<i class=\"bx bxs-star-half\"></i>";
    }
    $string .= str_repeat("<i class=\"bx bxs-star\"></i>", $num);
    $string .= $half;
    $string .= str_repeat("<i class=\"bx bx-star\"></i>", (5-$num));

    return $string;
  }
?>