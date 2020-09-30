<?php
$a = 5;
$b = "5";
// if ($a === $b) {
//     echo "statement1";

// }else if($a === "5"){
//     echo "statement3";
// }else {
//     echo "statement4";
// }
if ($a === $b):
    echo "statement1";
elseif ($a === "5"):
    echo "statement3";
else:
    echo "statement4";
endif;
echo "statement2";
