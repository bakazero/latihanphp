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

// header('Content-Type: application/json; charset=utf-8');
// print_r(json_encode($menu));
// die;

function buatTreeDiHtml(array $nodes)
{
    echo '<ul>';

    foreach ($nodes as $item) {
        echo "<li><a href=\"#\">{$item['nav']}</li>";

        buatTreeDiHtml($item['childs']);
    }

    echo '</ul>';
}


buatTreeDiHtml($menu);
