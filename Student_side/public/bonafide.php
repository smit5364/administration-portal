<?php
// error_reporting(0);
include('./private/bonafide_server.php');


session_start();
if (isset($_POST["enroll_text"])) {
    $_SESSION['enroll'] = $_POST["enroll_text"];
}
if (isset($_SESSION['enroll'])) {
    $enroll = $_SESSION['enroll'];
    $conn = connect();
    $student = "SELECT * FROM `student_info` WHERE `enrollment_no`='$enroll'";
    $student_run = mysqli_query($conn, $student);

    if ($student_run && mysqli_num_rows($student_run) > 0) {
        $student_row = mysqli_fetch_assoc($student_run);
        $sem = $student_row['current_semester'];
        $crs = $student_row['course_code'];
        $name = $student_row['last_name'] . " " . $student_row['first_name'] . " " . $student_row['middle_name'];
        $fathername = $student_row['middle_name'] . " " . $student_row['last_name'];
        $course = $student_row['course_code'];
        $sem = $student_row['current_semester'];
        $email = $student_row['email'];
        $mobile = $student_row['mobile_no'];
        // echo "<h1>" . $name . "-" . $sem . " - " . $course . "</h1>";
    } else {
        header("Location: home"); // Redirect to the home page if enrollment number doesn't exist
        exit();
    }
} else {
    echo "No enrollment number found in session.";
}
$insert = new bonafide;
if (isset($_POST['insert'])) {
    $name = $_POST['fullname'];
    $fathername = $_POST['fathername'];
    $enroll = $_POST['enrollment'];
    $course = $_POST['course'];
    $sem = $_POST['semester'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $purpose = $_POST['reason'];
    if ($purpose == "Other") {
        $purpose = '';
        $purpose = $_POST['other_reason'];
    }
    $feesrecipt = $_FILES['fees_recipt']['name'];
    $tempname = $_FILES['fees_recipt']['tmp_name'];
    $folder = "Fees_recipt/" . $feesrecipt;
    move_uploaded_file($tempname, $folder);

    // Insert Data
    $insert->insert($enroll, $name, $fathername, $course, $sem, $mobile, $email, $purpose, $feesrecipt);
}
function fetch_courses_from_table()
{
    $conn = connect();
    $query = "SELECT * FROM courses";
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
    $query = "SELECT no_of_semester FROM courses WHERE course_code = '$course'";
    $result = mysqli_query($conn, $query);
    $semesters = 0;
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $semesters = $row['no_of_semester'];
    }
    return $semesters;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bonafide Certificate</title>
    <link rel="icon" href="public/images/fav.png">
    <link rel="stylesheet" href="../style.css">
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
                <li><img src="public/images/logo.png" alt="bmu" class="w-32"></li>
            </ul>
        </nav>
    </div>
    <div class="flex items-center justify-center mt-3">
        <div class="bg-[#F3F7F6] w-[64rem] px-14 py-8 rounded-xl shadow-md flex flex-col justify-start"
            style="background: linear-gradient(90deg, #e3ffe7 0%, #d9e7ff 100%);">
            <h1 class="text-3xl font-medium">Details of Bonafide Certificate</h1>
            <form action="" method="post" id="bonafide_form" enctype="multipart/form-data">
                <div class="grid grid-cols-2 mt-6 gap-x-10">
                    <div class="row-span-1 flex flex-col gap-y-1 ">
                        <label for="Fullname" class="text-xl">Full Name</label>
                        <input type="text" name="fullname" placeholder="Enter Your Fullname" value="<?php if (isset($name)) {
                            echo $name;
                        } ?>"
                            class="bg-white h-12 rounded-lg pl-3 text-lg outline-none focus:ring-2 focus:ring-indigo-800">
                    </div>
                    <div class="row-span-2 flex flex-col gap-y-1 ">
                        <label for="Fathername" class="text-xl">Father Name</label>
                        <input type="text" name="fathername" placeholder="Enter Your Father Name" value="<?php if (isset($fathername)) {
                            echo $fathername;
                        } ?>"
                            class="bg-white h-12 rounded-lg pl-3 text-lg outline-none focus:ring-2 focus:ring-indigo-800">
                    </div>
                </div>
                <div class="grid grid-cols-4 mt-8 gap-x-10">
                    <div class="col-span-2 flex flex-col gap-y-1 ">
                        <label for="Enrollment" class="text-xl">Enrollment Number</label>
                        <input type="text" name="enrollment" value="<?php if (isset($enroll)) {
                            echo $enroll;
                        } ?>" placeholder="Enter Your Enrollment Number"
                            class="bg-white h-12 rounded-lg pl-3 text-lg outline-none focus:ring-2 focus:ring-indigo-800">
                    </div>
                    <div class="row-span-2 flex flex-col gap-y-1 ">
                        <label for="Course" class="text-xl">Course</label>
                        <select name="course" id=""
                            class="bg-white h-12 rounded-lg pl-2 text-lg outline-none focus:ring-2 focus:ring-indigo-800">
                            <option value="Choose Course" class="hidden">Choose Course</option>
                            <?php

                            // Fetch courses from the course table
                            $courses = fetch_courses_from_table();

                            // Loop through the courses
                            foreach ($courses as $course) {
                                $selected = ($course['course_code'] == $crs) ? 'selected' : ''; // Check if the course matches the selectedCourse variable
                                echo '<option value="' . $course['course_code'] . '" ' . $selected . '>' . $course['course_code'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="row-span-2 flex flex-col gap-y-1 ">
                        <label for="Semester" class="text-xl">Semester</label>
                        <select name="semester" id=""
                            class="bg-white h-12 rounded-lg pl-2 text-lg outline-none focus:ring-2 focus:ring-indigo-800">
                            <option value="Choose semester" class="hidden">Choose Semester</option>
                            <?php
                            if (!empty($crs)) {
                                $semesters = fetch_semesters_from_table($crs);

                                // Loop through the semesters
                                for ($i = 1; $i <= $semesters; $i++) {
                                    $selected = ($i == $sem) ? 'selected' : '';
                                    $sem = "";

                                    if ($i >= 1 && $i <= 2) {
                                        $year = 1;
                                        $sem = $i;
                                        if ($i == 1) {
                                            $sem .= "st";
                                        } else {
                                            $sem .= "nd";
                                        }
                                        $sem .= " Semester";
                                    } elseif ($i >= 3 && $i <= 4) {
                                        $year = 2;
                                        $sem = $i;
                                        if ($i == 3) {
                                            $sem .= "rd";
                                        } else {
                                            $sem .= "th";
                                        }
                                        $sem .= " Semester";
                                    } elseif ($i >= 5 && $i <= 6) {
                                        $year = 3;
                                        $sem = $i;
                                        if ($i == 5) {
                                            $sem .= "th";
                                        } else {
                                            $sem .= "th";
                                        }
                                        $sem .= " Semester";
                                    } elseif ($i >= 7 && $i <= 8) {
                                        $year = 4;
                                        $sem = $i;
                                        if ($i == 7) {
                                            $sem .= "th";
                                        } else {
                                            $sem .= "th";
                                        }
                                        $sem .= " Semester";
                                    } else {
                                        $sem = "Invalid Semester";
                                    }
                                    echo '<option value="' . $i . '"' . $selected . '>' . $sem . '</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>


                </div>
                <div class="grid grid-cols-2 mt-6 gap-x-10">
                    <div class="row-span-1 flex flex-col gap-y-1 ">
                        <label for="Email" class="text-xl">Email</label>
                        <input type="email" name="email" placeholder="Enter Your Email" value="<?php if (isset($email)) {
                            echo $email;
                        } ?>"
                            class="bg-white h-12 rounded-lg pl-3 text-lg outline-none focus:ring-2 focus:ring-indigo-800">
                    </div>
                    <div class="row-span-2 flex flex-col gap-y-1 ">
                        <label for="Mobile No" class="text-xl">Mobile No</label>
                        <input type="text" name="mobile" placeholder="Enter Your Mobile No" value="<?php if (isset($mobile)) {
                            echo $mobile;
                        } ?>"
                            class="bg-white h-12 rounded-lg pl-3 text-lg outline-none focus:ring-2 focus:ring-indigo-800">
                    </div>
                </div>
                <div class="grid grid-cols-2 mt-6 gap-x-10">
                    <div class="row-span-1 flex flex-col gap-y-1">
                        <label for="Reason For Bonafide Issue" class="text-xl">Reason For Bonafide Issue</label>
                        <div role="radiogroup" class="mt-2 grid grid-cols-2">
                            <div class="flex items-center col-span-1 py-2">
                                <input type="radio" name="reason" id="BRTS Pass" value="BRTS Pass"
                                    class="h-4 w-4 cursor-pointer border-indigo-800 text-indigo-800 focus:ring-2 focus:ring-offset-2 rounded-full focus:outline-none focus:ring-indigo-800">
                                <label for="BRTS Pass" class="text-lg cursor-pointer ml-2">BRTS Pass</label>
                            </div>
                            <div class="flex items-center col-span-1">
                                <input type="radio" name="reason" id="MYSY Scholarship" value="MYSY Scholarship"
                                    class="h-4 w-4 cursor-pointer border-indigo-800 text-indigo-800 focus:ring-2 focus:ring-offset-2 rounded-full focus:outline-none focus:ring-indigo-800">
                                <label for="MYSY Scholarship" class="text-lg cursor-pointer ml-2">MYSY
                                    Scholarship</label>
                            </div>
                            <div class="flex items-center col-span-1 py-2">
                                <input type="radio" name="reason" id="Education Loan" value="Education Loan"
                                    class="h-4 w-4 cursor-pointer border-indigo-800 text-indigo-800 focus:ring-2 focus:ring-offset-2 rounded-full focus:outline-none focus:ring-indigo-800">
                                <label for="Education Loan" class="text-lg cursor-pointer ml-2">Education Loan</label>
                            </div>
                            <div class="flex items-center">
                                <input type="radio" name="reason" id="Driving License" value="Driving License"
                                    class="h-4 w-4 cursor-pointer border-indigo-800 text-indigo-800 focus:ring-2 focus:ring-offset-2 rounded-full focus:outline-none focus:ring-indigo-800">
                                <label for="Driving License" class="text-lg cursor-pointer ml-2">Driving License</label>
                            </div>
                            <div class="flex items-center col-span-1">
                                <input type="radio" name="reason" id="Others" value="Other"
                                    class="h-4 w-4 cursor-pointer border-indigo-800 text-indigo-800 focus:ring-2 focus:ring-offset-2 rounded-full focus:outline-none focus:ring-indigo-800 peer">
                                <label for="Others" class="text-lg cursor-pointer ml-2">Others</label>
                            </div>
                        </div>
                        <div>
                            <input type="text" name="other_reason" id="other_reason"
                                placeholder="Enter Your Other Reason"
                                class="bg-white w-96 ml-5 mt-1 h-10 rounded-lg pl-3 text-lg outline-none focus:ring-2 focus:ring-indigo-800 hidden">
                        </div>
                    </div>
                    <div class="flex flex-col col-span-1">
                        <label for="Fees" class="text-xl">Upload current semester Fees Recipt</label>
                        <input type="file" name="fees_recipt"
                            class="mt-3 file:outline-none file:h-12 file:w-36 file:rounded-lg cursor-pointer file:cursor-pointer file:border-0 file:bg-white focus:ring-2 focus:ring-indigo-800 focus:rounded-lg text-lg file: file:text-gray-400">
                    </div>
                </div>
                <div class="w-full mt-3 flex justify-end">
                    <button
                        class="bg-red-700 text-white h-12 px-7 text-lg rounded-lg focus:ring-2 focus:ring-offset-2 focus:ring-offset-red-700 mr-8"
                        id="reset">Reset</button>
                    <button
                        class="bg-indigo-800 text-white h-12 px-5 text-lg rounded-lg focus:ring-2 focus:ring-offset-2 focus:ring-offset-indigo-800"
                        name="insert">Submit</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        // Radio Button onclick TextBox Show and Hide
        const other_radio = document.querySelector('input[value=Other]');
        const other_reason = document.getElementById('other_reason');
        other_radio.addEventListener('change', function () {
            if (other_radio.checked) {
                other_reason.classList.remove('hidden');
                other_reason.focus();
            } else {
                other_reason.classList.add('hidden');
            }
        });
        const brts_radio = document.getElementById('BRTS Pass');
        brts_radio.addEventListener('change', function () {
            if (brts_radio.checked) {
                other_reason.classList.add('hidden');
            }
        });
        const mysy_radio = document.getElementById('MYSY Scholarship');
        mysy_radio.addEventListener('change', function () {
            if (mysy_radio.checked) {
                other_reason.classList.add('hidden');
            }
        });
        const education_radio = document.getElementById('Education Loan');
        education_radio.addEventListener('change', function () {
            if (education_radio.checked) {
                other_reason.classList.add('hidden');
            }
        });
        const driving_radio = document.getElementById('Driving License');
        driving_radio.addEventListener('change', function () {
            if (driving_radio.checked) {
                other_reason.classList.add('hidden');
            }
        });

        // Reset Button onclick function
        const form = document.getElementById('bonafide_form');
        const reset_btn = document.getElementById('reset');
        reset_btn.addEventListener('click', function () {
            form[0].reset();
        });
    </script>
</body>

</html>