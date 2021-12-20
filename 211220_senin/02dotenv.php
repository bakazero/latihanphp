<?php

use Dotenv\Dotenv;

require_once '../vendor/autoload.php';

$dotenv = Dotenv::createImmutable('../');
$dotenv->load();

var_dump($_ENV);
