<?php

// By using foreach() loop, we can also remove specific elements from an array.
// array('jan', 'feb', 'march', 'april', 'may');
// (DELETE april)

$months = array('jan', 'feb', 'march', 'april', 'may');

// print_r($months);

foreach ($months as $month) {
    if ($month == "april") {
        continue;
    }
    echo "$month <br>";
}
//another method:
echo '<br><br>';

unset($months[3]);

foreach ($months as $month) {

    echo "$month <br>";
}
