<?php
include('Models/signup_model.php');
$signup = new SignUp;
if (isset($_POST['signup'])) {
    $fname = addslashes($_POST['firstname']);
    $mname = addslashes($_POST['middlename']);
    $lname = addslashes($_POST['lastname']);
    $father = addslashes($_POST['fathername']);
    $course = addslashes($_POST['course']);
    $enrollment = addslashes($_POST['enrollment']);
    $email = addslashes($_POST['email']);
    $mobile = addslashes($_POST['mobile']);
    $password = addslashes($_POST['password']);
    $confirm_password = addslashes($_POST['confirm_password']);
    if ($enrollment != NULL && $enrollment != "") {
        $result = $signup->check_enrollment_exist($enrollment);
        if ($result == true) {
            $_SESSION['status_code'] = "error";
            $_SESSION['status'] = "Please Enter correct Enrollment";
            $_SESSION['title'] = "Enrollment Number Exist!";
        }
        else
        {
            if ($password == $confirm_password) {
                $encrypted_password = password_hash($confirm_password,PASSWORD_ARGON2ID);
                $signup->signup($fname, $mname, $lname, $father, $course, $enrollment, $email, $mobile, $encrypted_password);
                // header('Location: signin');
            } else {
                $_SESSION['title'] = "Password Wrong";
                $_SESSION['status'] = "Please check Password";
                $_SESSION['status_code'] = "error";
            }
        }
    }
}
include('Views/signup.php');
include('Controllers/sweet_alert.php');
