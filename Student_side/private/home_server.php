<?php
include('private/db_connection.php');
function getnamebyenroll($enroll){
    $con = connect();
    $query = "SELECT * FROM `student` WHERE `enrollment_no` = '$enroll'";
    $result = mysqli_query($con,$query);
    while($row = mysqli_fetch_assoc($result)){
        $name = $row['first_name'];
    }
    return $name;
}
?>