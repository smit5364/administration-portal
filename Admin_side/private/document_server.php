<?php
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



class Document
{

    function get_details()
    {
        $con = connect();
        $query = "SELECT * FROM `document` ORDER BY id DESC";
        $result = mysqli_query($con, $query);
        return $result;
    }

    function individual_detail($id)
    {
        $con = connect();
        $query = "SELECT * FROM `document` WHERE `id` = '$id'";
        $result = mysqli_query($con, $query);
        return $result;
    }

    function update_verify($id)
    {
        $con = connect();
        $query = "UPDATE `document` SET `verify_flag`='1',`verify_by`='$_SESSION[name]' WHERE id = '$id'";
        $result = mysqli_query($con, $query);
        if ($result) {
            $_SESSION['title'] = "Verified Successfull!";
            $_SESSION['status_code'] = "success";
        } else {
            $_SESSION['title'] = "Verified Failed!";
            $_SESSION['status_code'] = "error";
        }
        header('location:document');
    }

    function approve_verify($id)
    {
        $con = connect();
        $query = "UPDATE `document` SET `approve_flag`='1',`approve_by`='$_SESSION[name]' WHERE id = '$id'";
        $result = mysqli_query($con, $query);
        if ($result) {
            $_SESSION['title'] = "Approved Successfull!";
            $_SESSION['status_code'] = "success";
        } else {
            $_SESSION['title'] = "Approved Failed!";
            $_SESSION['status_code'] = "error";
        }
        $this->sendmail($id);
        header('location:document');
    }

    function cancel_verify($id, $remark)
    {
        $con = connect();
        $query = "UPDATE `document` SET `remark`='$remark' WHERE `id` = '$id'";
        mysqli_query($con, $query);
        header('location:document');
    }

    function pending_verify()
    {
        $con = connect();
        $query = "SELECT COUNT(*) FROM `document` WHERE `verify_flag` = '0' AND `remark` = ''";
        $result = mysqli_query($con, $query);
        $data = mysqli_fetch_assoc($result);
        return $data['COUNT(*)'];
    }

    function pending_approval()
    {
        $con = connect();
        $query = "SELECT COUNT(*) FROM `document` WHERE `approve_flag` = '0' AND `verify_flag` = '1' AND `remark` = ''";
        $result = mysqli_query($con, $query);
        $data = mysqli_fetch_assoc($result);
        return $data['COUNT(*)'];
    }

    function reject_document()
    {
        $con = connect();
        $query = "SELECT COUNT(*) FROM `document` WHERE `remark` != ''";
        $result = mysqli_query($con, $query);
        $data = mysqli_fetch_assoc($result);
        return $data['COUNT(*)'];
    }

    function complete_deliver()
    {
        $con = connect();
        $query = "SELECT COUNT(*) FROM `document` WHERE `delever_flag` = '1' AND `remark` = ''";
        $result = mysqli_query($con, $query);
        $data = mysqli_fetch_assoc($result);
        return $data['COUNT(*)'];
    }

    function date_for_pickup($id)
    {
        $con = connect();
        $query = "UPDATE `document` SET `delever_flag`='1', `pickup_date`= curdate() WHERE `id` = '$id'";
        $result = mysqli_query($con, $query);
        if ($result) {
            $_SESSION['title'] = "Delivered Successfull!";
            $_SESSION['status_code'] = "success";
            header('Location: ../document');
        } else {
            $_SESSION['title'] = "Delivered Failed!";
            $_SESSION['status_code'] = "error";
            header('Location: ../document');
        }
    }

