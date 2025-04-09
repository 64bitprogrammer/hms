<?php
// require_once "include/session.php";
require_once "include/connect.php";

session_unset();
session_destroy();

header("location: index.php");
exit();
?>