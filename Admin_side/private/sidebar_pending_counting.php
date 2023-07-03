<?php
function pending_bonafide_verify()
{
    $con = connect();
    $query = "SELECT COUNT(*) FROM `bonafide` WHERE `verify_flag` = '0' AND `remark` = ''";
    $result = mysqli_query($con, $query);
    $data = mysqli_fetch_assoc($result);
    return $data['COUNT(*)'];
}

function pending__bonafide_approval()
    {
        $con = connect();
        $query = "SELECT COUNT(*) FROM `bonafide` WHERE `approve_flag` = '0' AND `verify_flag` = '1' AND `remark` = ''";
        $result = mysqli_query($con, $query);
        $data = mysqli_fetch_assoc($result);
        return $data['COUNT(*)'];
    }

function pending_provide_authority(){
    $con = connect();
    $query = "SELECT COUNT(*) FROM `student` WHERE `Authority` = 0";
    $result = mysqli_query($con , $query);
    $data = mysqli_fetch_assoc($result);
    return $data['COUNT(*)'];
}
?>