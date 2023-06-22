<?php
include('connection.php');
class Students
{
    function get_student_details()
    {
        $con = connect();
        $query = "SELECT * FROM `student` ORDER BY `Authority` ASC";
        $result = mysqli_query($con, $query);
        return $result;
    }

    function provide_authority($id)
    {
        $con = connect();
        $query = "UPDATE `student` SET `Authority`='1' WHERE `id` = '$id'";
        mysqli_query($con, $query);
    }
}
$student = new Students;
if (isset($_POST['approve'])) {
    $id = $_POST['approve'];
    $student->provide_authority($id);
}
?>