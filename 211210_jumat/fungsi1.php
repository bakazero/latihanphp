<?php

// buat fungsi matematika f(y) = x^2 + x + c

function y($x, $c)
{
    $result = $x * $x + $x + $c;
    return $result;
}

// cara penggunaan
$a = y(5, 2);
$b = y(10, 4);
$c = y(8, 3);

print_r([
    '$a' => $a,
    '$b' => $b,
    '$c' => $c,
]);
