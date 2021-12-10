<?php

$array = [
    [
        1, 2, true, 'hore', '5.31', 3.22
    ],
    [
        1, false, 3, [1, 3, 4], 'dor'
    ],
    [
        2, 'oke', 11.32
    ],
];

foreach ($array as $key => $value) {
    foreach ($value as $index => $item) {
        if (gettype($item) === 'string') {
            // print_r($item);
            print_r("[{$key}][{$index}]={$item} ");
        }
    }

    echo '<br>';
}
