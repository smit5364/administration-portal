<?php
session_start();
include('private/connection.php');
class Bonafide{
    function get_details(){
        $con = connect();
        $query = "SELECT * FROM `bonafide` ORDER BY id DESC";
        $result = mysqli_query($con , $query);
        return $result;
    }

    function individual_detail($id){
        $con = connect();
        $query = "SELECT * FROM `bonafide` WHERE id = '$id'";
        $result = mysqli_query($con , $query);
        return $result;
    }
    
    function update_verify($id){
        $con = connect();
        $query = "UPDATE `bonafide` SET `verify_flag`='1',`verify_by`='$_SESSION[name]' WHERE id = '$id'";
        mysqli_query($con,$query);
    }

    function approve_verify($id){
        $con = connect();
        $query = "UPDATE `bonafide` SET `approve_flag`='1',`approve_by`='$_SESSION[name]' WHERE id = '$id'";
        mysqli_query($con,$query);
    }

    function deliver_verify($id){
        $con = connect();
        $query = "UPDATE `bonafide` SET `delever_flag`='1' WHERE id = '$id'";
        mysqli_query($con,$query);
    }

    function pending_verify(){
        $con = connect();
        $query = "SELECT COUNT(*) FROM `bonafide` WHERE `verify_flag` = '0'";
        $result = mysqli_query($con,$query);
        $data = mysqli_fetch_assoc($result);
        return $data['COUNT(*)'];
    }

    function pending_approval(){
        $con = connect();
        $query = "SELECT COUNT(*) FROM `bonafide` WHERE `approve_flag` = '0' AND `verify_flag` = '1'";
        $result = mysqli_query($con,$query);
        $data = mysqli_fetch_assoc($result);
        return $data['COUNT(*)'];
    }

    function complete_verify(){
        $con = connect();
        $query = "SELECT COUNT(*) FROM `bonafide` WHERE `verify_flag` = '1'";
        $result = mysqli_query($con,$query);
        $data = mysqli_fetch_assoc($result);
        return $data['COUNT(*)'];
    }

    function complete_deliver(){
        $con = connect();
        $query = "SELECT COUNT(*) FROM `bonafide` WHERE `delever_flag` = '1'";
        $result = mysqli_query($con,$query);
        $data = mysqli_fetch_assoc($result);
        return $data['COUNT(*)'];
    }
    
}
?>