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
        private float $advance_receipt_amount,
        private float $soiled_notes_amount,
        private float $purchase_amount,
        private float $voucher_amount,
        private float $security_deposit_collected_amount,
        private float $security_deposit_refunded_amount,
        private float $upi_collection_amount,
        private float $swipe_colllection_amount,
        private float $petty_cash_amount,
        private float $cash_in_hand_amount,
        private float $opening_reserve_cash_amount,
        private float $closing_reserve_cash_amount,
        private string $note
    ) {
        print_r($this);
        $this->conn = new Database();
        echo "Object created success!";
        
    }

    private function convertToFloat($value)
    {
        // Remove commas and convert to float
        return floatval(str_replace(',', '', $value));
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

        echo "<br/><pre>";
        var_dump($this);
        echo "</pre><br/>";
        // foreach(get_object_vars($this) as $name => $value){
            
        //     if(!is_array($value)){
        //         echo $name . ">>" .$value."<br/>";
        //     }
        //     else{
        //         echo "<br/><br/>";
        //         var_dump($name);
        //         echo "<hr/>";
        //         var_dump($value);
        //     }
        // }
            
        // if(!is_array($value)){
        //     echo $name . ">>" .$value."<br/>";
        // }
        // else{
        //     echo "<br/><br/>";
        //     var_dump($name);
        //     echo "<hr/>";
        //     var_dump($value);
        // }   
    }

    public function checkReportForDateAlreadyExists(){

        $query = "
            SELECT count(*) as count
            FROM daily_restaurant_report
            WHERE date = '{$this->date}'
        ";
        // echo $query;
        $records_count = $this->conn->select($query,[]);
        
        // echo "<pre>";
        // var_dump($records_count);
        // echo "</pre>";
        if($records_count[0]['count'] > 0 ){
            echo "WTF Thats not right";
        }
        else{
            echo "alls good macha ";
        }
    }

    private function getPreviousDayClosingReserveCash()
    {
        $datetime = new \DateTime($this->date);
        $datetime->modify('-1 day');
        $previous_date = $datetime->format('Y-m-d');

        $query = "  SELECT closing_reserve_cash_amount
                FROM daily_restaurant_report
                WHERE date = '$previous_date' ";
        $result = $this->conn->select($query);

        if(count($result)>0){
            return $result[0]['closing_reserve_cash_amount'];
        }
        else{
            return 0;
        }
    }

    private function getPreviousDayPettyCash()
    {
        $datetime = new \DateTime($this->date);
        $datetime->modify('-1 day');
        $previous_date = $datetime->format('Y-m-d');

        $query = "  SELECT petty_cash_amount
                FROM daily_restaurant_report
                WHERE date = '$previous_date' ";
                echo $query;
        $result = $this->conn->select($query);

        if(count($result)>0){
            return $result[0]['petty_cash_amount'];
        }
        else{
            return 0;
        }
    }

    public function saveDailyReport()
    {

        // Calculate Cash In Hand Shortage
        // Formula: Sales - Purchase - Expense - Soiled Notes - Credit Bills - UPI - Swipe - Security Deposit Refund
        //          + Security Deposit Collected - Petty Cash Difference
        $prev_day_petty_cash = $this->getPreviousDayPettyCash();
        echo 'Previous day petty cash = '.$prev_day_petty_cash . '<Br/>';
        $difference = 0;
        if ($prev_day_petty_cash == 0) {
            $difference = 0;
        } else {
            $difference = $prev_day_petty_cash - $this->petty_cash_amount;
        }


        // echo each operand to verify its value
        echo "<br/>Sales Amount: " . $this->sales_amount . "<br>";
        echo "Purchase Amount: " . $this->purchase_amount . "<br>";
        echo "Voucher Amount: " . $this->voucher_amount . "<br>";
        echo "Upi Collection Amount: " . $this->upi_collection_amount . "<br>";
        echo "Swipe Collection Amount: " . $this->swipe_colllection_amount . "<br>";
        echo "Security Deposit Refunded Amount: " . $this->security_deposit_refunded_amount . "<br>";
        echo "Security Deposit Collected Amount: " . $this->security_deposit_collected_amount . "<br>";
        echo "Difference: " . $difference . "<br>";
        echo "Cash In Hand Amount: " . $this->cash_in_hand_amount . "<br>";

        // Perform the calculation and assign to the variable
        $this->cash_in_hand_shortage = $this->cash_in_hand_amount 
            - ($this->sales_amount 
            - $this->purchase_amount 
            - $this->voucher_amount 
            - $this->upi_collection_amount 
            - $this->swipe_colllection_amount 
            - $this->security_deposit_refunded_amount 
            + $this->security_deposit_collected_amount
            - $this->credit_bill_amount
            - $this->soiled_notes_amount
            + $this->advance_receipt_amount
            + ($difference));

        // Echo the result
        echo "Calculated Cash In Hand Shortage: " . $this->cash_in_hand_shortage . "<br>";
        
        // Calculate Reserve Cash Shortage
        // Formula: Previous Day Closing Reserve Cash - Current Opening Reserve Cash
        $prev_day_closing_reserve_cash = $this->getPreviousDayClosingReserveCash();

        if ($prev_day_closing_reserve_cash === 0) {
            $this->reserve_cash_shortage = 0;
        } else {
            $this->reserve_cash_shortage =  $this->opening_reserve_cash_amount - $prev_day_closing_reserve_cash ;
        }

        $this->printObject();

        $query = "
            INSERT INTO daily_restaurant_report
            (
                date, 
                sale_amount, 
                purchase_amount, 
                voucher_amount, 
                credit_bill_amount,
                advance_receipt_amount,
                soiled_notes_amount,
                security_deposit_collected_amount,
                security_deposit_refunded_amount,
                upi_collection_amount,
                swipe_collection_amount,
                petty_cash_amount,
                cash_in_hand_amount,
                opening_reserve_cash_amount,
                closing_reserve_cash_amount,
                cash_in_hand_shortage,
                reserve_cash_shortage,
                note,
                created_by_user
            )
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
        ";
        $params = [
            $this->date,
            $this->sales_amount,
            $this->purchase_amount,
            $this->voucher_amount,
            $this->credit_bill_amount,
            $this->advance_receipt_amount,
            $this->soiled_notes_amount,
            $this->security_deposit_collected_amount,
            $this->security_deposit_refunded_amount,
            $this->upi_collection_amount,
            $this->swipe_colllection_amount,
            $this->petty_cash_amount,
            $this->cash_in_hand_amount,
            $this->opening_reserve_cash_amount,
            $this->closing_reserve_cash_amount,
            $this->cash_in_hand_shortage,
            $this->reserve_cash_shortage,
            $this->note,
            $_SESSION['user_id']
        ];
        

        $result = $this->conn->insert($query,$params);

        if($result > 0){
            return true;
        }
        return false;
    }
        
}
