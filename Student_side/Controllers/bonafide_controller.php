<?php
include('Models/bonafide_model.php');

$_SESSION['redirect_url'] = $_SERVER['REQUEST_URI'];
if (!$_SESSION['enrollment']) {
    header('location:signin');
}

$bonafide = new bonafide;
if (isset($_POST['course_code'])) {
    $course_code = addslashes($_POST['course_code']);
    $result = $bonafide->fetch_semesters_from_table($course_code);
    echo $result;
}

if (isset($_SESSION['enrollment'])) {
        $enroll = $_SESSION['enrollment'];
        $studentInfo = $bonafide->getStudentInfo($enroll);  
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
    $mobile = addslashes($_POST['mobile']);
    $purpose = addslashes($_POST['reason']);
    if ($purpose == "Other") {
        $purpose = '';
        $purpose = addslashes($_POST['other_reason']);
    }
    $feesrecipt = $_FILES['fees_recipt']['name'];
    $tempname = $_FILES['fees_recipt']['tmp_name'];
    $savefilename = $enroll . "_" . $sem . "_" . $feesrecipt;
    $folder = "../Admin_side/private/Fees_recipt/" . $savefilename;
    move_uploaded_file($tempname, $folder);
    $bonafide->insert($enroll, $name, $fathername, $course, $sem, $mobile, $email, $purpose, $savefilename);
}

include('Views/bonafide.php');
?>