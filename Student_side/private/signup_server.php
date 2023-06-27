<?php
session_start();
include('db_connection.php');
class SignUp{
    function signup($fname,$mname,$lname,$father,$course,$sem,$enrollment,$email,$mobile,$pass){
        $con = connect();
        $query = "INSERT INTO `student`(`first_name`, `middle_name`, `last_name`, `father_name`, `course`, `semester`, `enrollment_no`, `email`, `mobile`, `password`) VALUES ('$fname','$mname','$lname','$father','$course','$sem', '$enrollment','$email','$mobile','$pass')";
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
}
$fname = $_POST['fname'];
$mname = $_POST['mname'];
$lname = $_POST['lname'];
$father = $_POST['father'];
$course = $_POST['course'];
$sem = $_POST['sem'];
$enrollment = $_POST['enrollment'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$pass = $_POST['pass'];

$signup = new SignUp;
$signup->signup($fname,$mname,$lname,$father,$course,$sem,$enrollment,$email,$mobile,$pass);
?>