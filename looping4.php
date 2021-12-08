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

// space    star    space  
//   0       9        0
//   1       7        1
//   2       5        2
//   3       3        3
//   4       1        4

// space  = line - i
// star   = line * 2 - 1

for ($i = $line; $i > 0; $i--) {
    $text = '';

    // spacer kiri
    for ($j = 0; $j < ($line - $i); $j++) {
        $text = $text . $spacer;
    }

    // bintang
    for ($j = 0; $j < ($i * 2 - 1); $j++) {
        $text = $text . $star;
    }

    // spacer kanan
    for ($j = 0; $j < ($line - $i); $j++) {
        $text = $text . $spacer;
    }

    print_r($text);
    echo '<br>';
}
