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
$name = addslashes($_POST['name']);
$email = addslashes($_POST['email']);
$type = addslashes($_POST['type']);
$password = addslashes($_POST['password']);
$signup = new Signup;
$signup->insert($password,$name,$email,$type);

?>