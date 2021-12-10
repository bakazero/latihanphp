<?php

$angka = 5;

$result = ($angka > 6 || $angka < 3) ? 'okeh' : 'nonono';

// var_dump($angka > 6);
// var_dump($angka < 3);
// var_dump($angka > 6 || $angka < 3);
die;

$bebas = true;
var_dump(true || $bebas); // hasilnya pasti true tanpa pengecekan $bebas
var_dump(false && $bebas); // hasilnya pasti false tanpa pengecekan $bebas
die;

// if ($angka > 6) {
//     $result = 'okeh';
// } else {
//     $result = 'nonono';
// }

print_r($result);
die;















$angka = 5;

if ($angka < 3) {
    print_r($angka);
    echo ' lol';
} else {
    print_r('angka');
}

die;

$rank = 'E';
$nilai = 30;

if ($nilai > 80) {
    $rank = 'A';
} else if ($nilai > 65) {
    $rank = 'B';
} else if ($nilai > 50) {
    $rank = 'C';
} else if ($nilai > 35) {
    $rank = 'D';
}

$result = $rank;

print_r($result);
// echo $result;
