<?php
// For Bonafide Verification of Clerk side
function pending_bonafide_verify()
{
    $con = connect();
    $query = "SELECT COUNT(*) FROM `bonafide` WHERE `verify_flag` = '0' AND `remark` = ''";
    $result = mysqli_query($con, $query);
    $data = mysqli_fetch_assoc($result);
    return $data['COUNT(*)'];
}

// For Bonafide Approval of Head side
function pending__bonafide_approval()
    {
        $con = connect();
        $query = "SELECT COUNT(*) FROM `bonafide` WHERE `approve_flag` = '0' AND `verify_flag` = '1' AND `remark` = ''";
        $result = mysqli_query($con, $query);
        $data = mysqli_fetch_assoc($result);
        return $data['COUNT(*)'];
    }

// For Provide Authority of Head side
function pending_provide_authority(){
    $con = connect();
    $query = "SELECT COUNT(*) FROM `student` WHERE `Authority` = '0'";
    $result = mysqli_query($con , $query);
    $data = mysqli_fetch_assoc($result);
    return $data['COUNT(*)'];
}

// For Document verification of Clerk Side
function pending_document_verify()
    {
        $con = connect();
        $query = "SELECT COUNT(*) FROM `document` WHERE `verify_flag` = '0' AND `remark` = ''";
        $result = mysqli_query($con, $query);
        $data = mysqli_fetch_assoc($result);
        return $data['COUNT(*)'];
    }

// For Document Approval of Head Side
function pending_document_approval()
    {
        $con = connect();
        $query = "SELECT COUNT(*) FROM `document` WHERE `verify_flag` = '1' AND `approve_flag` = '0' AND `remark` = ''";
        $result = mysqli_query($con, $query);
        $data = mysqli_fetch_assoc($result);
        return $data['COUNT(*)'];
    }
?>