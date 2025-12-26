/* SQL query to auto recalculate daily shortages in cash for a specific date */
UPDATE daily_restaurant_report AS current
LEFT JOIN daily_restaurant_report AS prev
  ON prev.date = DATE_SUB(current.date, INTERVAL 1 DAY)
SET 
  current.cash_in_hand_shortage = 
    current.cash_in_hand_amount - (
      current.sale_amount 
      - current.purchase_amount 
      - current.voucher_amount 
      - current.upi_collection_amount 
      - current.swipe_collection_amount 
      - current.security_deposit_refunded_amount 
      + current.security_deposit_collected_amount
      - current.credit_bill_amount
      - current.soiled_notes_amount
      + current.advance_receipt_amount
      + IFNULL(prev.petty_cash_amount - current.petty_cash_amount, 0)
    ),
  
  current.reserve_cash_shortage = 
    IFNULL(current.opening_reserve_cash_amount - prev.closing_reserve_cash_amount, 0);
