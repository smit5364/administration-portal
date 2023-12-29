<?php
include("Models/document_model.php");

$_SESSION['redirect_url'] = $_SERVER['REQUEST_URI'];
if (!$_SESSION['enrollment']) {
    header('location:signin');
}

$document = new document;
// For All course name on document.php
if (isset($_POST['course_code'])) {
    $course_code = addslashes($_POST['course_code']);
    $result = $document->fetch_semesters_from_table($course_code);
    echo $result;
    // for ($i = 1; $i <= $result; $i++) {
    //     if ($i == "1") {
    //         echo '<option value="' . $i . '">' . $i . 'st Semester</option>';
    //         continue;
    //     } elseif ($i == "2") {
    //         echo '<option value="' . $i . '">' . $i . 'nd Semester</option>';
    //         continue;
    //     } elseif ($i == "3") {
    //         echo '<option value="' . $i . '">' . $i . 'rd Semester</option>';
    //         continue;
    //     }
    //     echo '<option value="' . $i . '">' . $i . 'th Semester</option>';
    // }
}

// For student details to filled automatically document form
if (isset($_SESSION['enrollment'])) {
    $enroll = $_SESSION['enrollment'];
    $studentInfo = $document->getStudentInfo($enroll);
    $crs = $studentInfo['crs'];
    $name = $studentInfo['name'];
    $fathername = $studentInfo['fathername'];
    $email = $studentInfo['email'];
    $mobile = $studentInfo['mobile'];

} else {
    echo "No enrollment number found in session.";
}

// For insert data for document requesting by student
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
    $date = addslashes($_POST['date']);
    $document10th = '0';
    $document12th = '0';
    $leaving_certificate = '0';
    if (isset($_POST['10th'])) {
        $document10th = addslashes($_POST['10th']);
    }
    if (isset($_POST['12th'])) {
        $document12th = addslashes($_POST['12th']);
    }
    if (isset($_POST['leaving_certificate'])) {
        $leaving_certificate = addslashes($_POST['leaving_certificate']);
    }
    $feesrecipt = $_FILES['fees_recipt']['name'];
    $tempname = $_FILES['fees_recipt']['tmp_name'];
    $savefilename = $enroll . "_" . $sem . "_" . $feesrecipt;
    $folder = "../Admin_side/private/Fees_recipt/" . $savefilename;
    move_uploaded_file($tempname, $folder);
    // Insert Data
    $document->insert($enroll, $name, $fathername, $course, $sem, $mobile, $email, $purpose, $date, $document10th, $document12th, $leaving_certificate, $savefilename);
}

include("Views/document.php");
include("Controllers/sweet_alert.php");
?>