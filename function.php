<?php

use Dotenv\Dotenv;

date_default_timezone_set('Asia/Jakarta');

require_once 'vendor/autoload.php';

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

function dbConnection()
{
    $db = new PDO("{$_ENV['DB_CONNECTION']}:host={$_ENV['DB_HOST']};dbname={$_ENV['DB_DATABASE']}", $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD']);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    return $db;
}

function dd($var)
{
    print_r($var);
    die;
}

// DATA

function truncateTable(PDO $db, string $tableName)
{
    $sql = "TRUNCATE TABLE {$tableName}";
    $stmt = $db->prepare($sql);
    $stmt->execute();
}

function insertData(PDO $db, string $table, array $data)
{
    $sql = sprintf(
        "INSERT INTO %s (%s) VALUES(%s)",
        $table,
        implode(", ", array_keys($data)),
        ":" . implode(", :", array_keys($data))
    );
    $stmt = $db->prepare($sql);
    $stmt->execute($data);
}
