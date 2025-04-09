<?php
require_once 'include/connect.php';
// session_start();
$page_title = "Dashboard";
// set_status('success', 'Login Successful !');
?>
<?php require_once "include/header.php"; ?>
<?php require_once "include/navbar.php"; ?>

<section id="first_section">

    <div class="container-fluid">
    </div>

</section>

<script>

    $(document).ready(function () {
        <?= get_status(); ?>
        console.log('<?= get_status(); ?>' + 'okay');
        console.log('xoxo');
    });
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }

    $(document).ready(function onDocumentReady() {
        // toastr.success("Hello World!");
    });
</script>

<?php require_once "include/footer.php"; ?>