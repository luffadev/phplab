<?php
$a = 5;
switch ($a) {
    case 5:
        echo "a equal 5";
       break;
    case ($a > 3 && $a < 6):
        echo "a gt 5";
        break;
    case ($a < 5):
        echo "a less 5";
        break;
    default:
        echo "default";
        break;
}