<?php

require_once '../function.php';

$faker = Faker\Factory::create();

$db = dbConnection();

// FORM HTML
// -----------------------
// username:bulu@mail.com
// password:12345
// kata[0]:Ini
// kata[1]:Ibu
// kata[2]:Budi
// barang[0][id]:5
// barang[0][name]:chitato
// barang[1][id]:8
// barang[1][name]:chiki

// FORM JSON (Javascript, Postman, dll)
// -----------------------
// {
//     "username": "bulu@mail.com",
//     "password": "12345",
//     "is_login": true,
//     "saldo": 5000,
//     "barang": [
//         {
//             "id": 9,
//             "name": "chiki"
//         },
//         {
//             "id": 4,
//             "name": "chitato"
//         }
//     ]
// }

echo '<pre>';

// ambil form html
// dd($_REQUEST);
// dd($_GET);
// dd($_POST);

// ambil form json
dd(
    json_decode(file_get_contents('php://input'), true)
);
