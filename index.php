<?php
require_once 'include/connect.php';
$page_title = "Login Page";

if (isset($_POST['btn_login'])) {

    $username = $_POST['txt_username'];
    $password = $_POST['txt_password'];

    if ($username != "" && $password != "") {

        $query = "SELECT * FROM users WHERE username=? and password=? ";
        $param = [$username, $password];
        $result = $db->select($query, $param);

        if (count($result) > 0) {
            session_name("hmsv1.0");
            session_start();
            set_status('success', 'Login Successful !');
            header("Location:dashboard.php");
        } else {
            set_status('warning', 'Invalid Username or Password !');
        }

    }
}

?>
<?php require_once "include/header.php"; ?>

<section id="first_section">

    <div class="container-fluid">
        <div class="row mt-5 pt-5">
            <div class="col"></div>
            <div class="col">

                <div class='row'>

                    <div class='col-md-3'></div>

                    <div class='col-md-6 '>
                        <h1 class="text-center"> Login </h1>
                        <form class="mt-4" method="post" name='login_form' id="login_form"
                            onsubmit="return validate_login_form()">

                            <div class='form-floating mb-3 mt-3'>
                                <input type='text' class='form-control' name='txt_username' id='txt_username'
                                    autocomplete="off" placeholder="Username" required />
                                <label for=''>Username</label>
                            </div>

                            <div class='form-floating mb-3 mt-3'>
                                <input type='password' class='form-control' name='txt_password' id='txt_password'
                                    autocomplete="off" placeholder="Password" required />
                                <label for=''>Password</label>
                            </div>

                            <button class='btn btn-primary mt-3' type='submit' name='btn_login'
                                id='btn_login'>Login</button>

                        </form>
                    </div>

                    <div class='col-md-3'></div>

                </div>
            </div>
            <div class="col"></div>
        </div>
    </div>

</section>
<script>
    function validate_login_form() {
        var username = document.getElementById('txt_username').value;
        var password = document.getElementById('txt_password').value;

        if (username != "" && password != "") {
            toastr.success(" Success");
            return true;
        }
        else {
            toastr.error("Please enter username & password !");
            return false;
        }
    }
</script>

<?php require_once "include/footer.php"; ?>