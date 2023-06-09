<?php
require_once "connection/connection.php";
$id = $_GET["id"];

require('fpdf/fpdf.php');
class Invoice extends FPDF
{

    private $dept_name;

    function __construct($dept_name)
    {
        parent::__construct();
        $this->dept_name = $dept_name;
    }

    function Header()
    {
        $this->AddFont('Times New Roman', '', 'times.php');
        $this->AddFont('Times New Roman Bold', '', 'times-bold.php');
        $this->Ln(8);
        $this->SetFont('Times New Roman Bold', 'U', 15);
        $this->Image('Images/BMCCA_logo.png', 12, 16, 26, 26);
        $this->SetLeftMargin(40);
        $this->SetTextColor(34, 42, 53);
        $this->Cell(0, 1, strtoupper($this->dept_name), 0, 1, 'C');
        $this->Ln(5);
        $this->SetFont('Times New Roman', '', 14);
        $this->SetTextColor(7, 42, 88);
        $this->Cell(0, 1, "Constituent College of Bhagwan Mahavir University", 0, 1, 'C');
        $this->Ln(8);
        $this->SetFont('Times New Roman Bold', '', 9);
        $this->SetTextColor(0, 0, 0);
        $this->Image('Images/email.png', 40, 32, 4, 4);
        $this->Cell(7, 10, "", 0, 0, 'L');
        $this->Cell(75, 1, "dean.bmcca@bmusurat.ac.in", 0, 0, 'L');
        $this->Image('Images/phone.png', 120, 32, 4, 4);
        $this->Cell(5, 10, "", 0, 0, 'R');
        $this->Cell(95, 1, "0261-6770125/23, +91-7575803091", 0, 1, 'L');
        $this->Ln(6);
        $this->Image('Images/website.png', 40, 38, 4, 4);
        $this->Cell(7, 10, "", 0, 0, 'L');
        $this->Cell(75, 1, "www.bmusurat.ac.in", 0, 0, 'L');
        $this->Image('Images/location.png', 120, 38, 4, 4);
        $this->Cell(5, 10, "", 0, 0, 'R');
        $this->Cell(95, 1, "VIP Road, Surat, Gujarat-395007", 0, 1, 'L');
        $this->SetLeftMargin(10);
        $this->Ln(1);
        $this->SetFont('Arial', '', 10);
        $this->Cell(0, 1, "_____________________________________________________________________________________________________", 0, 1, 'C');
        $this->Ln(2);


    }

