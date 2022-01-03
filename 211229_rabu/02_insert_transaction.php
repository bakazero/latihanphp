<?php

// save transaksi pembelian untuk account dengan berbagai produk
// ke table transaction dan transaction_detail

require_once '../function.php';

$faker = Faker\Factory::create();

$db = dbConnection();

// data

$data = [
    'account_id' => 3,
    'current_date' => date('Y-m-d H:i:s'),
    'purchase' => [
        [
            'goods_id' => 3,
            'ammount' => 3
        ],
        [
            'goods_id' => 6,
            'ammount' => 2
        ],
        [
            'goods_id' => 8,
            'ammount' => 2
        ]
    ],
];

// insert

$transactionId = null;

try {
    $db->beginTransaction();

    // insert transaction

    $sql = "INSERT INTO `transaction` (account_id, created_at)
        VALUES (?, ?)";

    $stmt = $db->prepare($sql);
    $stmt->execute([
        $data['account_id'],
        $data['current_date'],
    ]);

    $transactionId = $db->lastInsertId();

    // insert transaction_detail

    $sql = "INSERT INTO `transaction_detail` (transaction_id, goods_id, ammount) VALUES ";
    $sqlData = [];
    $sArray = [];

    foreach ($data['purchase'] as $item) {
        $sArray[] = "(?, ?, ?)";
        $sqlData[] = $transactionId;
        $sqlData[] = $item['goods_id'];
        $sqlData[] = $item['ammount'];
    }

    $sql = $sql . implode(', ', $sArray);

    // dd($sql);

    $stmt = $db->prepare($sql);
    $stmt->execute($sqlData);

    $db->commit();
} catch (Throwable $th) {
    $db->rollBack();
    dd($th->getMessage());
}

dd($transactionId);
