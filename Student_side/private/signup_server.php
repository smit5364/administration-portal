<?php
session_start();
include('db_connection.php');
class SignUp{
    function signup($fname,$mname,$lname,$father,$course,$enrollment,$email,$mobile,$pass){
        $con = connect();
        $query = "INSERT INTO `student`(`first_name`, `middle_name`, `last_name`, `father_name`, `course`, `enrollment_no`, `email`, `mobile`, `password`) VALUES ('$fname','$mname','$lname','$father','$course','$enrollment','$email','$mobile','$pass')";
        $result = mysqli_query($con,$query);
        if($result){
            $_SESSION['title'] = "Signup Successfull";
            $_SESSION['status'] = "Please waiting to provide Login authority by administration.";
            $_SESSION['status_code'] = "success";
        }else{
            $_SESSION['title'] = "Signup Failed";
            $_SESSION['status'] = "Please Check Your SignUp Details.";
            $_SESSION['status_code'] = "error";
        }
    }

    function check_enrollment_exist($enrollment){
        $con = connect();
        $query = "SELECT * FROM `student` WHERE `enrollment_no` = '$enrollment'";
        $result = mysqli_query($con , $query);
        if(mysqli_num_rows($result) > 0){
            return 1;
        }else{
            return 0;
        }
    }
}
$signup = new SignUp;
if(isset($_POST['insert']) == "true"){
    $fname = addslashes($_POST['fname']);
$mname = addslashes($_POST['mname']);
$lname = addslashes($_POST['lname']);
$father = addslashes($_POST['father']);
$course = addslashes($_POST['course']);
$enrollment = addslashes($_POST['enrollment']);
$email = addslashes($_POST['email']);
$mobile = addslashes($_POST['mobile']);
$pass = addslashes($_POST['pass']);

$signup->signup($fname,$mname,$lname,$father,$course,$enrollment,$email,$mobile,$pass);
}

if(isset($_POST['enrollment'])){
    $enrollment = addslashes($_POST['enrollment']);
    $result = $signup->check_enrollment_exist($enrollment);
    echo $result;
}
?>