    function sendmail($id)
    {
        $con = connect();
        $sql = "SELECT * FROM `document` WHERE id = ? LIMIT 1";
        $stmt = mysqli_prepare($con, $sql);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "i", $id);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $row = mysqli_fetch_assoc($result);
            if ($row) {
                $date = $row['apply_date'];
                $date = date('d-m-Y', strtotime($date));
                $name = $row['name'];
                $email = $row['email'];
                $enrollment_no = $row['enrollment_no'];
                $semester = $row['semester'];
                $course = $row['course'];
                $documents = array();
                if ($row['document10th'] === 1) {
                    $documents[] = "10th Document";
                }
                if ($row['document12th'] === 1) {
                    $documents[] = "12th Document";
                }
                if ($row['leaving_certificate'] === 1) {
                    $documents[] = "Leaving Certificate";
                }
                $doc = implode(', ', $documents);
                $purpose = $row['purpose'];
                $year = date('Y', strtotime($date));
                if (date('m', strtotime($date)) < 4) {
                    $start_date = ($year - 1);
                    $end_date = $year;
                    $end_date_as_string = (string) $end_date;
                    $end_date = substr($end_date_as_string, -2);
                } else {
                    $start_date = $year;
                    $end_date = ($year + 1);
                    $end_date_as_string = (string) $end_date;
                    $end_date = substr($end_date_as_string, -2);

                }
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
        $pdf = new FPDF();

        $pdf->SetTitle("Bonafida Certificate");
        $pdf->SetAuthor("Bhagwan Mahavir College of Computer Application");

        // Step 4: Add new pages as needed (optional)
        $pdf->AddPage('H', array(205, 160), 0);
        $pdf->AddFont('Times New Roman', '', 'times.php');
        $pdf->AddFont('Times New Roman Bold', '', 'times-bold.php');
        $pdf->Ln(2);
        $pdf->SetFont('Times New Roman Bold', 'U', 15);
        $pdf->Image('private/Images/BMCCA_logo.png', 12, 10, 26, 26, "png");
        $pdf->SetLeftMargin(40);
        $pdf->SetTextColor(34, 42, 53);
        $pdf->Cell(0, 1, strtoupper("Bhagwan Mahavir College of computer Application"), 0, 1, 'C');
        $pdf->Ln(5);
        $pdf->SetFont('Times New Roman', '', 14);
        $pdf->SetTextColor(7, 42, 88);
        $pdf->Cell(0, 1, "Constituent College of Bhagwan Mahavir University", 0, 1, 'C');
        $pdf->Ln(8);
        $pdf->SetFont('Times New Roman Bold', '', 9);
        $pdf->SetTextColor(0, 0, 0);
        $pdf->Image('private/Images/email.png', 42, 25, 4, 4, "png");
        $pdf->Cell(7, 10, "", 0, 0, 'L');
        $pdf->Cell(75, 1, "dean.bmcca@bmusurat.ac.in", 0, 0, 'L');
        $pdf->Image('private/Images/phone.png', 122, 25, 4, 4, "png");
        $pdf->Cell(5, 10, "", 0, 0, 'R');
        $pdf->Cell(95, 1, "0261-6770125/23, +91-7575803091", 0, 1, 'L');
        $pdf->Ln(6);
        $pdf->Image('private/Images/website.png', 42, 32, 4, 4, "png");
        $pdf->Cell(7, 10, "", 0, 0, 'L');
        $pdf->Cell(75, 1, "www.bmusurat.ac.in", 0, 0, 'L');
        $pdf->Image('private/Images/location.png', 122, 32, 4, 4, "png");
        $pdf->Cell(5, 10, "", 0, 0, 'R');
        $pdf->Cell(95, 1, "VIP Road, Surat, Gujarat-395007", 0, 1, 'L');
        $pdf->SetLeftMargin(10);
        $pdf->Ln(1);
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(0, 1, "_____________________________________________________________________________________________________", 0, 1, 'C');
        $pdf->Ln(2);
        $today = new DateTime();

        $twoDaysLater = $today->modify('+2 day');
        if ($twoDaysLater->format('N') == 7) {
            $twoDaysLater->modify('+1 day');
        }

        $pickup_date = $twoDaysLater->format('d-m-Y');
        $weekday_name = $twoDaysLater->format('l');

        $pdf->AddFont('CALIBRIB', '', 'CALIBRIB.php');
        $pdf->AddFont('Calibri', '', 'Calibri.php');
        $pdf->AddFont('Algerian_Regular', '', 'Algerian_Regular.php');
        $pdf->SetLeftMargin(25);
        $pdf->SetRightMargin(25);
        $pdf->Ln(9);
        $pdf->SetFont('Algerian_Regular', 'U', 14.5);
        $pdf->Cell(0, 10, "CHALLAN FOR document CERTIFICATE", 0, 1, 'C');
        $pdf->Ln(9);
        $pdf->SetFont('CALIBRIB', '', 14.5);
        $pdf->Cell(38, 10, "Token No : ", 0, 0, "L");
        $pdf->SetFont('Calibri', '', 14.5);
        $pdf->Cell(150, 10, $id, 0, 1, "L");
        $pdf->SetFont('CALIBRIB', '', 14.5);
        $pdf->Cell(38, 10, "Name : ", 0, 0, "L");
        $pdf->SetFont('Calibri', '', 14.5);
        $pdf->Cell(150, 10, $name, 0, 1, "L");
        $pdf->SetFont('CALIBRIB', '', 14.5);
        $pdf->Cell(38, 10, "Enrollment No : ", 0, 0, "L");
        $pdf->SetFont('Calibri', '', 14.5);
        $pdf->Cell(150, 10, $enrollment_no, 0, 1, "L");
        $pdf->SetFont('CALIBRIB', '', 14.5);
        $pdf->Cell(38, 10, "Document : ", 0, 0, "L");
        $pdf->SetFont('Calibri', '', 14.5);
        $pdf->Cell(150, 10, $doc, 0, 1, "L");
        $pdf->SetFont('CALIBRIB', '', 14.5);
        $pdf->Cell(38, 10, "Reason : ", 0, 0, "L");
        $pdf->SetFont('Calibri', '', 14.5);
        $pdf->Cell(150, 10, $purpose, 0, 1, "L");
        $pdf->SetFont('CALIBRIB', '', 14.5);
        $pdf->Cell(38, 10, "Apply Date : ", 0, 0, "L");
        $pdf->SetFont('Calibri', '', 14.5);
        $pdf->Cell(150, 10, $date, 0, 1, "L");
        $pdf->SetFont('CALIBRIB', '', 14.5);
        $pdf->Cell(38, 10, "Pick-up Date : ", 0, 0, "L");
        $pdf->SetFont('Calibri', '', 14.5);
        $pdf->Cell(150, 10, $weekday_name . ', ' . $pickup_date, 0, 1, "L");
        $pdfoutputfile = './private/pdf/temp-file.pdf';
        $pdfdoc = $pdf->Output($pdfoutputfile, 'F');
        $mail = new PHPMailer;

        try {
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
            $mail->Subject = 'document Certificate Approval and Pickup Information';
            $mail->isHTML(true);

            $mail->Body = '<html>
                        <head>
                        <style>
                            body {
                            font-family: Arial, sans-serif;
                            font-size: 16px;
                            line-height: 1.5;
                            color: #333;
                            margin: 0;
                            padding: 0;
                            background-color: #f5f5f5;
                            }
                            h1 {
                            font-size: 24px;
                            font-weight: bold;
                            margin-top: 0;
                            }
                            ul {
                            list-style: none;
                            margin: 0;
                            padding: 0;
                            }
                            li {
                            margin-bottom: 10px;
                            }
                            p {
                            margin-bottom: 20px;
                            }
                            .container {
                            max-width: 600px;
                            margin: 0 auto;
                            padding: 20px;
                            background-color: #fff;
                            }
                        </style>
                        </head>
                        <body>
                        <div class="container">
                            <h1>document Certificate Approved</h1>
                            <p>Dear ' . $name . ',</p>
                            <p>We are pleased to inform you that your document Certificate has been approved and is now ready for pickup at Bhagwan Mahavir University. Congratulations!</p>
                            <p>Please make a note of the pickup details:</p>
                            <ul>
                            <li><strong>Pickup Date:</strong> ' . $weekday_name . ', ' . $pickup_date . '</li>
                            </ul>
                            <p>Kindly ensure that you bring a valid ID proof when you come to collect your document Certificate.</p>
                            <p>If you have any questions or require further assistance, please don\'t hesitate to contact our support team. They will be more than happy to help you.</p>
                            <p>Once again, congratulations on the approval of your document Certificate. We look forward to serving you.</p>
                            <p>Best regards,<br>BMU</p>
                        </div>
                        </body>
                        </html>';
            $mail->addAttachment($pdfoutputfile, "challan.pdf");

            $mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

    function return_date($id)
    {
        $con = connect();
        $query = "UPDATE `document` SET `return_flag`='1' WHERE `id` = '$id'";
        $result = mysqli_query($con, $query);
        if ($result) {
            $_SESSION['title'] = "Returned Successfull!";
            $_SESSION['status_code'] = "success";
            header('Location: ../document');
        } else {
            $_SESSION['title'] = "Returned Failed!";
            $_SESSION['status_code'] = "error";
            header('Location: ../document');
        }
    }

}

$document = new document;
if ($_SESSION['type'] == "Clerk" && isset($_GET['pickup_id'])) {
    (int) $id = (int) $_GET['pickup_id'];
    $document->date_for_pickup($id);
    // header('Location: document');
}

if ($_SESSION['type'] == "Clerk" && isset($_GET['return_date'])) {
    (int) $id = (int) $_GET['return_date'];
    $document->return_date($id);
    // header('Location: document');
}

if (isset($_POST['id'])) {
    $id = addslashes($_POST['id']);
    $_SESSION['id'] = (int) $id;
}
?>