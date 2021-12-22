<?php

require_once '../function.php';

$db = dbConnection();

$sql = "SELECT * FROM account";
$stmt = $db->prepare($sql);
$stmt->execute();

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($result as $key => $value) {
    print_r([
        'index' => $key,
        'id' => $value['id'],
        'email' => $value['email'],
    ]);

    echo "\n";
}
