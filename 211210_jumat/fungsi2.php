<?php

// buat fungsi str_repeat nya php

function strRepeat(string $string, int $repeat)
{
    $result = $string;

    for ($i = 0; $i < $repeat; $i++) {
        $result = $result . $string;
    }

    return $result;
}

// cara penggunaan
$a = strRepeat('abc', 3);
$b = strRepeat('budi ', 4);
$c = strRepeat('edo lagi makan, ', 3);

print_r([
    '$a' => $a,
    '$b' => $b,
    '$c' => $c,
]);
