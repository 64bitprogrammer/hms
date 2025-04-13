<?php

?>
<?php require_once "include/header.php"; ?>
<?php require_once "include/navbar.php"; ?>

<section id="first_section">

    <div class="container bg-light my-4">

    <form action="controllers/DailyRestaurantReportController.php" name="restaurant_report_form" id="restaurant_report_form" method="post">

        <h1> Daily Restaurant Report </h1>

        <div class="row">
            
            <div class="col-12 col-md-3 col-lg-3">
                
                <div class="form-floating mb-3 mt-3">
                    <input type="date" class="form-control datepicker" id="txt_date" placeholder="" name="txt_date" required >
                    <label for="txtCurrentDate">Date</label>
                    <div class="input-error" id="txt_date_subtext">  </div>
                </div>

            </div>

            <!-- <div class="col-md-9 offset-md-3">
                <!-- Empty space will be here 
            </div> -->

            <div class="col-12 col-md-3 col-lg-3">
                
                <div class="form-floating mb-3 mt-3">
                    <input type="text" class="form-control" id="txt_sales_amount" required placeholder="" name="txt_sales_amount" oninput="formatCurrency(this)">
                    <label for="txt_sales_amount">Sales Amount</label>
                    <div class="input-error" id= "txt_sales_amount_subtext"></div>
                </div>

            </div>

            <div class="col-md-6 offset-md-6"></div>

            <div class="col-12 col-md-3 col-lg-3">
                
                <div class="form-floating mb-3 mt-3">
                    <input type="text" class="form-control" id="txt_credit_bill_amount" required placeholder="" name="txt_credit_bill_amount"  oninput="formatCurrency(this)">
                    <label for="txt_credit_bill_amount">Credit Bill Amount</label>
                    <div class="input-error" id= "txt_credit_bill_amount_subtext"></div>
                </div>

            </div>

            <div class="col-12 col-md-3 col-lg-3">
                
                <div class="form-floating mb-3 mt-3">
                    <input type="text" class="form-control" id="txt_advance_payments_received" required placeholder="" name="txt_advance_payments_received"  oninput="formatCurrency(this)">
                    <label for="txt_advance_payments_received">Advance Receipts</label>
                    <div class="input-error" id= "txt_advance_payments_received_subtext"></div>
                </div>

            </div>

            <div class="col-12 col-md-3 col-lg-3">
                
                <div class="form-floating mb-3 mt-3">
                    <input type="text" class="form-control" id="txt_purchase_amount" required placeholder="" name="txt_purchase_amount"  oninput="formatCurrency(this)">
                    <label for="txt_purchase_amount">Purchase Amount</label>
                    <div class="input-error" id= "txt_purchase_amount_subtext"></div>
                </div>

            </div>

            <div class="col-12 col-md-3 col-lg-3">
                
                <div class="form-floating mb-3 mt-3">
                    <input type="text" class="form-control" id="txt_voucher_amount" required placeholder="" name="txt_voucher_amount"  oninput="formatCurrency(this)">
                    <label for="txt_voucher_amount">Voucher Amount</label>
                    <div class="input-error" id= "txt_voucher_amount_subtext"></div>
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
                    <input type="text" class="form-control" id="txt_upi_collection_amount"  required placeholder="" name="txt_upi_collection_amount"  oninput="formatCurrency(this)">
                    <label for="txt_upi_collection_amount">UPI Amount</label>
                    <div class="input-error" id="txt_upi_collection_amount_subtext"></div>
                </div>

            </div>

            <div class="col-12 col-md-3 col-lg-3">
                
                <div class="form-floating mb-3 mt-3">
                    <input type="text" class="form-control" id="txt_swipe_collection_amount" placeholder="" required name="txt_swipe_collection_amount"  oninput="formatCurrency(this)">
                    <label for="txt_swipe_collection_amount">Card Swipe Amount</label>
                    <div class="input-error" id= "txt_swipe_collection_amount_subtext"></div>
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
                    <input type="text" class="form-control" id="txt_cash_in_hand" placeholder="" required name="txt_cash_in_hand"  oninput="formatCurrency(this)">
                    <label for="txt_cash_in_hand">Cash in Hand</label>
                    <div class="input-error" id="txt_cash_in_hand_subtext"></div>
                </div>

            </div>
            
            <div class="col-12 col-md-3 col-lg-3">
                
                <div class="form-floating mb-3 mt-3">
                    <input type="text" class="form-control" id="txt_petty_cash" placeholder="" required name="txt_petty_cash"  oninput="formatCurrency(this)">
                    <label for="txt_petty_cash">Daily Petty Cash</label>
                    <div class="input-error" id="txt_petty_cash_subtext"></div>
                </div>

            </div>
          
            <div class="col-12 col-md-3 col-lg-3">
                
                <div class="form-floating mb-3 mt-3">
                    <input type="text" class="form-control" id="txt_reserve_cash" placeholder="" required name="txt_reserve_cash"  oninput="formatCurrency(this)">
                    <label for="txt_reserve_cash">Reserve Change</label>
                    <div class="input-error" id="txt_reserve_cash_subtext"></div>
                </div>

            </div>
            
        </div>

        <div class="row">

        <div class="col-12 col-md-3 col-lg-3">
                
                <div class="form-floating mb-3 mt-3">
                    <input type="text" class="form-control" id="txt_soiled_notes" required placeholder="" name="txt_soiled_notes"  oninput="formatCurrency(this)">
                    <label for="txt_soiled_notes">Soiled Notes</label>
                    <div class="input-error" id="txt_soiled_notes_subtext"></div>
                </div>

            </div>

            <div class="col-12 col-md-3 col-lg-3">
                
                <div class="form-floating mb-3 mt-3">
                    <input type="text" class="form-control" id="txt_security_deposit_collected_amount" required placeholder="" name="txt_security_deposit_collected_amount"  oninput="formatCurrency(this)">
                    <label for="txt_security_deposit_collected_amount">Security Deposit Collection</label>
                    <div class="input-error" id="txt_security_deposit_collected_amount_subtext"></div>
                </div>

            </div>

            <div class="col-12 col-md-3 col-lg-3">
                
                <div class="form-floating mb-3 mt-3">
                    <input type="text" class="form-control" id="txt_security_deposit_refund_amount" required placeholder="" name="txt_security_deposit_refund_amount"  oninput="formatCurrency(this)">
                    <label for="txt_security_deposit_refund_amount">Security Deposit Refund</label>
                    <div class="input-error" id="txt_security_deposit_refund_amount_subtext"></div>
                </div>

            </div>
            
        </div>

        <div class="row">

            <div class="d-grid gap-2 col-6 mx-auto">
                
                <button class="btn btn-primary btn-block" name="btn_submit" type="submit" > Save </button>

            </div>
            
        </div>
    
    </div>
    </form>
