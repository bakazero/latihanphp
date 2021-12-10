<?php

// bedanya == dan ===
// php punya variable dinamis

$int = 1;
$string = '1';
$bool = true;

var_dump([
    '$int == $string' => $int == $string,
    '$int === $string' => $int === $string,
    '$bool == $int' => $bool == $int,
    '$bool === $int' => $bool === $int,
    '$string == $bool' => $string == $bool,
    '$string === $bool' => $string === $bool,
]);
