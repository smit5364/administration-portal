<?php
$con = mysqli_connect("localhost", "root", "", "admin_portal");
if (!$con) {
	die("Connection failed: " . mysqli_connect_error());
}
?>