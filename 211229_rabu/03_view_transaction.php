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

$totalPay = "SELECT SUM(sq_td.ammount * sq_g.price) 
    FROM transaction_detail sq_td
    JOIN goods sq_g ON sq_g.id = sq_td.goods_id
    WHERE sq_td.transaction_id = t.id";

$sql = "SELECT username, created_at, ({$totalPay}) total_pay
    FROM transaction t
    JOIN account a ON a.id = t.account_id
    WHERE t.id = ?";

// dd($sql);

$stmt = $db->prepare($sql);
$stmt->execute([
    $data['transaction_id']
]);

$transaction = $stmt->fetch(PDO::FETCH_ASSOC);

if ($transaction === false) {
    dd('Data tidak ditemukan');
}

// transaction_detail

$sql = "SELECT g.`name` goods, td.ammount, g.price unit_price, (g.price * td.ammount) total
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
