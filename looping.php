<?php

$data = [
    'item 1',
    'item 2',
    'item 3',
    'item 4',
];

// $i = 0;
// while ($i < 0) {
//     print_r($data[$i]);
//     echo '<br>';

//     $i++;
// }

// $z = 0;
// do {
//     print_r($data[$z]);
//     echo '<br>';
//     $z++;
// } while ($z < 0);

// die;



// $data[] = 'item baru';
// $data[0] = 'item baru lagi';
// $data[3] = [
//     'ini array baru lagi',
//     'Eu consequat qui officia nulla consequat.',
// ];

// for ($i = 0; $i < count($array); $i++) {
//     print_r($array[$i]);
//     echo '<br>';
// }

// print_r('D' < 'C');
// die;

$array = [
    'A' => 80,
    'B' => 70,
    'C' => 55,
    'D' => 40,
    'E' => 25,
];

foreach ($array as $key => $value) {

    print_r("{$key} - {$value}");
    echo '<br>';
}
