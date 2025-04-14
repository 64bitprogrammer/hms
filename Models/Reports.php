<?php
namespace App\models;

require_once __DIR__.'../../vendor/autoload.php';

class Reports
{

    public function __construct()
    {
        
    }

    function getMonthlyRestaurantSalesReport($month, $year)
    {
        $html = "";
        $conn = new Database();

        $query = "
            SELECT *
            FROM daily_restaurant_report
            WHERE MONTH(date) = ? AND YEAR(date) = ?;
            ORDER BY date
        ";
        $params = [$month, $year];
        $result = $conn->select($query,$params);

        foreach($result as $rec){

            if($rec['reserve_cash_shortage'] >=0 ){
                $reserve_cash_format = "text-success";
            }
            else{
                $reserve_cash_format = "text-danger";
            }

            if($rec['cash_in_hand_shortage'] >=0 ){
                $cash_in_hand_format = "text-success";
            }
            else{
                $cash_in_hand_format = "text-danger";
            }


            $html .= "
                <tr>
                    <td> ".date("d-m-Y", strtotime($rec['date']))." </td>
                    <td> &#8377;{$rec['sale_amount']} </td>
                    <td> &#8377;". $rec['purchase_amount'] + $rec['voucher_amount'] ." </td>
                    <td> &#8377;{$rec['upi_collection_amount']} </td>
                    <td> &#8377;{$rec['swipe_collection_amount']} </td>
                    <td> &#8377;{$rec['petty_cash_amount']} </td>
                    <td> &#8377;{$rec['cash_in_hand_amount']} </td>
                    <td> &#8377;<span class='$cash_in_hand_format'>{$rec['cash_in_hand_shortage']} </span> </td>
                    <td> &#8377;<span class='$reserve_cash_format'>{$rec['reserve_cash_shortage']} </span> </td>
                </tr>
            ";
        }

        return $html;
    }
}

?>