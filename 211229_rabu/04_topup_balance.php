<?php

// fitur topup untuk user

require_once '../function.php';
require_once './05_fungsi_yang_digunakan.php';

$faker = Faker\Factory::create();

$db = dbConnection();

// data

$data = [
    'account_id' => 3,
    'top_up' => 500000,
    'currency' => 'IDR'
];

try {
    $db->beginTransaction();

    $user = getUser($db, $data['account_id']);

    topupUserBalance($db, $data['account_id'], $data['top_up']);

    $db->commit();
} catch (Throwable $th) {
    $db->rollBack();
    dd($th->getMessage());
}

dd([
    'success' => 1,
    'message' => 'Top-up Berhasil.',
    'data' => [
        'old_balance' => $data['currency'] . ' ' . number_format($user['balance'], 2, '.', ','),
        'top_up' => $data['currency'] . ' ' . number_format($data['top_up'], 2, '.', ','),
        'new_balance' => $data['currency'] . ' ' . number_format($user['balance'] + $data['top_up'], 2, '.', ','),
    ],
]);
