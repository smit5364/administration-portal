<?php
// error_reporting(0);
include('private/admission_cancel_server.php');
$admission_cancel = new admission_cancel;
session_start();
$_SESSION['redirect_url'] = $_SERVER['REQUEST_URI'];
if (!$_SESSION['enrollment']) {
    header('location:signin');
}
if (isset($_SESSION['enrollment'])) {
    $enroll = $_SESSION['enrollment'];
    $studentInfo = $admission_cancel->getStudentInfo($enroll);
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
    $sem = addslashes($_POST['Semester']);
    $email = addslashes($_POST['email']);
    $mobile = addslashes($_POST['mobile']);
    // Insert Data
    $admission_cancel->insert($enroll,$name,$fathername,$course,$sem,$mobile,$email);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admission Cancel</title>
    <link rel="icon" href="private/images/fav.png">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Geologica:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
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
        <div class="bg-[#F3F7F6] w-[64rem] px-14 py-8 rounded-xl shadow-md flex flex-col justify-start" style="background: linear-gradient(90deg, #e3ffe7 0%, #d9e7ff 100%);">
            <h1 class="text-3xl font-medium">Details of Admission Cancel</h1>
            <form action="" method="post" id="admission_form" enctype="multipart/form-data">
                <div class="grid grid-cols-2 mt-6 gap-x-10">
                    <div class="row-span-1 flex flex-col gap-y-1 ">
                        <label for="Fullname" class="text-xl">Full Name</label>
                        <!-- pattern="^[A-Za-z]+\s[A-Za-z]+\s[A-Za-z]+$" -->
                        <input required readonly type="text" name="fullname" placeholder="Enter Your Fullname" value="<?php if (isset($name)) {
                                                                                                                            echo htmlspecialchars($name);
                                                                                                                        } ?>" class="bg-white h-12 rounded-lg pl-3 text-lg outline-none focus:ring-2 focus:ring-indigo-800 cursor-not-allowed" id="fullname">

                    </div>
                    <div class="row-span-2 flex flex-col gap-y-1 ">
                        <label for="Fathername" class="text-xl">Father Name</label>
                        <input required readonly type="text" name="fathername" placeholder="Enter Your Father Name" value="<?php if (isset($fathername)) {
                                                                                                                                echo htmlspecialchars($fathername);
                                                                                                                            } ?>" class="bg-white h-12 rounded-lg pl-3 text-lg outline-none focus:ring-2 focus:ring-indigo-800 cursor-not-allowed">
                    </div>
                </div>
                <div class="grid grid-cols-4 mt-8 gap-x-10">
                    <div class="col-span-2 flex flex-col gap-y-1 ">
                        <label for="Enrollment" class="text-xl">Enrollment Number</label>
                        <input required readonly type="text" name="enrollment" value="<?php if (isset($enroll)) {
                                                                                            echo htmlspecialchars($enroll);
                                                                                        } ?>" placeholder="Enter Your Enrollment Number" class="bg-white h-12 rounded-lg pl-3 text-lg outline-none focus:ring-2 focus:ring-indigo-800 cursor-not-allowed">
                    </div>
                    <div class="row-span-2 flex flex-col gap-y-1 ">
                        <label for="Course" class="text-xl">Course</label>
                        <input readonly required class="bg-white h-12 rounded-lg pl-2 text-lg outline-none focus:ring-2 focus:ring-indigo-800 cursor-not-allowed" type="text" name="course" value="<?php if (isset($crs)) {
                                                                                                                                                                                                        echo htmlspecialchars($crs);
                                                                                                                                                                                                    } ?>" id="Course">
                    </div>
                    <div class="row-span-2 flex flex-col gap-y-1 ">
                        <label for="Semester" class="text-xl">Semester</label>
                        <select name="Semester" id="Semester" class="bg-white h-12 rounded-lg pl-2 text-lg outline-none focus:ring-2 focus:ring-indigo-800 cursor-pointer" required>
                        <option value="" class="hidden">Choose Semester</option>
                        </select>
                    </div>
                </div>
                <div class="grid grid-cols-2 mt-6 gap-x-10">
                    <div class="row-span-1 flex flex-col gap-y-1 ">
                        <label for="Email" class="text-xl">Email</label>
                        <input required readonly type="email" name="email" placeholder="Enter Your Email" class="bg-white h-12 rounded-lg pl-3 text-lg outline-none focus:ring-2 focus:ring-indigo-800 cursor-not-allowed" value="<?php if (isset($email)) {
                                                                                                                                                                                                                                        echo htmlspecialchars($email);
                                                                                                                                                                                                                                    } ?>">
                    </div>
                    <div class="row-span-2 flex flex-col gap-y-1 ">
                        <label for="Mobile No" class="text-xl">Mobile No</label>
                        <input required readonly type="tel" name="mobile" pattern="[0-9]{10}" placeholder="Enter Your Mobile No" class="bg-white h-12 rounded-lg pl-3 text-lg outline-none focus:ring-2 focus:ring-indigo-800 cursor-not-allowed" value="<?php if (isset($mobile)) {
                                                                                                                                                                                                                                                                echo htmlspecialchars($mobile);
                                                                                                                                                                                                                                                            } ?>">
                    </div>
                </div>
                <div class="w-full mt-6 flex justify-end">
                    <button class="bg-indigo-800 text-white h-12 px-5 text-lg rounded-lg focus:ring-2 focus:ring-offset-2 focus:ring-offset-indigo-800" name="insert">Submit</button>
                </div>
            </form>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script>
        // semester change
        const Semester = document.getElementById('Semester');
        Semester.addEventListener('focus', () => {
            const Course = document.getElementById('Course').value;
            jQuery.ajax({
                url: 'private/admission_cancel_server.php',
                type: 'POST',
                data: "&course_code=" + Course,
                success: function(response) {
                    const code = response;
                    console.log(response);
                    $('#Semester').html(code);
                }
            })
        });
    </script>
</body>

</html>