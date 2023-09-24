<?php
    include('db_connection.php');
    require 'vendor/autoload.php';

//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
    class Signin{
      function Search($enroll){
          $con = connect();
          $query = "SELECT * FROM `student` WHERE `enrollment_no` = '$enroll'";
          $result = mysqli_query($con,$query);
          if(mysqli_num_rows($result) > 0){
              while($row = mysqli_fetch_assoc($result)){
                $data[] = $row['first_name'];
                $data[] = $row['middle_name'];
                $data[] = $row['last_name'];
                $data[] = $row['father_name'];
                $data[] = $row['course'];
                $data[] = $row['semester'];
                $data[] = $row['enrollment_no'];
                $data[] = $row['email'];
                $data[] = $row['mobile'];
                $data[] = $row['password'];
                $data[] = $row['Authority'];
              }
            return $data;
          }else{
                $msg = "Email Or Password are Wrong";
                return $msg;
          }
      }
}