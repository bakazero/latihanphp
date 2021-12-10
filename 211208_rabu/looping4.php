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

$bintang = '*';

for ($i = 5; $i > 0; $i--) {
    $text = '';

    for ($j = 0; $j < $i; $j++) {
        $text .= $bintang;
    }

    print_r($text);
    echo '<br>';
}
