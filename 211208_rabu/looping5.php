<?php

$star = '*';
$space = '_';
$line = 5;

// space    star    space  
//   0       9        0
//   1       7        1
//   2       5        2
//   3       3        3
//   4       1        4

// space  = line - i
// star   = i * 2 - 1

for ($i = $line; $i > 0; $i--) {
    $text = '';

    // space kiri
    for ($j = 0; $j < ($line - $i); $j++) {
        $text = $text . $space;
    }

    // bintang
    for ($j = 0; $j < ($i * 2 - 1); $j++) {
        $text = $text . $star;
    }

    // space kanan
    for ($j = 0; $j < ($line - $i); $j++) {
        $text = $text . $space;
    }

    print_r($text);
    echo '<br>';
}

// for ($i = $line; $i > 0; $i--) {
//     $text = '';

//     // space kiri
//     $text = $text . str_repeat($space, $line - $i);

//     // bintang
//     $text = $text . str_repeat($star, $i * 2 - 1);

//     // space kanan
//     $text = $text . str_repeat($space, $line - $i);

//     print_r($text);
//     echo '<br>';
// }
