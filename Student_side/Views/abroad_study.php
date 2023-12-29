<?php
// error_reporting(0);
include('private/abroad_study_server.php');
$abroad_study = new abroad_study;

session_start();
$_SESSION['redirect_url'] = $_SERVER['REQUEST_URI'];
if (!$_SESSION['enrollment']) {
    header('location:signin');
}
if (isset($_SESSION['enrollment'])) {
    $enroll = $_SESSION['enrollment'];
    $studentInfo = $abroad_study->getStudentInfo($enroll);
    $crs = $studentInfo['crs'];
    $name = $studentInfo['name'];
    $fathername = $studentInfo['fathername'];
    $email = $studentInfo['email'];
    $mobile = $studentInfo['mobile'];

} else {
    echo "No enrollment number found in session.";
}
if (isset($_POST['insert'])) {
    $name = addslashes($_POST['fullname']);
    $fathername = addslashes($_POST['fathername']);
    $enroll = addslashes($_POST['enrollment']);
    $course = addslashes($_POST['course']);
    $sem = addslashes($_POST['semester']);
    $email = addslashes($_POST['email']);
    $mobile = addslashes($_POST['mobile']);
    $purpose = addslashes($_POST['reason']);
    if ($purpose == "Other") {
        $purpose = '';
        $purpose = addslashes($_POST['other_reason']);
    }
    $date = addslashes($_POST['date']);
    $document10th = '0';
    $document12th = '0';
    $leaving_certificate = '0';
    if (isset($_POST['10th'])) {
        $document10th = addslashes($_POST['10th']);
    }
    if (isset($_POST['12th'])) {
        $document12th = addslashes($_POST['12th']);
    }
    if (isset($_POST['leaving_certificate'])) {
        $leaving_certificate = addslashes($_POST['leaving_certificate']);
    }
    $feesrecipt = $_FILES['fees_recipt']['name'];
    $tempname = $_FILES['fees_recipt']['tmp_name'];
    $savefilename = $enroll . "_" . $sem . "_" . $feesrecipt;
    $folder = "../Admin_side/private/Fees_recipt/" . $savefilename;
    move_uploaded_file($tempname, $folder);
    // Insert Data
    $document->insert($enroll, $name, $fathername, $course, $sem, $mobile, $email, $purpose, $date, $document10th, $document12th, $leaving_certificate, $savefilename);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request For Abroad Study</title>
    <link rel="icon" href="private/images/BMCCA_logo.png">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Geologica:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
</head>

<body style="font-family: 'Geologica', sans-serif;">
    <div class="shadow-lg shadow-gray-100">
        <nav class="bg-white py-2 flex justify-center">
            <ul>
                <li>
                    <a href="home">
                        <img src="private/images/logo.png" alt="bmu" class="w-32">
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    <div class="flex items-center justify-center mt-3">
        <div class="bg-[#F3F7F6] w-[64rem] px-14 py-8 rounded-xl shadow-md flex flex-col justify-start"
            style="background: linear-gradient(90deg, #e3ffe7 0%, #d9e7ff 100%);">
            <h1 class="text-3xl font-medium">Request For Abroad Study Documents :</h1>
            <form action="" method="post" id="document_form" enctype="multipart/form-data">
                <div class="grid grid-cols-2 mt-6 gap-x-10">
                    <div class="row-span-1 flex flex-col gap-y-1">
                        <label for="Fullname" class="text-xl">Full Name</label>
                        <!-- pattern="^[A-Za-z]+\s[A-Za-z]+\s[A-Za-z]+$" -->
                        <input required readonly type="text" name="fullname" placeholder="Enter Your Fullname" value="<?php if (isset($name)) {
                            echo htmlspecialchars($name);
                        } ?>"
                            class="bg-white h-12 rounded-lg pl-3 text-lg outline-none focus:ring-2 focus:ring-indigo-800 cursor-not-allowed"
                            id="fullname">
                    </div>
                    <div class="row-span-2 flex flex-col gap-y-1 ">
                        <label for="Fathername" class="text-xl">Father Name</label>
                        <input required readonly type="text" name="fathername" placeholder="Enter Your Father Name"
                            value="<?php if (isset($fathername)) {
                                echo htmlspecialchars($fathername);
                            } ?>"
                            class="bg-white h-12 rounded-lg pl-3 text-lg outline-none focus:ring-2 focus:ring-indigo-800 cursor-not-allowed">
                    </div>
                </div>
                <div class="grid grid-cols-4 mt-5 gap-x-10">
                    <div class="col-span-2 flex flex-col gap-y-1 ">
                        <label for="Enrollment" class="text-xl">Enrollment Number</label>
                        <input required readonly type="text" name="enrollment" value="<?php if (isset($enroll)) {
                            echo htmlspecialchars($enroll);
                        } ?>" placeholder="Enter Your Enrollment Number"
                            class="bg-white h-12 rounded-lg pl-3 text-lg outline-none focus:ring-2 focus:ring-indigo-800 cursor-not-allowed">
                    </div>
                    <div class="row-span-2 flex flex-col gap-y-1 ">
                        <label for="Course" class="text-xl">Course</label>
                        <input readonly required
                            class="bg-white h-12 rounded-lg pl-2 text-lg outline-none focus:ring-2 focus:ring-indigo-800 cursor-not-allowed"
                            type="text" name="course" value="<?php if (isset($crs)) {
                                echo htmlspecialchars($crs);
                            } ?>" id="Course">
                    </div>
                    <div class="row-span-2 flex flex-col gap-y-1 ">
                        <label for="Semester" class="text-xl">Semester</label>
                        <select name="semester" id="Semester" class="bg-white h-12 rounded-lg pl-2 text-lg outline-none focus:ring-2 focus:ring-indigo-800" required>
                            <option value="" class="hidden">Choose Semester</option>
                        </select>
                    </div>
                </div>
                <div class="grid grid-cols-2 mt-5 gap-x-10">
                    <div class="row-span-1 flex flex-col gap-y-1 ">
                        <label for="Email" class="text-xl">Email</label>
                        <input required readonly type="email" name="email" placeholder="Enter Your Email"
                            class="bg-white h-12 rounded-lg pl-3 text-lg outline-none focus:ring-2 focus:ring-indigo-800 cursor-not-allowed"
                            value="<?php if (isset($email)) {
                                echo htmlspecialchars($email);
                            } ?>">
                    </div>
                    <div class="row-span-2 flex flex-col gap-y-1 ">
                        <label for="Mobile No" class="text-xl">Mobile No</label>
                        <input required readonly type="tel" name="mobile" pattern="[0-9]{10}"
                            placeholder="Enter Your Mobile No"
                            class="bg-white h-12 rounded-lg pl-3 text-lg outline-none focus:ring-2 focus:ring-indigo-800 cursor-not-allowed"
                            value="<?php if (isset($mobile)) {
                                echo htmlspecialchars($mobile);
                            } ?>">
                    </div>
                </div>
                <div class="grid grid-cols-4 mt-5 gap-x-10">
                    <div class="row-span-1 col-span-2 flex flex-col gap-y-1">
                        <label for="Reason For Bonafide Issue" class="text-xl">Select Require Document:</label>
                        <!-- Transcript -->
                        <div class="row-span-1 flex items-center mt-1 relative">
                            <input type="checkbox" id="transcript" name="transcript" value="0" class="h-4 w-4 cursor-pointer">
                            <label for="transcript" class="ml-2 text-lg cursor-pointer">Transcript Certificate</label>
                        </div>
                        <div class="row-span-1 ml-6 text-lg" style="display: none;" id="transcript_copies">
                            <label for="price">Per Copy 250₹ X</label>
                            <input type="text" name="no_of_copies" id="no_of_copies" value="" class="w-12 h-10 ml-2 bg-white rounded-lg shadow-md text-center">
                            <label for="no_of_copies" class="ml-1">No of Copy = <span id="total_of_transcript">0</span>₹</label>
                        </div>

                        <!-- MOI -->
                        <div class="row-span-1 flex items-center mt-1">
                            <input type="checkbox" id="MOI" name="MOI" value="0"
                                class="h-4 w-4 text-indigo-600 bg-indigo-600 cursor-pointer">
                            <label for="MOI" class="ml-2 text-lg cursor-pointer">MOI</label>
                        </div>
                        <div class="row-span-1 ml-6 text-lg" style="display: none;" id="MOI_copies">
                            <label for="price">Per Copy 150₹ X</label>
                            <input type="text" name="no_of_MOI_copies" id="no_of_MOI_copies" value="" class="w-12 h-10 ml-2 bg-white rounded-lg shadow-md text-center">
                            <label for="no_of_MOI_copies" class="ml-1">No of Copy = <span id="total_of_MOI">0</span>₹</label>
                        </div>

                        <!-- LOR -->
                        <div class="row-span-1 flex items-center mt-1">
                            <input type="checkbox" id="LOR" name="LOR" value="0"
                                class="h-4 w-4 text-indigo-600 bg-indigo-600 cursor-pointer">
                            <label for="LOR" class="ml-2 text-lg cursor-pointer">LOR</label>
                        </div>
                        <div class="row-span-1 ml-6 text-lg" style="display: none;" id="LOR_copies">
                            <label for="price">Per Copy 100₹ X</label>
                            <input type="text" name="no_of_LOR_copies" id="no_of_LOR_copies" value="" class="w-12 h-10 ml-2 bg-white rounded-lg shadow-md text-center">
                            <label for="no_of_LOR_copies" class="ml-1">No of Copy = <span id="total_of_LOR">0</span>₹</label>
                        </div>
                    </div>
                    <!-- <div class="col-span-2 flex flex-col gap-y-1">
                        <label for="Reason For Bonafide Issue" class="text-xl">Reason For Documents</label>
                        <div role="radiogroup" class="grid grid-cols-2">
                            <div class="flex items-center col-span-1 py-1">
                                <input required type="radio" name="reason" id="BRTS Pass" value="BRTS Pass"
                                    class="h-4 w-4 cursor-pointer border-indigo-800 text-indigo-800 focus:ring-2 focus:ring-offset-2 rounded-full focus:outline-none focus:ring-indigo-800">
                                <label for="BRTS Pass" class="text-lg cursor-pointer ml-2">BRTS Pass</label>
                            </div>
                            <div class="flex items-center col-span-1">
                                <input required type="radio" name="reason" id="Digital India" value="Digital India"
                                    class="h-4 w-4 cursor-pointer border-indigo-800 text-indigo-800 focus:ring-2 focus:ring-offset-2 rounded-full focus:outline-none focus:ring-indigo-800">
                                <label for="Digital India" class="text-lg cursor-pointer ml-2">Digital India</label>
                            </div>
                            <div class="flex items-center col-span-1 py-1">
                                <input required type="radio" name="reason" id="Education Loan" value="Education Loan"
                                    class="h-4 w-4 cursor-pointer border-indigo-800 text-indigo-800 focus:ring-2 focus:ring-offset-2 rounded-full focus:outline-none focus:ring-indigo-800">
                                <label for="Education Loan" class="text-lg cursor-pointer ml-2">Education Loan</label>
                            </div>
                            <div class="flex items-center">
                                <input required type="radio" name="reason" id="Driving License" value="Driving License"
                                    class="h-4 w-4 cursor-pointer border-indigo-800 text-indigo-800 focus:ring-2 focus:ring-offset-2 rounded-full focus:outline-none focus:ring-indigo-800">
                                <label for="Driving License" class="text-lg cursor-pointer ml-2">Driving License</label>
                            </div>
                            <div class="flex items-center col-span-1 py-1">
                                <input required type="radio" name="reason" id="Others" value="Other"
                                    class="h-4 w-4 cursor-pointer border-indigo-800 text-indigo-800 focus:ring-2 focus:ring-offset-2 rounded-full focus:outline-none focus:ring-indigo-800 peer">
                                <label for="Others" class="text-lg cursor-pointer ml-2">Others</label>
                            </div>
                        </div>
                        <div>
                            <input type="text" name="other_reason" id="other_reason"
                                placeholder="Enter Your Other Reason"
                                class="bg-white w-96 ml-5 mt-1 h-10 rounded-lg pl-3 text-lg outline-none focus:ring-2 focus:ring-indigo-800 hidden">
                        </div>
                    </div> -->
                    <div class="flex flex-col row-span-1 col-span-2">
                        <label for="Fees" class="text-xl">Upload Final Semester Marksheet</label>
                        <input required type="file" name="fees_recipt" id="Fees"
                            class="mt-3 file:outline-none file:h-12 file:w-36 file:rounded-lg cursor-pointer file:cursor-pointer file:border-0 file:bg-white focus:ring-2 focus:ring-indigo-800 focus:rounded-lg text-lg file: file:text-gray-400" accept="application/pdf">
                            <span class="text-red-600">*Note: Only PDF file accepted</span>
                    </div>
                </div>
                <div class="grid grid-cols-2 mt-3">
                </div>
                <div class="w-full mt-3 flex justify-end">
                    <input
                        class="bg-red-700 text-white h-12 px-7 text-lg rounded-lg focus:ring-2 focus:ring-offset-2 focus:ring-offset-red-700 mr-8"
                        type="reset" value="Reset">
                    <button
                        class="bg-indigo-800 text-white h-12 px-5 text-lg rounded-lg focus:ring-2 focus:ring-offset-2 focus:ring-offset-indigo-800"
                        name="insert">Submit</button>
                </div>
            </form>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script>
        document.getElementById("document_form").addEventListener("submit", function (event) {
            var checkboxes = document.querySelectorAll('input[type="checkbox"]:checked');
            if (checkboxes.length === 0) {
                event.preventDefault(); // Prevent form submission
                alert("Please select at least one document."); // Display an alert to the user
            }
        });

        // // Radio Button onclick TextBox Show and Hide
        // const other_radio = document.querySelector('input[value=Other]');
        // const other_reason = document.getElementById('other_reason');
        // other_radio.addEventListener('change', function () {
        //     if (other_radio.checked) {
        //         other_reason.classList.remove('hidden');
        //         other_reason.required = true;
        //         other_reason.focus();
        //     } else {
        //         other_reason.classList.add('hidden');
        //     }
        // });
        // const brts_radio = document.getElementById('BRTS Pass');
        // brts_radio.addEventListener('change', function () {
        //     if (brts_radio.checked) {
        //         other_reason.classList.add('hidden');
        //         other_reason.required = false;

        //     }
        // });
        // const mysy_radio = document.getElementById('Digital India');
        // mysy_radio.addEventListener('change', function () {
        //     if (mysy_radio.checked) {
        //         other_reason.classList.add('hidden');
        //         other_reason.required = false;
        //     }
        // });
        // const education_radio = document.getElementById('Education Loan');
        // education_radio.addEventListener('change', function () {
        //     if (education_radio.checked) {
        //         other_reason.classList.add('hidden');
        //         other_reason.required = false;

        //     }
        // });
        // const driving_radio = document.getElementById('Driving License');
        // driving_radio.addEventListener('change', function () {
        //     if (driving_radio.checked) {
        //         other_reason.classList.add('hidden');
        //         other_reason.required = false;
        //     }
        // });

        // semester change
        const Semester = document.getElementById('Semester');
        Semester.addEventListener('focus', () => {
            const Course = document.getElementById('Course').value;
            jQuery.ajax({
                url: 'private/abroad_study_server.php',
                type: 'POST',
                data: "&course_code=" + Course,
                success: function(response) {
                    const code = response;
                    $('#Semester').html(code);
                }
            })
        });

        // checkbox change
        const transcript = document.getElementById('transcript');
        transcript.addEventListener('change',()=>{
            const transcript_value = document.getElementById('transcript').value;
            if(transcript_value == 0){
                const transcript_copies = document.getElementById('transcript_copies');
                $('#transcript_copies').show();
                $('#transcript').val('1');
                $('#no_of_copies').focus();
            }else{
                const transcript_copies = document.getElementById('transcript_copies');
                $('#transcript_copies').hide();
                $('#transcript').val('0');
            }
        });        

        const MOI = document.getElementById('MOI');
        MOI.addEventListener('change',()=>{
            const MOI_value = document.getElementById('MOI').value;
            if(MOI_value == 0){
                const MOI_copies = document.getElementById('MOI_copies');
                $('#MOI_copies').show();
                $('#MOI').val('1');
                $('#no_of_MOI_copies').focus();
            }else{
                const MOI_copies = document.getElementById('MOI_copies');
                $('#MOI_copies').hide();
                $('#MOI').val('0');
            }
        });

        const LOR = document.getElementById('LOR');
        LOR.addEventListener('change',()=>{
            const LOR_value = document.getElementById('LOR').value;
            if(LOR_value == 0){
                const LOR_copies = document.getElementById('LOR_copies');
                $('#LOR_copies').show();
                $('#LOR').val('1');
                $('#no_of_LOR_copies').focus();
            }else{
                const LOR_copies = document.getElementById('LOR_copies');
                $('#LOR_copies').hide();
                $('#LOR').val('0');
            }
        });

        // transcript total 
        const no_of_copies = document.getElementById('no_of_copies');
        no_of_copies.addEventListener('focusout',()=>{
            const no_of_copies_transcript = document.getElementById('no_of_copies').value;
            const total_of_transcript = document.getElementById('total_of_transcript');
            const total = 250 * Number(no_of_copies_transcript);
            total_of_transcript.innerText = total;
        });

        // MOI total 
        const no_of_MOI_copies = document.getElementById('no_of_MOI_copies');
        no_of_MOI_copies.addEventListener('focusout',()=>{
            const no_of_MOI_copies = document.getElementById('no_of_MOI_copies').value;
            const total_of_MOI = document.getElementById('total_of_MOI');
            const total = 150 * Number(no_of_MOI_copies);
            total_of_MOI.innerText = total;
        });

        // LOR total 
        const no_of_LOR_copies = document.getElementById('no_of_LOR_copies');
        no_of_LOR_copies.addEventListener('focusout',()=>{
            const no_of_LOR_copies = document.getElementById('no_of_LOR_copies').value;
            const total_of_LOR = document.getElementById('total_of_LOR');
            const total = 100 * Number(no_of_LOR_copies);
            total_of_LOR.innerText = total;
        });
    </script>
</body>

</html>