<?php

namespace App\models;

require_once '../vendor/autoload.php';

class DailyRestaurantReport
{
    private float $cash_in_hand_shortage;
    private float $reserve_cash_shortage;
    private $response = [ 'status'=>'NA'];
    private $conn ;

    public function __construct(
        private string $date,
        private float $sales_amount,
        private float $credit_bill_amount,
        private float $purchase_amount,
        private float $voucher_amount,
        private float $security_deposit_collected_amount,
        private float $security_deposit_refunded_amount,
        private float $upi_collection_amount,
        private float $swipe_colllection_amount,
        private float $petty_cash_amount,
        private float $cash_in_hand_amount,
        private float $reserve_cash_opening_amount,
        private float $reserve_cash_closing_amount,
        private string $note
    ) {
        $this->conn = new Database();
        echo "Object created success!";
        
    }

    public function validateData(){
        
        $error_count = 0;
        foreach(get_object_vars($this) as $name => $value){
            
            if($name != "response" && $name != 'date' && $name !='note' && $name != 'conn'){

                if($value == "" || !is_numeric($value)){
                    $this->response['status'] = 'error';
                    $this->response[$name] = "ERROR ! $name Needs to  be a valid number !";
                    $error_count++;
                }
            }
            if($error_count == 0){
                $this->response['status'] = 'success';
            }
        }
        
        return $this->response;
    }
    
    public function printObject(){
        foreach(get_object_vars($this) as $name => $value){
            
            if(!is_array($value)){
                echo $name . ">>" .$value."<br/>";
            }
            else{
                echo "<br/><br/>";
                var_dump($name);
                echo "<hr/>";
                var_dump($value);
            }
        }
            
        if(!is_array($value)){
            echo $name . ">>" .$value."<br/>";
        }
        else{
            echo "<br/><br/>";
            var_dump($name);
            echo "<hr/>";
            var_dump($value);
        }   
    }

    public function checkReportForDateAlreadyExists(){

        $query = "
            SELECT count(*)
            FROM daily_restaurant_report
            WHERE date = '{$this->date}'
        ";
        $this->conn->select($query,[]);
    }

    public function saveDailyReport(){

        $query = "

        ";
    }
        
}
