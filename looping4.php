<?php

// *
// **
// ***
// ****
// *****

$bintang = '*';
$text = '';

// print_r($text . $bintang);
// die;

// for ($i = 0; $i < 5; $i++) {
//     $text = $text . $bintang;
//     print_r($text);
//     echo '<br>';
// }

// for ($i = 5; $i > 0; $i--) {
//     $text = str_repeat($bintang, $i);
//     print_r($text);
//     echo '<br>';
// }

// $bintang = '*';

// for ($i = 5; $i > 0; $i--) {
//     $text = '';

//     for ($j = 0; $j < $i; $j++) {
//         $text .= $bintang;
//     }

//     print_r($text);
//     echo '<br>';
// }

$star = '*';
$spacer = '_';
$line = 5;

// 5  0  9
// 4  1  7
// 3  2  5
// 2  3  3
// 1  4  1

for ($i = $line; $i > 0; $i--) {
    $text = '';

    for ($j = 0; $j < ($line - $i); $j++) {
        $text = $text . $spacer;
    }

    for ($j = 0; $j < ($i * 2 - 1); $j++) {
        $text = $text . $star;
    }

    for ($j = 0; $j < ($line - $i); $j++) {
        $text = $text . $spacer;
    }

    print_r($text);
    echo '<br>';
}
