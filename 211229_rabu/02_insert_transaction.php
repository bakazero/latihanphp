<?php

// save transaksi pembelian untuk account dengan berbagai produk
// ke table transaction dan transaction_detail

require_once '../function.php';
require_once './05_fungsi_yang_digunakan.php';

$faker = Faker\Factory::create();

$db = dbConnection();

// data

$data = [
    'account_id' => 3,
    'current_date' => date('Y-m-d H:i:s'),
    'currency' => 'IDR',
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
        ],
        [
            'goods_id' => 2,
            'ammount' => 2
        ],
    ],
];

try {
    $db->beginTransaction();

    // get user balance
    $user = getUser($db, $data['account_id']);

    // insert transaction + detail
    $transactionId = insertTransaction($db, $data);

    // get toPay
    $transaction = getToPay($db, $transactionId);

    // validation
    $validation = paymentValidation($user['balance'], $transaction['to_pay']);

    if ($validation === true) {
        // update balance
        paidUserBalance($db, $data['account_id'], $transaction['to_pay']);
    }

    $db->commit();
} catch (Throwable $th) {
    $db->rollBack();
    dd($th->getMessage());
}

if ($validation === true) {
    // success response
    dd([
        'success' => 1,
        'message' => 'Transaksi Berhasil.',
        'data' => [
            'transaction_id' => $transactionId,
            'old_balance' => $data['currency'] . ' ' . number_format($user['balance'], 2, '.', ','),
            'total_pay' => $data['currency'] . ' ' . number_format($transaction['to_pay'], 2, '.', ','),
            'new_balance' => $data['currency'] . ' ' . number_format($user['balance'] - $transaction['to_pay'], 2, '.', ','),
        ],
    ]);
} else {
    // failed response
    dd([
        'success' => 0,
        'message' => 'Transaksi Gagal.',
        'data' => [
            'transaction_id' => $transactionId,
            'balance' => $data['currency'] . ' ' . number_format($user['balance'], 2, '.', ','),
            'total_pay' => $data['currency'] . ' ' . number_format($transaction['to_pay'], 2, '.', ','),
            'deficiency' => $data['currency'] . ' ' . number_format($user['balance'] - $transaction['to_pay'], 2, '.', ','),
        ],
    ]);
}
