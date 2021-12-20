<?php

require_once '../function.php';

$db = dbConnection();

$sql = "SELECT * FROM account";
$stmt = $db->prepare($sql);
$stmt->execute();

// $result = $stmt->fetch(PDO::FETCH_ASSOC);
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

dd($result);
