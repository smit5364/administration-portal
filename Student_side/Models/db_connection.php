<?php
session_start();
function connect()
{
    $con = new mysqli('localhost', 'root', '', 'admin_portal');
    if (!$con) {
        die(mysqli_error($con));
    }
    return $con;
}
?>