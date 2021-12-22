<?php

require_once '../function.php';

$faker = Faker\Factory::create();

$db = dbConnection();

// update

$sql = "UPDATE account SET
    balance = ?
    WHERE balance > ?";

$stmt = $db->prepare($sql);
$stmt->execute([
    35000,
    75000
]);

// result

$sql = "SELECT * FROM account
    WHERE balance = ?";

$stmt = $db->prepare($sql);
$stmt->execute([
    35000
]);

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

dd($result);
