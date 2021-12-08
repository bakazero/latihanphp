<?php

$data = [
    'ayah' => 'Dadang Sujana',
    'ibu'  => 'Sri Narjan',
    'nenek' => 'Lia Ardan',
];

$result = [
    'title' => 'Ini Judul',
    'body'  => 'Eu labore commodo do ad excepteur dolor ut velit amet.',
    'data'  => $data,
];

header('Content-Type: application/json; charset=utf-8');
echo json_encode($result);
