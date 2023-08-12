<?php

use admission as GlobalAdmission;
use PhpOffice\PhpWord\IOFactory;

session_start();
// error_reporting(0);
include('connection.php');
require('tcpdf/tcpdf.php');
require('fpdf/fpdf.php');
require 'vendor/autoload.php';

//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use PhpOffice\PhpWord\TemplateProcessor;
use Dompdf\Dompdf;



class admission
{

    function edit_doc($id)
    {
        $con = connect();
        $sql = "SELECT * FROM `admission_cancel` WHERE id = ? LIMIT 1";
        $stmt = mysqli_prepare($con, $sql);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "i", $id);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $row = mysqli_fetch_assoc($result);
            if ($row) {
                // $date = $row['apply_date']; // assuming $row['posting_date'] contains '2023-04-27 17:47:17'
                // $date = date('d-m-Y', strtotime($date));
                $name = $row['name'];
                $father_name = $row['father_name'];
                $enrollment_no = $row['enrollment_no'];
                $semester = $row['semester'];
                $course = $row['course'];
                $mobile_no = $row['mobile_no'];
                $email = $row['email'];
            } else {
                // Handle the case where no rows were returned
                echo "No rows found";
                // Close the current tab/window
                echo "<script>window.close();</script>";
                exit;
            }
        } else {
            // Handle the case where the query failed
            echo "Error: " . mysqli_error($con);
            echo "<script>window.close();</script>";
            exit;
        }
        $sem = "";

        if ($semester >= 1 && $semester <= 2) {
            $year = 1;
            $sem = "First Year - {$semester}";
            if ($semester == 1) {
                $sem .= "st";
            } else {
                $sem .= "nd";
            }
            $sem .= " Semester";
        } elseif ($semester >= 3 && $semester <= 4) {
            $year = 2;
            $sem = "Second Year - " . ($semester);
            if ($semester == 3) {
                $sem .= "rd";
            } else {
                $sem .= "th";
            }
            $sem .= " Semester";
        } elseif ($semester >= 5 && $semester <= 6) {
            $year = 3;
            $sem = "Third Year - " . ($semester);
            if ($semester == 5) {
                $sem .= "th";
            } else {
                $sem .= "th";
            }
            $sem .= " Semester";
        } elseif ($semester >= 7 && $semester <= 8) {
            $year = 4;
            $sem = "Fourth Year - " . ($semester);
            if ($semester == 7) {
                $sem .= "th";
            } else {
                $sem .= "th";
            }
            $sem .= " Semester";
        } else {
            $sem = "Invalid Semester";
        }
    }

    function get_details()
    {
        $con = connect();
        $query = "SELECT * FROM `admission_cancel` ORDER BY id DESC";
        $result = mysqli_query($con, $query);
        return $result;
    }

    function individual_detail($id)
    {
        $id = (int)$id;
        $con = connect();
        $query = "SELECT * FROM `admission_cancel` WHERE `id` = '$id'";
        $result = mysqli_query($con, $query);
        return $result;
    }
}
