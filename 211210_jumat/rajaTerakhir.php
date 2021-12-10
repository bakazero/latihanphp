<?php

$childPegawai = [
    [
        'nav' => 'Tetap',
        'childs' => [],
    ],
    [
        'nav' => 'Tidak Tetap',
        'childs' => [],
    ]
];

$childMaster = [
    [
        'nav' => 'Pelanggan',
        'childs' => [],
    ],
    [
        'nav' => 'Barang',
        'childs' => [],
    ],
    [
        'nav' => 'Pegawai',
        'childs' => $childPegawai,
    ],
];

$menu = [
    [
        'nav' => 'Home',
        'childs' => [],
    ],
    [
        'nav' => 'Master',
        'childs' => $childMaster,
    ],
    [
        'nav' => 'Transaksi',
        'childs' => [],
    ],
    [
        'nav' => 'Laporan',
        'childs' => [],
    ],
    [
        'nav' => 'About',
        'childs' => [],
    ],
];

header('Content-Type: application/json; charset=utf-8');
print_r(json_encode($menu));
die;

function bebas(int $x)
{
    if ($x > 100) {
        return $x;
    }

    $x = $x + $x;

    return bebas($x);
}

$hasil = bebas(5);
print_r($hasil);
