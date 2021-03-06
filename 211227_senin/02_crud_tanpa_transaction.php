<?php

require_once '../function.php';

$faker = Faker\Factory::create();
$db = dbConnection();

function deleteData(PDO $db)
{
    $sql = "TRUNCATE TABLE __coba_tr";
    $stmt = $db->prepare($sql);
    $stmt->execute();
}

function insertData_(PDO $db, array $data)
{
    $sql = "INSERT INTO __coba_tr (title, body, views, created_at) VALUES (?, ?, ?, ?)";
    $stmt = $db->prepare($sql);
    $stmt->execute($data);
}

function showResult_(PDO $db)
{
    $sql = "SELECT * FROM __coba_tr";
    $stmt = $db->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

deleteData($db);

try {
    for ($i = 0; $i < 5; $i++) {
        if ($i === 3) {
            throw new Exception("Error (yang disengaja");
        }

        $data = [
            $faker->sentence(5),
            $faker->sentence(30),
            $faker->numberBetween(100, 100000),
            $faker->dateTimeThisMonth()->format('Y-m-d H:i:s'),
        ];

        insertData_($db, $data);
    }
} catch (Throwable $th) {
    print_r('Gagal' . "\n\n");
    dd(showResult_($db));
}

print_r('Sukses' . "\n\n");
dd(showResult_($db));
