<?php
// common library of functions to be used across projects

/**
 * Function that prints an object/array in pretty format.
 * @param mixed $var
 */
function dump($var)
{
    echo "<pre>";
    var_dump($var);
    echo "</pre>";
}

/**
 * Set the status type as message for across page 
 * @param string $status_type
 * @param string $message
 */
function set_status($status_type, $message)
{
    $_SESSION['status_type'] = $status_type;
    $_SESSION['status_message'] = $message;
}

/**
 * Gets the status  
 * @return string 
 */
function get_status()
{
    if (isset($_SESSION['status_type']) && isset($_SESSION['status_message'])) {

        $status = $_SESSION['status_type'];
        $message = $_SESSION['status_message'];

        unset($_SESSION['status_type']);
        unset($_SESSION['status_message']);

        return "toastr.$status('$message');";
    } else {
        return "";
    }
}




?>