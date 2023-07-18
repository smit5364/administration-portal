<?php
include('connection.php');

require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;


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
        $query1 = "SELECT * FROM `student` WHERE `id` = ? LIMIT 1";
        $stmt = mysqli_prepare($con, $query1);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "i", $id);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $row = mysqli_fetch_assoc($result);
            if ($row) {
                $email = $row['email'];
            } else {
                echo "No rows found";
                echo "<script>window.close();</script>";
                exit;
            }
        }
        $mail = new PHPMailer;
        $mail->SMTPDebug = SMTP::DEBUG_OFF;
        $mail->isSMTP();
        $mail->Host = 'smtp.sendgrid.net';
        $mail->SMTPAuth = true;
        $mail->Username = 'apikey';
        $mail->Password = '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';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;

        $mail->setFrom('smitzaveri123@gmail.com', 'BMU');
        $mail->addAddress($email);
        $mail->addReplyTo('smitzaveri123@gmail.com', 'Information');

        $mail->isHTML(true);
        $mail->Subject = 'Login Approver';
        $mail->isHTML(true);

        $mail->Body = "Now You can login";

        $mail->send();
        $query = "UPDATE `student` SET `Authority`='1' WHERE `id` = '$id'";
        mysqli_query($con, $query);

    }
}
$student = new Students;
if (isset($_POST['approve'])) {
    $id = addslashes($_POST['approve']);
    $student->provide_authority($id);
}
?>