<?php
include('connection.php');
class Signup{
    function insert($password,$name,$email,$type){
       try{
        $con = connect();
        $query = "INSERT INTO `admin_info`(`password`, `name`, `email`, `type`) VALUES ('$password','$name','$email','$type')";
        mysqli_query($con,$query);
       }catch(Exception $e){
            echo $e->getMessage();
       }
    }
}
$name = $_POST['name'];
$email = $_POST['email'];
$type = $_POST['type'];
$password = $_POST['password'];
$signup = new Signup;
$signup->insert($password,$name,$email,$type);

?>