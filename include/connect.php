<?php

use App\models\Database;

error_reporting(E_ALL);

// Safe session start
session_name("hms-v1");
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Always use __DIR__ to resolve relative paths correctly
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/functions.php';
