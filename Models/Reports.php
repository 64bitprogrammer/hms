<?php
namespace App\models;

require_once __DIR__.'../../vendor/autoload.php';

class Reports
{

    public function __construct()
    {
        
    }

    private function formatCurrency($amount){
        $formatter = new \NumberFormatter("en_IN", \NumberFormatter::CURRENCY);
        $formatted =  $formatter->formatCurrency($amount, "INR");
        // Remove .00 if present
        return preg_replace('/\.00$/', '', $formatted);
    }

    private function formatNegativeNumbers($number){
        return $number >= 0 ? " text-success " : " text-danger " ;
    }

    function getMonthlyRestaurantSalesReport($month, $year)
    {
        $html = "<tbody>";
        $conn = new Database();

        $query = "
            SELECT *
            FROM daily_restaurant_report
            WHERE MONTH(date) = ? AND YEAR(date) = ?;
            ORDER BY date
        ";
        $params = [$month, $year];
        $result = $conn->select($query,$params);
        
        $total_sales = 0;
        $total_expenses = 0;
        $total_upi = 0;
        $total_swipe = 0;
        $total_petty_cash = 0;
        $total_cash_in_hand = 0;
        $total_cash_in_hand_shortage = 0;
        $total_reserve_cash_shortage = 0;

        foreach($result as $rec){

            $total_sales += $rec['sale_amount'];
            $total_expenses += $rec['purchase_amount'] + $rec['voucher_amount'];
            $total_upi += $rec['upi_collection_amount'];
            $total_swipe += $rec['swipe_collection_amount'];
            $total_petty_cash += $rec['petty_cash_amount'];
            $total_cash_in_hand += $rec['cash_in_hand_amount'];
            $total_reserve_cash_shortage += $rec['reserve_cash_shortage'];
            $total_cash_in_hand_shortage += $rec['cash_in_hand_shortage'];

            $html .= "
                <tr>
                    <td> ".date("d-m-Y", strtotime($rec['date']))." </td>
                    <td> ".$this->formatCurrency($rec['sale_amount'])." </td>
                    <td> ".$this->formatCurrency( $rec['purchase_amount'] + $rec['voucher_amount']) ." </td>
                    <td> ".$this->formatCurrency($rec['upi_collection_amount'])." </td>
                    <td> ".$this->formatCurrency($rec['swipe_collection_amount'])." </td>
                    <td> ".$this->formatCurrency($rec['petty_cash_amount'])." </td>
                    <td> ".$this->formatCurrency($rec['cash_in_hand_amount'])." </td>
                    <td> <span class='".$this->formatNegativeNumbers($rec['cash_in_hand_shortage'])."'>".$this->formatCurrency($rec['cash_in_hand_shortage'])." </span> </td>
                    <td> <span class='".$this->formatNegativeNumbers($rec['reserve_cash_shortage'])."'>".$this->formatCurrency($rec['reserve_cash_shortage'])." </span> </td>
                </tr>
            ";
        }
        // Totals
        $html .= "
                </tbody>
                <tfoot>
                <tr>
                    <td class='text-center'> <b> TOTAL </b>  </td>
                    <td> ".$this->formatCurrency($total_sales)." </td>
                    <td> ".$this->formatCurrency( $total_expenses) ." </td>
                    <td> ".$this->formatCurrency($total_upi)." </td>
                    <td> ".$this->formatCurrency($total_swipe)." </td>
                    <td> ".$this->formatCurrency($total_petty_cash)." </td>
                    <td> ".$this->formatCurrency($total_cash_in_hand)." </td>
                    <td> <span class='".$this->formatNegativeNumbers($total_cash_in_hand_shortage)."'>".$this->formatCurrency($total_cash_in_hand_shortage)." </span> </td>
                    <td> <span class='".$this->formatNegativeNumbers($total_reserve_cash_shortage)."'>".$this->formatCurrency($total_reserve_cash_shortage)." </span> </td>
                </tr>
                </tfoot>
            ";

        return $html;
    }
}

?>