<?php

use App\models\Reports;

$title = "Monthly Report";

// require_once __DIR__ . '/include/session.php';
require_once  __DIR__.("/vendor/autoload.php");;

function getCurrentMonth(){
    return date("m");
}

function getCurrentYear(){
    return date("Y");
}

function selectMonth($month) {
    return ($month == date('m')) ? ' selected ' : '';
}


function selectYear($year) {
    return ($year == date('Y')) ? ' selected ' : '';
}

?>
<?php require_once "include/header.php"; ?>
<?php require_once "include/navbar.php"; ?>

<section id="first_section">

<style>
    .report-table  th{
        text-align: center;
    }
</style>

<div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-5 col-lg-8">
                    <!-- Content can go here if needed -->
                </div>

                <div class="col-6 col-md-4 col-lg-2">
                    <div class="form-floating mt-3">
                        <select class="form-select" id="drp_month" name="drp_month">
                            <option value="01" <?=selectMonth('01')?>>January</option>
                            <option value="02" <?=selectMonth('02')?>>February</option>
                            <option value="03" <?=selectMonth('03')?>>March</option>
                            <option value="04" <?=selectMonth('04')?>>April</option>
                            <option value="05" <?=selectMonth('05')?>>May</option>
                            <option value="06" <?=selectMonth('06')?>>June</option>
                            <option value="07" <?=selectMonth('07')?>>July</option>
                            <option value="08" <?=selectMonth('08')?>>August</option>
                            <option value="09" <?=selectMonth('09')?>>September</option>
                            <option value="10" <?=selectMonth('10')?>>October</option>
                            <option value="11" <?=selectMonth('11')?>>November</option>
                            <option value="12" <?=selectMonth('12')?>>December</option>
                        </select>
                        <label for="drp_month" class="form-label">Month</label>
                    </div>
                </div>

                <div class="col-6 col-md-3 col-lg-2">
                    <div class="form-floating mt-3">
                        <select class="form-select" id="drp_year" name="drp_year">
                            <option value="2025" <?=selectYear('2025')?>>2025</option>
                        </select>
                        <label for="drp_year" class="form-label">Year</label>
                    </div>
                </div>
            </div> <!-- .row -->
        </div> <!-- .card-body -->
    </div> <!-- .card -->

    <div class='table-responsive'>
    <table id='restaurant_report_table' class="table table-bordered report-table">

        <thead>
            <tr>
                <th> Date</th>
                <th> Sale </th>
                <th> Cash Expense </th>
                <th> UPI </th>
                <th> Swipe </th>
                <th> Petty Cash </th>
                <th> Cash In Hand </th>
                <th> Cash In Hand Shortage </th>
                <th> Reserve Cash Shortage </th>
            </tr>
        </thead>
            <?php
                $report = new Reports();

                echo $report->getMonthlyRestaurantSalesReport(date('m'),date('Y'));
            ?>
        <tbody>

        </tbody>
    </table>
    </div>
</div> <!-- .container -->


</section>

<script>
    $(document).ready(function () {
        $('#restaurant_report_table').DataTable({
            pageLength: 50
        });
    });
</script>

<?php require_once "include/footer.php"; ?>
