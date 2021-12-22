<?php

require_once '../function.php';

$db = dbConnection();

// LENGTH

$sql = "SELECT id, description, LENGTH(description) as length FROM account";
$stmt = $db->prepare($sql);
$stmt->execute();

$length = $stmt->fetchAll(PDO::FETCH_ASSOC);

// COUNT

$sql = "SELECT COUNT(*) FROM account";
$stmt = $db->prepare($sql);
$stmt->execute();

$count = $stmt->fetchAll(PDO::FETCH_ASSOC);

dd([
    'length' => $length,
    'count'  => $count,
]);
