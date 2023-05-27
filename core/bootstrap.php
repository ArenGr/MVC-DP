<?php
session_start();

define('APP_ROOT',  $_SERVER['DOCUMENT_ROOT']);

require_once(APP_ROOT . '/vendor/autoload.php');

$dotenv = Dotenv\Dotenv::createImmutable(APP_ROOT);
$dotenv->load();

if ($_ENV['APP_ENV'] == 'development') {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once(APP_ROOT . '/core/functions/functions.php');
}