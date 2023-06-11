<?php
session_start();
unset($_SESSION['name']);
unset($_SESSION['type']);
header('location:signin');
die();
?>