<?php

?>
<?php require_once "include/header.php"; ?>
<?php require_once "include/navbar.php"; ?>

<section id="first_section">

    <div class="container bg-light my-4">

        <h1> Something </h1>

        <div class="row">
            
            <div class="col-12 col-md-3 col-lg-3">
                
                <div class="form-floating mb-3 mt-3">
                    <input type="text" class="form-control" id="txtCurrentDate" placeholder="Enter email" name="txtCurrentDate" readonly >
                    <label for="txtCurrentDate">Date</label>
                </div>

            </div>

            <div class="col-md-9 offset-md-3">
                <!-- Empty space will be here -->
            </div>

            <div class="col-12 col-md-3 col-lg-3">
                
                <div class="form-floating mb-3 mt-3">
                    <input type="text" class="form-control" id="" placeholder="Enter email" name="">
                    <label for="email">Cash Sales Amount</label>
                </div>

            </div>

            <div class="col-12 col-md-3 col-lg-3">
                
                <div class="form-floating mb-3 mt-3">
                    <input type="text" class="form-control" id="" placeholder="Enter email" name="">
                    <label for="email">Purchase Amount</label>
                </div>

            </div>

            <div class="col-12 col-md-3 col-lg-3">
                
                <div class="form-floating mb-3 mt-3">
                    <input type="text" class="form-control" id="" placeholder="Enter email" name="">
                    <label for="email">Expense Amount</label>
                </div>

            </div>

        </div>

        <div class="row">
            
            <div class="col-12 col-md-3 col-lg-3">
                
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

            </div>

            <div class="col-12 col-md-3 col-lg-3">
                
                <div class="form-floating mb-3 mt-3">
                    <input type="text" class="form-control" id="txtUPIWalletAmount" placeholder="Enter email" name="txtUPIWalletAmount">
                    <label for="txtUPIWalletAmount">UPI Amount</label>
                </div>

            </div>

            <div class="col-12 col-md-3 col-lg-3">
            </div>

            <div class="col-12 col-md-3 col-lg-3">
            </div>

        </div>

        <div class="row">
            <div class="col-12 col-md-3 col-lg-3">
                <div class="form-floating mt-3">
                    <select class="form-select" id="selSwipePos" name="selSwipePos">
                        <option>Select POS</option>
                        <option>1. HDFC</option>
                        <option>2. HDFC - Pine Labs</option>
                        <option>3. PayTM</option>
                    </select>
                    <label for="sel1" class="form-label">Swipe POS:</label>
                </div>
            </div>

            <div class="col-12 col-md-3 col-lg-3">
                
                <div class="form-floating mb-3 mt-3">
                    <input type="text" class="form-control" id="txtSwipeAmount" placeholder="Enter email" name="txtSwipeAmount">
                    <label for="txtUPIWalletAmount">Card Swipe Amount</label>
                </div>

            </div>
        </div>
        


    </div>

</section>

<script>
    window.onload = () => document.getElementById('txtCurrentDate').value = new Date().toLocaleDateString('en-GB').replace(/\//g, '-');
</script>

<?php require_once "include/footer.php"; ?>
