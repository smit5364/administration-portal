<?php
include('db_connection.php');
class SignUp{
    function signup($fname,$mname,$lname,$father,$course,$enrollment,$email,$mobile,$pass){
        $con = connect();
        $query = "INSERT INTO `student` (`first_name`, `middle_name`, `last_name`, `father_name`, `course`, `enrollment_no`, `email`, `mobile`, `password`) VALUES ('$fname','$mname','$lname','$father','$course','$enrollment','$email','$mobile','$pass')";
        $result = mysqli_query($con,$query);
        if($result){
            $_SESSION['title'] = "Signup Successfull";
            $_SESSION['status'] = "Please waiting to provide Login authority by administration.";
            $_SESSION['status_code'] = "success";
            header('Location: signin');
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
            return true;
        }
        return false;
    }

    function fetch_courses_from_table()
    {
        $conn = connect();
        $query = "SELECT * FROM `courses`";
        $result = mysqli_query($conn, $query);
        $courses = array();
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $courses[] = $row;
            }
        }
        return $courses;
    }
}
?>