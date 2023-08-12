<?php
include('db_connection.php');
class document
{
    function insert($enroll, $name, $fathername, $course, $sem, $mobile, $email, $purpose, $date, $document10th, $document12th, $leaving_certificate, $savefilename)
    {
        $conn = connect();
        $sql = "INSERT INTO `document`(`enrollment_no`, `name`, `father_name`, `course`,  `semester` ,  `mobile_no` ,  `email` ,  `purpose` ,`date`,`document10th`,`document12th`,`leaving_certificate`,  `fee_recipt` , `apply_date` ) VALUES ('$enroll','$name','$fathername','$course','$sem','$mobile','$email','$purpose','$date','$document10th','$document12th','$leaving_certificate','$savefilename',curdate())";

        $bona = mysqli_query($conn, $sql);
        if ($bona) {
            # code...
            header("Location: home");
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }

    function getStudentInfo($enroll)
    {
        $conn = connect();
        $student = "SELECT * FROM `student` WHERE `enrollment_no`='$enroll'";
        $student_run = mysqli_query($conn, $student);

        if ($student_run && mysqli_num_rows($student_run) > 0) {
            $student_row = mysqli_fetch_assoc($student_run);
            $crs = $student_row['course'];
            $name = $student_row['last_name'] . " " . $student_row['first_name'] . " " . $student_row['middle_name'];
            $fathername = $student_row['father_name'];
            $email = $student_row['email'];
            $mobile = $student_row['mobile'];

            return array(
                'crs' => $crs,
                'name' => $name,
                'fathername' => $fathername,
                'email' => $email,
                'mobile' => $mobile
            );
        } else {
            header("Location: home"); // Redirect to the home page if enrollment number doesn't exist
            exit();
        }
    }


    function fetch_courses_from_table()
    {
        $conn = connect();
        $query = "SELECT * FROM `courses`";
        $result = mysqli_query($conn, $query);
        $courses = array();
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $courses[] = $row;
            }
        }
        return $courses;
    }

    function fetch_course_by_code($crs)
    {
        $conn = connect();
        $query = "SELECT * FROM `courses` WHERE `course_code` = '$crs'";
        $result = mysqli_query($conn, $query);
        $courses = array();
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $courses[] = $row;
            }
        }
        return $courses;
    }


    function fetch_semesters_from_table($course)
    {
        $conn = connect();
        $query = "SELECT `no_of_semester` FROM `courses` WHERE `course_code` = '$course'";
        $result = mysqli_query($conn, $query);
        $semesters = 0;
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $semesters = $row['no_of_semester'];
        }
        return $semesters;
    }
}

$document = new document;
if (isset($_POST['course_code'])) {
    $course_code = addslashes($_POST['course_code']);
    $result = $document->fetch_semesters_from_table($course_code);
    for ($i = 1; $i <= $result; $i++) {
        if ($i == "1") {
            echo '<option value="' . $i . '">' . $i . 'st Semester</option>';
            continue;
        } elseif ($i == "2") {
            echo '<option value="' . $i . '">' . $i . 'nd Semester</option>';
            continue;
        } elseif ($i == "3") {
            echo '<option value="' . $i . '">' . $i . 'rd Semester</option>';
            continue;
        }
        echo '<option value="' . $i . '">' . $i . 'th Semester</option>';
    }
}
?>