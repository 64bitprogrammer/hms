<?php
error_reporting(E_ALL);
session_name("hms-v1");
session_start();
require_once 'Database.php';
require_once 'functions.php';

// Create new connection object
$db = new Database();
?>