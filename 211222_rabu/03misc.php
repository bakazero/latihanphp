<?php

require_once '../function.php';

$db = dbConnection();

// LENGTH

$sql = "SELECT id, description, LENGTH(description) as length FROM account WHERE LENGTH(description) < 125";
$stmt = $db->prepare($sql);
$stmt->execute();

$length = $stmt->fetchAll(PDO::FETCH_ASSOC);

// COUNT

$sql = "SELECT COUNT(*) as count FROM account WHERE LENGTH(description) < 125";
$stmt = $db->prepare($sql);
$stmt->execute();

$count = $stmt->fetch(PDO::FETCH_ASSOC);

dd([
    'data' => $length,
    'multi dimensi' => $length[2]['length'],
    'jumlah baris' => $count['count'],
]);


// pelajari fungsi sql lainnya
// referensi https://www.w3schools.com/mySQl/default.asp
// min, max, count, avg, sum