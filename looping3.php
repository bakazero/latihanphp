<?php

var_dump(1 % 2);
die;

$array = [
    'item 1',
    'item 2',
    'item 3',
    'item 4',
    'item 5',
    'item 6',
];

foreach ($array as $key => $value) {

    print_r("{$key} - {$value}");
    echo '<br>';
}
