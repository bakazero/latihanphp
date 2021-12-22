<?php

require_once '../function.php';

$faker = Faker\Factory::create();

$db = dbConnection();

$sql = "INSERT INTO account (username, password, email, avatar, balance, description)
    VALUES (?, ?, ?, ?, ?, ?)";

$stmt = $db->prepare($sql);
$stmt->execute([
    $faker->userName,
    password_hash('12345', PASSWORD_DEFAULT),
    $faker->email,
    $faker->imageUrl,
    $faker->numberBetween(50000, 100000),
    $faker->text
]);

// dd(password_verify('12345', '$2y$10$OYmFE3avH0F8ytlT4YtcMOnVCO4x2PQUg6ARmY.jKlKkzUgSgaucW'));
