<?php
require_once "session.php";
require_once "connect.php";

session_unset();
session_destroy();

header("location: index.php");
exit();
?>