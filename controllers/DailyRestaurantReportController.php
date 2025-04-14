<?php

namespace App\Controller;
require_once __DIR__ . '/../include/session.php';

// print_r($_SESSION);

use App\models\DailyRestaurantReport;
use Exception;
use InvalidArgumentException;

// Enable full error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include custom helper functions (if needed)
// require_once realpath("../include/functions.php");

// Include Composer autoload
require_once realpath("../vendor/autoload.php");

// Handle POST request
if (isset($_POST['txt_date'])) {
    
    // dump($_POST);
    $data = [];
    foreach($_POST as $key => $value){

        if($key != 'txt_date' && $key !=  'txtar_note'){
            $data[$key] = floatval(csvToNumber($value));
        }
        else{
            $data[$key] = $value;
        }

    }
    // Add validation for received data

    try {
        // new object created
        $report = new DailyRestaurantReport(
            $data['txt_date'],
            $data['txt_sales_amount'],
            $data['txt_credit_bill_amount'],
            $data['txt_advance_payments_received'],
            $data['txt_soiled_notes'],
            $data['txt_purchase_amount'],
            $data['txt_voucher_amount'],
            $data['txt_security_deposit_collected_amount'],
            $data['txt_security_deposit_refund_amount'],
            $data['txt_upi_collection_amount'],
            $data['txt_swipe_collection_amount'],
            $data['txt_petty_cash'],
            $data['txt_cash_in_hand'],
            $data['txt_opening_reserve_cash'],
            $data['txt_closing_reserve_cash'],
            $data['txtar_note']);
        
        $response = $report->validateData();
        
        if($response['status'] != 'success'){
            echo "PROBLEM ->";
            $report->printObject();
            print_r($response);
        } 
        else{
            $report->checkReportForDateAlreadyExists();
            echo "Data validated successfully !";

            $status = $report->saveDailyReport();
            $msg = $status == true ? "Report saved successfully !" : "Error saving report !";
            $result = [
                'status' => $status,
                'msg' => $msg
            ];
            $_SESSION['operation_status'] = $result;
            header("Location: ../restaurant_sale.php");
        }
    }

    catch(Exception $e){
        echo "Validation Error: ". $e->getCode() . " -- ".$e->getMessage();
    }

}

function csvToNumber($str){
    return floatval(str_replace(',', '', $str));
}