    function LineItems($id, $date, $name, $father_name, $enrollment_no, $semester, $course, $start_date, $end_date, $purpose)
    {
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

        $this->AddFont('CALIBRIB', '', 'CALIBRIB.php');
        $this->AddFont('Calibri', '', 'Calibri.php');
        $this->AddFont('Algerian_Regular', '', 'Algerian_Regular.php');
        $this->SetLeftMargin(25);
        $this->SetRightMargin(25);
        $this->Ln(2);
        $this->SetFont('CALIBRIB', '', 12);
        $this->Cell(130, 5, "OUTWARD NO: " . $id . "/GEN-BMCCA/" . $start_date . "-" . $end_date, 0, 0, 'L');
        $this->Cell(40, 5, "DATE: " . $date, 0, 1, 'L');
        $this->Ln(9);
        $this->SetFont('Algerian_Regular', 'U', 14.5);
        $this->Cell(0, 10, "BONAFIDE CERTIFICATE", 0, 1, 'C');
        $this->Ln(9);
        $this->SetFont('Calibri', '', 14.5); // Set font to normal
        $this->Write(12, 'This is to certify that Mr./Ms. ');
        $this->SetFont('CALIBRIB', 'U', 14.5); // Set font to bold
        $this->Write(12, $name, '');
        $this->SetFont('Calibri', '', 14.5); // Set font to normal
        $this->Write(12, ', Son/Daughter of Mr./Ms. ');
        $this->SetFont('CALIBRIB', 'U', 14.5);
        $this->Write(12, $father_name);
        $this->SetFont('Calibri', '', 14.5);
        $this->Write(12, ', bearing ');
        $this->SetFont('CALIBRIB', 'U', 14.5);
        $this->Write(12, 'Enrollment No. - ' . $enrollment_no);
        $this->SetFont('Calibri', '', 14.5);
        $this->Write(12, ', is a student of the ');
        $this->SetFont('CALIBRIB', 'U', 14.5);
        $this->Write(12, $sem . " " . $course . ' Course ');
        $this->SetFont('Calibri', '', 14.5);
        $this->Write(12, 'for the Academic Year ');
        $this->SetFont('CALIBRIB', 'U', 14.5);
        $this->Write(12, $start_date . "-" . $end_date . ".");
        $this->SetFont('Calibri', '', 14.5);
        $this->Write(12, ' He/She is a bonafide student of ');
        $this->SetFont('CALIBRIB', 'U', 14.5);
        $this->Write(12, 'Bhagwan Mahavir College of Computer Application, Bhagwan Mahavir University, Surat.');
        $this->SetFont('Calibri', '', 14.5);
        $this->Cell(5, 5, "", 0, 1, 'R');
        $this->Cell(5, 10, "", 0, 1, 'R');
        $this->Write(15, 'He/She is reliable, sincere, hardworking, and bears a good moral character.');
        $this->Cell(5, 5, "", 0, 1, 'R');
        $this->Cell(5, 10, "", 0, 1, 'R');
        $this->SetFont('CALIBRIB', 'U', 14.5);
        $this->Write(15, 'Bonafide Certificate issued for ' . $purpose);
        $this->Ln(28);
        $this->SetFont('CALIBRIB', '', 14.5);
        $this->Cell(112, 5, "", 0, 0, 'L');
        $this->Cell(40, 5, "Dr. Sanjay H. Buch", 0, 1, 'L');
        $this->Cell(112, 5, "", 0, 0, 'L');
        $this->Cell(40, 5, "Dean", 0, 1, 'L');
        $this->Cell(112, 5, "", 0, 0, 'L');
        $this->Cell(40, 5, "BMCCA, BMU.", 0, 1, 'L');
    }

}

// Prepare the SQL statement with a parameter placeholder
$sql = "SELECT * FROM `bonafide` WHERE id = ? LIMIT 1";
$stmt = mysqli_prepare($con, $sql);

if ($stmt) {
    // Bind the transaction_id parameter to the statement
    mysqli_stmt_bind_param($stmt, "i", $id);

    // Execute the statement
    mysqli_stmt_execute($stmt);

    // Get the result set
    $result = mysqli_stmt_get_result($stmt);

    // Fetch the first row from the result set as an associative array
    $row = mysqli_fetch_assoc($result);

    if ($row) {
        // Get the enrollment_no value from the row
        $date = $row['apply_date']; // assuming $row['posting_date'] contains '2023-04-27 17:47:17'
        $date = date('d-m-Y', strtotime($date));
        $name = $row['name'];
        $father_name = $row['father_name'];
        $enrollment_no = $row['enrollment_no'];
        $semester = $row['semester'];
        $course = $row['course'];
        $purpose = $row['purpose'];

        // Determine the starting and ending dates of the financial year (April 1 - March 31)
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

$dept_name = "Bhagwan Mahavir College of Computer Application";

// Step 3: Instantiate the new class
$invoice = new Invoice($dept_name);
$invoice->SetTitle("Bonafida Certificate");
$invoice->SetAuthor("Bhagwan Mahavir College of Computer Application");

// Step 4: Add new pages as needed (optional)
$invoice->AddPage('P', array(216, 279), 0);
// Retrieve the transaction details from the database
// Add line item content, like product details and prices.



// Step 5: Call functions to format each section of the invoice

$invoice->LineItems($id, $date, $name, $father_name, $enrollment_no, $semester, $course, $start_date, $end_date, $purpose);

// Step 6: Output the finished PDF invoice for download(D) or display(I) (optional)
$invoice->Output("I", "bonafide.pdf");
?>