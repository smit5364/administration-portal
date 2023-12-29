<?php
include('db_connection.php');
require 'vendor/autoload.php';

//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

class Forget_password
{
    function send_forget_password_mail($enroll)
    {
        $con = connect();
        $query = "SELECT * FROM `student` WHERE `enrollment_no` = '$enroll'";
        $result = mysqli_query($con, $query);
        $data = mysqli_fetch_array($result);
        $fname = $data[1];
        $email = $data[7];
        $password = $data[9];
        $mail = new PHPMailer(true);
        $mail->SMTPDebug = SMTP::DEBUG_OFF;
        $mail->isSMTP();
        $mail->Host = 'smtp.sendgrid.net';
        $mail->SMTPAuth = true;
        $mail->Username = 'apikey';
        $mail->Password = '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';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;
        $mail->setFrom('smitzaveri123@gmail.com', 'BMU');
        $mail->addAddress($email, $fname);
        $mail->addReplyTo('smitzaveri123@gmail.com', 'Information');
        $mail->isHTML(true);
        $mail->Subject = 'Password';
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
                p {
                  margin-bottom: 20px;
                }
                .container {
                  max-width: 600px;
                  margin: 0 auto;
                  padding: 20px;
                  background-color: #fff;
                  border-radius: 4px;
                  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                }
                table {
                  border-collapse: collapse;
                  width: 100%;
                  margin-bottom: 20px;
                }
                th, td {
                  border: 1px solid #ddd;
                  padding: 10px;
                  text-align: left;
                }
                th {
                  background-color: #f5f5f5;
                }
                .message {
                  background-color: #f9f9f9;
                  padding: 15px;
                  border-radius: 4px;
                  border-left: 4px solid #3498db;
                  margin-bottom: 20px;
                }
              </style>
            </head>
            <body>
              <div class="container">
                <h1>Password Reset</h1>
                <div class="message">
                  <p>Dear ' . $fname . ',</p>
                  <p>We have received your request to reset your password. As per your request, we are sending you the old login credentials for your account with Bhagwan Mahavir University.</p>
                </div>

                <p>Please find below your updated enrollment details:</p>
                <table>
                  <tr>
                    <th>User ID</th>
                    <th>Password</th>
                  </tr>
                  <tr>
                    <td>' . $enroll . '</td><td>' . $password . '</td>
                    </tr>
                    </table>

                    <p>Note that this is your temporary password, and you will need to change it immediately after your first login for security reasons. Please keep these details safe and secure, as they will be needed throughout your academic journey with us. If you encounter any issues or have any questions, please do not hesitate to reach out to our support team, who are always happy to assist.</p>

                    <p>We hope you have a great experience studying at Bhagwan Mahavir University.</p>

                    <p>Best regards,<br>BMU</p>
                  </div>
                </body>
              </html>';
        $mail->send();
    }
}
$forget_password = new Forget_password;
if (isset($_POST['enrollment_forget_password'])) {
    $enroll = addslashes($_POST['enrollment_forget_password']);
    $forget_password->send_forget_password_mail($enroll);
}
