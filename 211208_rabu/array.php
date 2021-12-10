<?php

$data = [
    'item 1',
    'item 2',
    'item 3',
    'item 4',
];

$data[] = 'item baru';
$data[0] = 'item baru lagi';
$data[3] = [
    'ini array baru lagi',
    'Eu consequat qui officia nulla consequat.',
];

echo '<pre>';
var_dump($data);
die;
