<?php
namespace App\Controller;
error_reporting(E_ALL);

// require_once realpath('../Models/DailyRestaurantReport.php');
// use App\Models\DailyRestaurantReport\DailyRestaurantReport;


// var_dump($_REQUEST);

require_once realpath("../vendor/autoload.php");

if(isset($_POST['txt_date'])){
    
    // dump($_POST);

    $obj = new \App\Models\DailyRestaurantReport();

    echo "object created";
    // dump($obj);
}