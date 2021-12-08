<?php

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
