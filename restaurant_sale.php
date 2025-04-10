<?php

?>
<?php require_once "include/header.php"; ?>
<?php require_once "include/navbar.php"; ?>

<section id="first_section">

    <div class="container bg-light my-4">

        <h1> Daily Restaurant Report </h1>

        <div class="row">
            
            <div class="col-12 col-md-3 col-lg-3">
                
                <div class="form-floating mb-3 mt-3">
                    <input type="date" class="form-control datepicker" id="txt_date" placeholder="" name="txt_date"  >
                    <label for="txtCurrentDate">Date</label>
                </div>

            </div>

            <div class="col-md-9 offset-md-3">
                <!-- Empty space will be here -->
            </div>

            <div class="col-12 col-md-3 col-lg-3">
                
                <div class="form-floating mb-3 mt-3">
                    <input type="text" class="form-control" id="txt_sale_amount" placeholder="" name="txt_sale_amount" oninput="formatCurrency(this)">
                    <label for="txt_sale_amount">Sales Amount</label>
                </div>

            </div>

            <div class="col-12 col-md-3 col-lg-3">
                
                <div class="form-floating mb-3 mt-3">
                    <input type="text" class="form-control" id="txt_credit_bill_amount" placeholder="" name="txt_credit_bill_amount"  oninput="formatCurrency(this)">
                    <label for="txt_credit_bill_amount">Credit Bill Amount</label>
                </div>

            </div>

            <div class="col-12 col-md-3 col-lg-3">
                
                <div class="form-floating mb-3 mt-3">
                    <input type="text" class="form-control" id="txt_purchase_amount" placeholder="" name="txt_purchase_amount"  oninput="formatCurrency(this)">
                    <label for="txt_purchase_amount">Purchase Amount</label>
                </div>

            </div>

            <div class="col-12 col-md-3 col-lg-3">
                
                <div class="form-floating mb-3 mt-3">
                    <input type="text" class="form-control" id="txt_voucher_amount" placeholder="" name="txt_voucher_amount"  oninput="formatCurrency(this)">
                    <label for="txt_voucher_amount">Voucher Amount</label>
                </div>

            </div>

        </div>

        <div class="row">
            
            <!-- <div class="col-12 col-md-3 col-lg-3">
                
                <div class="form-floating mt-3">
                    <select class="form-select" id="selUPIWallet" name="selUPIWallet">
                        <option>Select Walllet</option>
                        <option>Google Pay</option>
                        <option>PayTM</option>
                        <option>PhonePe</option>
                        <option>HDFC UPI</option>
                    </select>
                    <label for="sel1" class="form-label">UPI Wallet:</label>
                </div>

            </div> -->

            <div class="col-12 col-md-3 col-lg-3">
                
                <div class="form-floating mb-3 mt-3">
                    <input type="text" class="form-control" id="txt_upi_collection_amount" placeholder="" name="txt_upi_collection_amount"  oninput="formatCurrency(this)">
                    <label for="txt_upi_collection_amount">UPI Amount</label>
                </div>

            </div>

            <div class="col-12 col-md-3 col-lg-3">
                
                <div class="form-floating mb-3 mt-3">
                    <input type="text" class="form-control" id="txtSwipeAmount" placeholder="" name="txt_swipe_collection_amount"  oninput="formatCurrency(this)">
                    <label for="txt_swipe_collection_amount">Card Swipe Amount</label>
                </div>

            </div>

            <div class="col-12 col-md-3 col-lg-3">
            </div>

            <div class="col-12 col-md-3 col-lg-3">
            </div>

        </div>

        <div class="row">


            <div class="col-12 col-md-3 col-lg-3">
                
                <div class="form-floating mb-3 mt-3">
                    <input type="text" class="form-control" id="txt_cash_in_hand" placeholder="" name="txt_cash_in_hand"  oninput="formatCurrency(this)">
                    <label for="txt_cash_in_hand">Cash in Hand</label>
                </div>

            </div>
            
            <div class="col-12 col-md-3 col-lg-3">
                
                <div class="form-floating mb-3 mt-3">
                    <input type="text" class="form-control" id="txt_petty_cash" placeholder="" name="txt_petty_cash"  oninput="formatCurrency(this)">
                    <label for="txt_petty_cash">Daily Petty Cash</label>
                </div>

            </div>
          
            <div class="col-12 col-md-3 col-lg-3">
                
                <div class="form-floating mb-3 mt-3">
                    <input type="text" class="form-control" id="txt_reserve_cash" placeholder="" name="txt_reserve_cash"  oninput="formatCurrency(this)">
                    <label for="txt_reserve_cash">Reserve Change</label>
                </div>

            </div>
            
        </div>

        <div class="row">

            <div class="col-12 col-md-3 col-lg-3">
                
                <div class="form-floating mb-3 mt-3">
                    <input type="text" class="form-control" id="txt_security_deposit_collected_amount" placeholder="" name="txt_security_deposit_collected_amount"  oninput="formatCurrency(this)">
                    <label for="txt_security_deposit_collected_amount">Security Deposit Collection</label>
                </div>

            </div>

            <div class="col-12 col-md-3 col-lg-3">
                
                <div class="form-floating mb-3 mt-3">
                    <input type="text" class="form-control" id="txt_security_deposit_refund_amount" placeholder="" name="txt_security_deposit_refund_amount"  oninput="formatCurrency(this)">
                    <label for="txt_security_deposit_refund_amount">Security Deposit Refund</label>
                </div>

            </div>
            
        </div>

        <div class="row">

            <div class="d-grid gap-2 col-6 mx-auto">
                
                <button class="btn btn-primary btn-block" name="submit" type="button" onclick="validateForm()"> Save </button>

            </div>
            
        </div>
        
    </div>

</section>

<script>
    const txt_date = document.getElementById('txt_date');
    const txt_sale_amount = document.getElementById('txt_sale_amount');
    const txt_credit_bill_amount = document.getElementById('txt_credit_bill_amount');
    const txt_purchase_amount = document.getElementById('txt_purchase_amount');
    const txt_voucher_amount = document.getElementById('txt_voucher_amount');
    const txt_upi_collection_amount = document.getElementById('txt_upi_collection_amount');
    const txt_swipe_collection_amount = document.getElementById('txt_swipe_collection_amount');
    const txt_cash_in_hand = document.getElementById('txt_cash_in_hand');
    const txt_petty_cash = document.getElementById('txt_petty_cash');
    const txt_reserve_cash = document.getElementById('txt_reserve_cash');
    const txt_security_deposit_collected_amount = document.getElementById('txt_security_deposit_collected_amount');
    const txt_security_deposit_refunded_amount = document.getElementById('txt_security_deposit_refunded_amount');

   // window.onload = () => document.getElementById('txtCurrentDate').value = new Date().toLocaleDateString('en-GB').replace(/\//g, '-');
   function formatCurrency(input) {
      let value = input.value.replace(/[^0-9.]/g, ''); // Remove non-numeric
      value = parseFloat(value).toFixed(2); // Ensure 2 decimal places

      // Add commas
      input.value = Number(value).toLocaleString('en-IN');
    }

    function validateForm(){

    }
</script>

<?php require_once "include/footer.php"; ?>
