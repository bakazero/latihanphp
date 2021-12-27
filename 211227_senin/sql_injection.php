<?php

require_once '../function.php';

$db = dbConnection();

$test = '3333 OR 1=1 --';

// contoh sql injection

$sql = "SELECT * FROM account WHERE id = {$test}";
$stmt = $db->query($sql);

$inject = $stmt->fetch(PDO::FETCH_ASSOC);

// contoh pengamanan dengan data binding

$sql = "SELECT * FROM account WHERE id = ?";
$stmt = $db->prepare($sql);
$stmt->execute([
    $test
]);

$binding = $stmt->fetch(PDO::FETCH_ASSOC);

print_r([
    'inject' => $inject,
    'binding' => $binding
]);
