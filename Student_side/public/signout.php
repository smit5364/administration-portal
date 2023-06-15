<?php
session_start();
unset($_SESSION['enrollment']);
header('location:home');
die();
?>