<?php
// error_reporting(0);
include('Models/signin_model.php');
$signin = new Signin;
if (isset($_SESSION['enrollment'])) {
    header('Location:home');
}
if (isset($_POST['login'])) {
    $enroll = addslashes($_POST['enrollment']);
    $pass = addslashes($_POST['password']);
    $data = $signin->Search($enroll);
    if (password_verify($pass,$data[8])&& $data[9] == "1") {
        $_SESSION['enrollment'] = $data[5];
        if (isset($_SESSION['redirect_url'])) {
            $redirect_url = $_SESSION['redirect_url'];
            unset($_SESSION['redirect_url']);
            header('Location: home');
        } else {
            header('Location: home');
        }
    } else if (password_verify($pass,$data[8])&& $data[9] == "0") {
        $_SESSION['status_code'] = "error";
        $_SESSION['title'] = "You don't have authority for Login";
        $_SESSION['status'] = "Please wait for Login authority";
    } else {
        $_SESSION['status_code'] = "error";
        $_SESSION['title'] = "Please check your information!";
        $_SESSION['status'] = "Invalid Email or Password";
    }
}
include('Views/signin.php');
include('Controllers/sweet_alert.php');
?>
