<?php

require_once '../function.php';

$faker = Faker\Factory::create();

$db = dbConnection();

// before

$sql = "SELECT * FROM account
    WHERE balance = ?";

$stmt = $db->prepare($sql);
$stmt->execute([
    35000
]);

$before = $stmt->fetchAll(PDO::FETCH_ASSOC);

// delete

$sql = "DELETE FROM account
    WHERE balance = ?";

$stmt = $db->prepare($sql);
$stmt->execute([
    35000
]);

// result

$sql = "SELECT * FROM account
    WHERE balance = ?";

$stmt = $db->prepare($sql);
$stmt->execute([
    35000
]);

$after = $stmt->fetchAll(PDO::FETCH_ASSOC);

dd([
    'before' => $before,
    'after' => $after,
]);
