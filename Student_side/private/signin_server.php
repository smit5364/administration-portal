<?php
    include('private/db_connection.php');
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

        function send_forget_password_mail($enroll){
            $con = connect();
            $query = "SELECT * FROM `student` WHERE `enrollment_no` = '$enroll'";
            $result = mysqli_query($con,$query);
            $data = mysqli_fetch_array($result);
            $email = $data[8];
            $password = $data[10];
                
        }    
}
    $signin = new Signin;
    if(isset($_POST['enrollment'])){
        $enroll = addslashes($_POST['enrollment']);
        $signin->send_forget_password_mail($enroll);
    }
?>