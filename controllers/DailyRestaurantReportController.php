<?php

namespace App\Controller;

use App\Models\DailyRestaurantReport;

// Enable full error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include custom helper functions (if needed)
require_once realpath("../include/functions.php");

// Include Composer autoload
require_once realpath("../vendor/autoload.php");

// Handle POST request
if (isset($_POST['txt_date'])) {
    dump($_POST);

    $obj = new DailyRestaurantReport();

    echo "Object created";
    dump($obj);
}
