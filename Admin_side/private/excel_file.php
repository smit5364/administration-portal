<?php
// error_reporting(0);
try {
    $con = new mysqli("localhost", "root", "", "admin_portal");
} catch (Exception $e) {
    echo $e->getMessage();
}
class excel
{
    function pending_bonafide_verification()
    {
        global $con;
        $query = "SELECT * FROM `bonafide` WHERE `verify_flag` = '0' AND `remark` = ''";
        $result = mysqli_query($con, $query);
        $html = "<table>
        <tr>
            <th>Enrollment No</th>
            <th>Name</th>
            <th>Father Name</th>
            <th>Course</th>
            <th>Semester</th>
            <th>Mobile No</th>
            <th>Email</th>
            <th>Reason of Issue</th>
            <th>Apply Date</th>
        </tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            $html .= "<tr>
        <td>" . $row['enrollment_no'] . "</td>
        <td>" . $row['name'] . "</td>
        <td>" . $row['father_name'] . "</td>
        <td>" . $row['course'] . "</td>
        <td>" . $row['semester'] . "</td>
        <td>" . $row['mobile_no'] . "</td>
        <td>" . $row['email'] . "</td>
        <td>" . $row['purpose'] . "</td>
        <td>" . $row['apply_date'] . "</td>
        </tr>";
        }
        $html .= "</table>";
        header('Content-Type: application/xls');
        header('Content-Disposition: attachment; filename=Bonafide_Verification_pending.xls');
        echo $html;
    }

    function pending_bonafide_approval()
    {
        global $con;
        $query = "SELECT * FROM `bonafide` WHERE `approve_flag` = '0' AND `verify_flag` = '1' AND `remark` = ''";
        $result = mysqli_query($con, $query);
        $html = "<table>
        <tr>
            <th>Enrollment No</th>
            <th>Name</th>
            <th>Father Name</th>
            <th>Course</th>
            <th>Semester</th>
            <th>Mobile No</th>
            <th>Email</th>
            <th>Reason of Issue</th>
            <th>Apply Date</th>
        </tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            $html .= "<tr>
        <td>" . $row['enrollment_no'] . "</td>
        <td>" . $row['name'] . "</td>
        <td>" . $row['father_name'] . "</td>
        <td>" . $row['course'] . "</td>
        <td>" . $row['semester'] . "</td>
        <td>" . $row['mobile_no'] . "</td>
        <td>" . $row['email'] . "</td>
        <td>" . $row['purpose'] . "</td>
        <td>" . $row['apply_date'] . "</td>
        </tr>";
        }
        $html .= "</table>";
        header('Content-Type: application/xls');
        header('Content-Disposition: attachment; filename=Bonafide_approval_pending.xls');
        echo $html;
    }

    function bonafide_rejection()
    {
        global $con;
        $query = "SELECT * FROM `bonafide` WHERE `remark` != ''";
        $result = mysqli_query($con, $query);
        $html = "<table>
        <tr>
            <th>Enrollment No</th>
            <th>Name</th>
            <th>Father Name</th>
            <th>Course</th>
            <th>Semester</th>
            <th>Mobile No</th>
            <th>Email</th>
            <th>Reason of Issue</th>
            <th>Apply Date</th>
            <th>Reason For Cancel</th>
        </tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            $html .= "<tr>
        <td>" . $row['enrollment_no'] . "</td>
        <td>" . $row['name'] . "</td>
        <td>" . $row['father_name'] . "</td>
        <td>" . $row['course'] . "</td>
        <td>" . $row['semester'] . "</td>
        <td>" . $row['mobile_no'] . "</td>
        <td>" . $row['email'] . "</td>
        <td>" . $row['purpose'] . "</td>
        <td>" . $row['apply_date'] . "</td>
        <td>" . $row['remark'] . "</td>
        </tr>";
        }
        $html .= "</table>";
        header('Content-Type: application/xls');
        header('Content-Disposition: attachment; filename=bonafide_rejection.xls');
        echo $html;
    }

    function bonafide_Delivery_complete()
    {
        global $con;
        $query = "SELECT * FROM `bonafide` WHERE `delever_flag` = '1' AND `remark` = ''";
        $result = mysqli_query($con, $query);
        $html = "<table>
        <tr>
            <th>Enrollment No</th>
            <th>Name</th>
            <th>Father Name</th>
            <th>Course</th>
            <th>Semester</th>
            <th>Mobile No</th>
            <th>Email</th>
            <th>Reason of Issue</th>
            <th>Apply Date</th>
        </tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            $html .= "<tr>
        <td>" . $row['enrollment_no'] . "</td>
        <td>" . $row['name'] . "</td>
        <td>" . $row['father_name'] . "</td>
        <td>" . $row['course'] . "</td>
        <td>" . $row['semester'] . "</td>
        <td>" . $row['mobile_no'] . "</td>
        <td>" . $row['email'] . "</td>
        <td>" . $row['purpose'] . "</td>
        <td>" . $row['apply_date'] . "</td>
        </tr>";
        }
        $html .= "</table>";
        header('Content-Type: application/xls');
        header('Content-Disposition: attachment; filename=Bonafide_Delivery_complete.xls');
        echo $html;
    }

    function pending_document_verification()
    {
        global $con;
        $query = "SELECT * FROM `document` WHERE `verify_flag` = '0' AND `remark` = ''";
        $result = mysqli_query($con, $query);
        $html = "<table>
        <tr>
            <th>Enrollment No</th>
            <th>Name</th>
            <th>Father Name</th>
            <th>Course</th>
            <th>Semester</th>
            <th>Mobile No</th>
            <th>Email</th>
            <th>Reason of Issue</th>
            <th>Documents</th>
            <th>Apply Date</th>
        </tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            $documents = array();
                if ($row['document10th'] === 1) {
                    $documents[] = "10th Marksheet";
                }
                if ($row['document12th'] === 1) {
                    $documents[] = "12th Marksheet";
                }
                if ($row['leaving_certificate'] === 1) {
                    $documents[] = "Leaving Certificate";
                }
                $doc = implode(', ', $documents);
            $html .= "<tr>
        <td>" . $row['enrollment_no'] . "</td>
        <td>" . $row['name'] . "</td>
        <td>" . $row['father_name'] . "</td>
        <td>" . $row['course'] . "</td>
        <td>" . $row['semester'] . "</td>
        <td>" . $row['mobile_no'] . "</td>
        <td>" . $row['email'] . "</td>
        <td>" . $row['purpose'] . "</td>
        <td>" . $doc . "</td>
        <td>" . $row['apply_date'] . "</td>
        </tr>";
        }
        $html .= "</table>";
        header('Content-Type: application/xls');
        header('Content-Disposition: attachment; filename=Documents_Verification_pending.xls');
        echo $html;
    }

    function pending_return_document()
    {
        global $con;
        $query = "SELECT * FROM `document` WHERE `delever_flag` = '1' AND `return_flag` = '0' AND `remark` = ''";
        $result = mysqli_query($con, $query);
        $html = "<table>
        <tr>
            <th>Enrollment No</th>
            <th>Name</th>
            <th>Father Name</th>
            <th>Course</th>
            <th>Semester</th>
            <th>Mobile No</th>
            <th>Email</th>
            <th>Reason of Issue</th>
            <th>Documents</th>
            <th>Apply Date</th>
            <th>Pickup Date</th>
        </tr>";
        while ($row = mysqli_fetch_assoc($result)) {
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
            $html .= "<tr>
        <td>" . $row['enrollment_no'] . "</td>
        <td>" . $row['name'] . "</td>
        <td>" . $row['father_name'] . "</td>
        <td>" . $row['course'] . "</td>
        <td>" . $row['semester'] . "</td>
        <td>" . $row['mobile_no'] . "</td>
        <td>" . $row['email'] . "</td>
        <td>" . $row['purpose'] . "</td>
        <td>" . $doc . "</td>
        <td>" . $row['apply_date'] . "</td>
        <td>" . $row['pickup_date'] . "</td>
        </tr>";
        }
        $html .= "</table>";
        header('Content-Type: application/xls');
        header('Content-Disposition: attachment; filename=Documents_return_pending.xls');
        echo $html;
    }

    function document_rejection()
    {
        global $con;
        $query = "SELECT * FROM `document` WHERE `remark` != ''";
        $result = mysqli_query($con, $query);
        $html = "<table>
        <tr>
            <th>Enrollment No</th>
            <th>Name</th>
            <th>Father Name</th>
            <th>Course</th>
            <th>Semester</th>
            <th>Mobile No</th>
            <th>Email</th>
            <th>Reason of Issue</th>
            <th>Documents</th>
            <th>Apply Date</th>
            <th>Pickup Date</th>
            <th>Reason For Cancel</th>
        </tr>";
        while ($row = mysqli_fetch_assoc($result)) {
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
            $html .= "<tr>
        <td>" . $row['enrollment_no'] . "</td>
        <td>" . $row['name'] . "</td>
        <td>" . $row['father_name'] . "</td>
        <td>" . $row['course'] . "</td>
        <td>" . $row['semester'] . "</td>
        <td>" . $row['mobile_no'] . "</td>
        <td>" . $row['email'] . "</td>
        <td>" . $row['purpose'] . "</td>
        <td>" . $doc . "</td>
        <td>" . $row['apply_date'] . "</td>
        <td>" . $row['pickup_date'] . "</td>
        <td>" . $row['remark'] . "</td>
        </tr>";
        }
        $html .= "</table>";
        header('Content-Type: application/xls');
        header('Content-Disposition: attachment; filename=Reject_request_of_documents.xls');
        echo $html;
    }
    
    function document_Delivery_complete()
    {
        global $con;
        $query = "SELECT * FROM `document` WHERE `delever_flag` = '1'";
        $result = mysqli_query($con, $query);
        $html = "<table>
        <tr>
            <th>Enrollment No</th>
            <th>Name</th>
            <th>Father Name</th>
            <th>Course</th>
            <th>Semester</th>
            <th>Mobile No</th>
            <th>Email</th>
            <th>Reason of Issue</th>
            <th>Documents</th>
            <th>Apply Date</th>
            <th>Pickup Date</th>
        </tr>";
        while ($row = mysqli_fetch_assoc($result)) {
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
            $html .= "<tr>
        <td>" . $row['enrollment_no'] . "</td>
        <td>" . $row['name'] . "</td>
        <td>" . $row['father_name'] . "</td>
        <td>" . $row['course'] . "</td>
        <td>" . $row['semester'] . "</td>
        <td>" . $row['mobile_no'] . "</td>
        <td>" . $row['email'] . "</td>
        <td>" . $row['purpose'] . "</td>
        <td>" . $doc . "</td>
        <td>" . $row['apply_date'] . "</td>
        <td>" . $row['pickup_date'] . "</td>
        </tr>";
        }
        $html .= "</table>";
        header('Content-Type: application/xls');
        header('Content-Disposition: attachment; filename=Delivery_complete_documents.xls');
        echo $html;
    }

    
}
function download_report($action)
{
    $exe = new excel;
    switch ($action) {
        case 'pending_bonafide_verification':
            $exe->pending_bonafide_verification();
            break;

        case 'pending_bonafide_approval':
            $exe->pending_bonafide_approval();
            break;

        case 'bonafide_rejection':
            $exe->bonafide_rejection();
            break;

        case 'bonafide_Delivery_complete':
            $exe->bonafide_Delivery_complete();
            break;

        case 'pending_document_verification':
            $exe->pending_document_verification();
            break;
        
        case 'pending_return_document':
            $exe->pending_return_document();
            break;
        
        case 'document_rejection':
            $exe->document_rejection();
            break;

        case 'document_Delivery_complete':
            $exe->document_Delivery_complete();
            break;
    }
}
$action = addslashes($_GET['action']);
download_report($action);
?>