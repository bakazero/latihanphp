<?php

require_once '../function.php';

$faker = Faker\Factory::create();

$db = dbConnection();

$sql = "SELECT goods_id, SUM(ammount) total, COUNT(transaction_id) transaction
    FROM transaction_detail
    GROUP BY goods_id
    HAVING SUM(ammount) > 50
    ORDER BY total DESC";

$stmt = $db->prepare($sql);
$stmt->execute([]);

$transaction = $stmt->fetchAll(PDO::FETCH_ASSOC);

dd($transaction);