</section>

<script>
    disableRequiredAttributes('restaurant_report_form');
    const txt_date = document.getElementById('txt_date');
    const txt_sales_amount = document.getElementById('txt_sales_amount');
    const txt_credit_bill_amount = document.getElementById('txt_credit_bill_amount');
    const txt_purchase_amount = document.getElementById('txt_purchase_amount');
    const txt_voucher_amount = document.getElementById('txt_voucher_amount');
    const txt_upi_collection_amount = document.getElementById('txt_upi_collection_amount');
    const txt_swipe_collection_amount = document.getElementById('txt_swipe_collection_amount');
    const txt_cash_in_hand = document.getElementById('txt_cash_in_hand');
    const txt_petty_cash = document.getElementById('txt_petty_cash');
    const txt_reserve_cash = document.getElementById('txt_reserve_cash');
    const txt_security_deposit_collected_amount = document.getElementById('txt_security_deposit_collected_amount');
    const txt_security_deposit_refund_amount = document.getElementById('txt_security_deposit_refund_amount');
    const txt_soiled_notes = document.getElementById('txt_soiled_notes');
    const frm_restaurant_report_form = document.getElementById('restaurant_report_form');
    var is_form_valid = false;

   // window.onload = () => document.getElementById('txtCurrentDate').value = new Date().toLocaleDateString('en-GB').replace(/\//g, '-');
   function formatCurrency(input) 
   {
      let value = input.value.replace(/[^0-9.]/g, ''); // Remove non-numeric
      value = parseFloat(value).toFixed(2); // Ensure 2 decimal places

      // Add commas
      input.value = Number(value).toLocaleString('en-IN');
    }


    frm_restaurant_report_form.addEventListener('submit', function(event) 
    {
        event.preventDefault(); // Stops the form from submitting
        console.log('Form submission stopped.');
        validateForm();
    });

    function requiredWithNonZeroValidation(object){
        error_obj = document.getElementById(object.id + '_subtext');

        if(object.value == ""){
            error_obj.innerHTML = "This field is required";
            is_form_valid = false;
            return;
        }
        else if( (isNaN(object.value) || object.value === null) && isNaN(getCommaTruncatedString(object.value))  ){
            error_obj.innerHTML = "Please enter a valid value";
            is_form_valid = false;
        }
        else if( parseInt(object.value) < 0 ){
            error_obj.innerHTML = "Please enter a valid amount";
            is_form_valid = false;
        }
        else if(parseInt(object.value) === 0 ){
            error_obj = "This value cannot be zero ";
            is_form_valid = false;
        }
        else{
            error_obj.innerHTML  = "";
            is_form_valid = true;
        }
    }

    function requiredButZeroAllowedValidation(object)
    {
        
        //console.log(object);
        //console.log(object.id + '_subtext');
        error_obj = document.getElementById(object.id + '_subtext');

        if(object.value == ""){
            error_obj.innerHTML = "This field is required";
            is_form_valid = false;
            return;
        }
        else if( (isNaN(object.value) || object.value === null) && isNaN(getCommaTruncatedString(object.value))  ){
            error_obj.innerHTML = "Please enter a valid value";
            is_form_valid = false;
        }
        else if( parseInt(object.value) < 0 ){
            error_obj.innerHTML = "Please enter a valid amount";
            is_form_valid = false;
        }
        else{
            error_obj.innerHTML  = "";
            is_form_valid = true;
        }
    }


    function validateForm()
    {
        const required_but_zero_allowed_fields = ['txt_swipe_collection_amount','txt_soiled_notes','txt_advance_payments_received','txt_purchase_amount','txt_voucher_amount','txt_security_deposit_collected_amount','txt_security_deposit_refund_amount','txt_credit_bill_amount'];
        const required_and_non_zero_positive = ['txt_upi_collection_amount','txt_cash_in_hand','txt_petty_cash','txt_reserve_cash','txt_sales_amount'];

        required_but_zero_allowed_fields.forEach((item)=>{
            //let a = document.getElementById(item);
            requiredButZeroAllowedValidation(document.getElementById(item));
            //console.log(a);
        });

        required_and_non_zero_positive.forEach((item)=>{
            let a = document.getElementById(item);
            requiredWithNonZeroValidation(document.getElementById(item));
            //console.log(a);
        });

        const date_error_obj = document.getElementById('txt_date_subtext');
        if((txt_date.value.trim()) == ""){
            date_error_obj.innerHTML = "Please select a valid date";
            is_form_valid = false;
        }
        else{
            is_form_valid = true;
        }

        if(!is_form_valid){
            return;
        }
        else{
            console.log('form submitted');
            //return;
            frm_restaurant_report_form.submit();
        }

    }

    // Disable required attribute from all fields in a form & set default values
    function disableRequiredAttributes(formId) {
        const form = document.getElementById(formId);
        if (!form) {
            console.error(`Form with ID "${formId}" not found.`);
            return;
        }

        // Loop through all form elements
        const elements = form.elements;
        for (let i = 0; i < elements.length; i++) {
            if (elements[i].hasAttribute('required')) {

                if(elements[i].id != "txt_date"){
                    elements[i].value = 10;
                }
                else{
                    console.log(elements[i]);
                    elements[i].value = "2025-04-13";
                }
                elements[i].removeAttribute('required');
            }
        }
    }

    // delete comma's from string
    function getCommaTruncatedString(str){
        return str.replace(/,/g, '');
    }

    
</script>

<?php require_once "include/footer.php"; ?>
