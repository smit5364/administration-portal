<?php
    session_start();
    unset($_SESSION['enrollment']);
    session_destroy();
    header('Location:home');
    die();
?>