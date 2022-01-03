<?php

require_once '../function.php';

$faker = Faker\Factory::create();

$db = dbConnection();

$db->query('SET FOREIGN_KEY_CHECKS = 0;');

truncateTable($db, 'transaction_detail');
truncateTable($db, 'transaction');
truncateTable($db, 'goods');
truncateTable($db, 'account');

$db->query('SET FOREIGN_KEY_CHECKS = 1;');

//////////////////

$accountCount = 10;
$goodsCount = 20;
$maxTransaction = 20;
$maxGoodsPerTransaction = 5;
$maxPerUnit = 10;

$account = [];
$goods = [];

try {
    $db->beginTransaction();

    for ($i = 0; $i < $accountCount; $i++) {
        $data = [
            'username' => $faker->userName,
            'password' => password_hash($faker->password(6, 6), PASSWORD_DEFAULT),
            'email' => $faker->email,
            'avatar' => $faker->imageUrl,
            'balance' => $faker->numberBetween(50000, 100000),
            'description' => $faker->text,
        ];

        insertData($db, 'account', $data);

        $data['id'] = $db->lastInsertId();
        $account[] = $data;
    }

    for ($i = 0; $i < $goodsCount; $i++) {
        $data = [
            'name' => $faker->name,
            'description' => $faker->text,
            'image' => $faker->imageUrl,
            'stock' => $faker->numberBetween(0, 100),
            'price' => $faker->numberBetween(10000, 100000),
        ];

        insertData($db, 'goods', $data);

        $data['id'] = $db->lastInsertId();
        $goods[] = $data;
    }

    // print_r([$account, $goods]);
    // die;

    for ($i = 0; $i < $maxTransaction; $i++) {
        $data = [
            'account_id' => $account[$faker->numberBetween(0, count($account) - 1)]['id'],
            'created_at' => $faker->dateTimeThisMonth()->format('Y-m-d H:i:s'),
        ];

        insertData($db, 'transaction', $data);

        $data['id'] = $db->lastInsertId();

        for ($j = 0; $j < $faker->numberBetween(1, $maxGoodsPerTransaction); $j++) {
            $detail = [
                'transaction_id' => $data['id'],
                'ammount' => $faker->numberBetween(1, $maxPerUnit),
            ];

            if ($j === 0) {
                $detail['goods_id'] = $goods[$faker->unique(true)->numberBetween(0, count($goods) - 1)]['id'];
            } else {
                $detail['goods_id'] = $goods[$faker->unique(false)->numberBetween(0, count($goods) - 1)]['id'];
            }

            // print_r([$i, $j, $detail]);

            insertData($db, 'transaction_detail', $detail);
        }
    }

    $db->commit();
} catch (Throwable $th) {
    $db->rollBack();
    dd($th->getMessage());
}

print_r('Selesai generate data.');
