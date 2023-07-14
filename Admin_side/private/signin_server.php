<?php
    include('private/connection.php');
    class Signin{
        function Search($email){
            $con = connect();
            $query = "SELECT * FROM `admin_info` WHERE email = '$email'";
            $result = mysqli_query($con,$query);
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){
                    $data[] = $row['name'];
                    $data[] = $row['password'];
                    $data[] = $row['type'];
                }
                return $data;
            }else{
                $msg = "Email Or Password are Wrong";
                return $msg;
            }
        }
    }    
?>