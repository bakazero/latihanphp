<?php

// var_dump('A' > 'C');
// die;

$array = [
    'A' => 80,
    'B' => 70,
    'C' => 55,
    'D' => 40,
    'E' => 25,
];

foreach ($array as $key => $value) {
    if ($key > 'C') {
        print_r("{$key} - {$value}");
        echo '<br>';
    }
}
