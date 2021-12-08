<?php

// var_dump(1 % 2);
// die;

$array = [
    'item 1',
    'item 2',
    'item 3',
    'item 4',
    'item 5',
    'item 6',
    'item 7',
];

foreach ($array as $key => $value) {
    if ($key % 2 === 1) {
        print_r($value);
        echo '<br>';
    }
}
