<?php

require_once '../function.php';

$db = dbConnection();

$sql = "SELECT * FROM tag";
$stmt = $db->prepare($sql);
$stmt->execute();

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

print_r($result);
