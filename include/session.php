<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if(basename($_SERVER['PHP_SELF']) != "index.php" && !isset($_SESSION['username']) ){
    header("Location: logout.php");
}
?>