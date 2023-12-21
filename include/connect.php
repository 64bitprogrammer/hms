<?php
session_name("hmsv1.0");
session_start();
require_once 'Database.php';
require_once 'functions.php';

// Create new connection object
$db = new Database();
?>