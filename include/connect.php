<?php

use App\models\Database;

error_reporting(E_ALL);
session_name("hms-v1");
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once realpath("vendor/autoload.php");
require_once 'functions.php';

?>