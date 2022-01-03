<?php

// ambil data dari transaksi yang sudah dilakukan oleh 1 user tertentu

require_once '../function.php';

$faker = Faker\Factory::create();

$db = dbConnection();

// data

$data = [
    'transaction_id' => 73
];

// transaction

$sql = "SELECT username, created_at
    FROM transaction t
    JOIN account a ON a.id = t.account_id
    WHERE t.id = ?";

$stmt = $db->prepare($sql);
$stmt->execute([
    $data['transaction_id']
]);

$transaction = $stmt->fetch(PDO::FETCH_ASSOC);

if ($transaction === false) {
    dd('Data tidak ditemukan');
}

// transaction_detail

$sql = "SELECT g.`name` goods, td.ammount
    FROM transaction_detail td
    JOIN goods g ON g.id = td.goods_id
    WHERE td.transaction_id = ?";

$stmt = $db->prepare($sql);
$stmt->execute([
    $data['transaction_id']
]);

$detail =  $stmt->fetchAll(PDO::FETCH_ASSOC);

$hasil = [
    'transaction' => $transaction,
    'detail' => $detail,
];

dd($hasil);
