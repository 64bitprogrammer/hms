<?php
require_once "connect.php";
require_once "session.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>
        <?= $page_title ?? "APP" ?>
    </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link href="css/bootstrap/bootstrap.min.css" rel="stylesheet" />
    <link href="css/toastr/toastr.min.css" rel="stylesheet" />
    <link href="css/default_style.css" rel="stylesheet" />
    <?= $addOnCSSLinks ?? "" ?>

    <script src="js/jquery/jquery-3.7.0.js"></script>
    <script src="js/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="js/toastr/toastr.min.js"></script>
    <script src="js/default_script.js"></script>
    <?= $addOnJSLinks ?? "" ?>
</head>

<body>