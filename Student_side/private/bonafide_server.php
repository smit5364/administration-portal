<?php
include('db_connection.php');
class bonafide {
    function insert($enroll,$name,$fathername,$course,$sem,$mobile,$email,$purpose,$feesrecipt){
        $conn = connect();
        $sql = "INSERT INTO `bonafide`(`enrollment_no`, `name`, `father_name`, `course`, `semester`, `mobile_no`, `email`, `purpose`, `fee_recipt`) VALUES ('$enroll','$name','$fathername','$course','$sem','$mobile','$email','$purpose','$feesrecipt')";
        mysqli_query($conn,$sql);
    }
}

?>