<?php
session_start();

define('APP_ROOT',  realpath(__DIR__ . '/../'));
define('APP_ENV', 'development');
//define('APP_ENV', 'production');

if (APP_ENV == 'development') {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
}

require_once(APP_ROOT . '/vendor/autoload.php');

$dotenv = Dotenv\Dotenv::createImmutable(APP_ROOT);
$dotenv->load();

