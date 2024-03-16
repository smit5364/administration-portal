<?php
include('Models/other_document_model.php');
$_SESSION['redirect_url'] = $_SERVER['REQUEST_URI'];
if (!$_SESSION['enrollment']) {
    header('location:signin');
}

$other_document = new other_document;

if (isset($_SESSION['enrollment'])) {
    $enroll = $_SESSION['enrollment'];
    $studentInfo = $other_document->getStudentInfo($enroll);
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
    $sem = addslashes($_POST['Semester']);
    $email = addslashes($_POST['email']);
    $mobile = addslashes($_POST['Mobile_No']);
    $document_tc = '0';
    $document_pdc = '0';
    if (isset($_POST['tc'])) {
        $document_tc = addslashes($_POST['tc']);
    }
    if (isset($_POST['pdc'])) {
        $document_pdc = addslashes($_POST['pdc']);
    }
    $feesrecipt = $_FILES['marksheet']['name'];
    $tempname = $_FILES['marksheet']['tmp_name'];
    $savefilename = $enroll . "_" . $sem . "_" . $feesrecipt;
    $folder = "../Admin_side/private/marksheet/" . $savefilename;
    move_uploaded_file($tempname, $folder);
    // Insert Data
    $other_document->insert($enroll, $name, $fathername, $course, $sem, $mobile, $email,  $document_tc, $document_pdc, $savefilename);
}

include('Views/other_document.php');

?>