<?php
include('db_connection.php');
class getnamebyenroll{
    function getnamebyenroll(){
        $con = connect();
        $query = "SELECT * FROM `student` WHERE `enrollment_no` = '$_SESSION[enrollment]'";
        $result = mysqli_query($con,$query);
        while($row = mysqli_fetch_assoc($result)){
            $name = $row['first_name'];
        }
        return $name;
    }
}
?>