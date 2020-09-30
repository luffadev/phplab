<?php
$i = 0;
while (++$i) {
    echo $i;
    switch ($i) {
        case 5:
            echo "At 5<br />\n";
           break 2;  /* Exit only the switch. */
        case 10:
            echo "At 10; quitting<br />\n";
            break 2;  /* Exit the switch and the while. */
        default:
            echo " default";
            echo " <br>";
           break;
    }
}