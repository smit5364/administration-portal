<?php

include('Models/admission_cancel_model.php');

$_SESSION['redirect_url'] = $_SERVER['REQUEST_URI'];
if (!$_SESSION['enrollment']) {
    header('location:signin');
}

$admission_cancel = new admission_cancel;
if (isset($_SESSION['enrollment'])) {
    $enroll = $_SESSION['enrollment'];
    $studentInfo = $admission_cancel->getStudentInfo($enroll);
    $crs = $studentInfo['crs'];
    $name = $studentInfo['name'];
    $fathername = $studentInfo['fathername'];
    $email = $studentInfo['email'];
    $mobile = $studentInfo['mobile'];
} else {
    echo "No enrollment number found in session.";
}

if (isset($_POST['insert'])) {
    $name = addslashes($_POST['fullname']);
    $fathername = addslashes($_POST['fathername']);
    $enroll = addslashes($_POST['enrollment']);
    $course = addslashes($_POST['course']);
    $sem = addslashes($_POST['semester']);
    $email = addslashes($_POST['email']);
    $mobile = addslashes($_POST['Mobile_No']);
    // Insert Data  
    $admission_cancel->insert($enroll,$name,$fathername,$course,$sem,$mobile,$email);
    header('Location: admission_cancel_form');
}

include('Views/admission_cancel.php');
?>