<?php

$array = [
    [
        1, 2, 3, 4, 5, 6, 7, 8, 9, 10
    ],
    [
        1, 3, 5, 7, 9
    ],
    [
        2, 4, 6, 8, 10
    ],
];

echo '<pre>';

foreach ($array as $key => $value) {
    foreach ($value as $index => $item) {
        print_r("[{$key}][{$index}]={$item} ");
    }

    echo '<br>';
}

// print_r($array[3][1]);
// die;

echo '<pre>';
// print_r($array);
