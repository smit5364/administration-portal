<?php
session_start();
include('private/bonafide_server.php');
// include('private/sweet_alert.php');
$bonafide = new Bonafide;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp Administration</title>
    <link rel="icon" href="private/images/fav.png">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Geologica:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
</head>

<body style="font-family: 'Geologica', sans-serif;" class="bg-gray-200">
    <div class="flex justify-center mt-28">
        <div class="bg-gray-100 w-fit rounded-xl shadow-lg">
            <div class="w-full flex justify-center"><img src="private/images/logo.png" alt="" class="w-36 mt-3"></div>
            <form action="" method="post" id="signup_form">
                <div class="grid grid-cols-3 px-10 py-4 gap-x-10">
                    <div class="flex flex-col w-72">
                        <label for="" class="text-lg">First Name</label>
                        <input type="text" name="firstname" id="firstname" placeholder="Enter Your Name"
                            class="h-12 rounded-lg text-lg pl-2 focus:ring-2 focus:outline-none outline-none focus:ring-offset-2 focus:ring-indigo-800"
                            required>
                    </div>
                    <div class="flex flex-col w-72">
                        <label for="" class="text-lg">Middle Name</label>
                        <input type="text" name="middlename" id="middlename" placeholder="Enter Your Father Name"
                            class="h-12 rounded-lg text-lg pl-2 focus:ring-2 focus:outline-none outline-none focus:ring-offset-2 focus:ring-indigo-800 w-full"
                            required>
                    </div>
                    <div class="flex flex-col w-72">
                        <label for="" class="text-lg">Last Name</label>
                        <input type="text" name="lastname" id="lastname" placeholder="Enter Your Surname"
                            class="h-12 rounded-lg text-lg pl-2 focus:ring-2 focus:outline-none outline-none focus:ring-offset-2 focus:ring-indigo-800"
                            required>
                    </div>
                </div>
                <div class="grid grid-cols-3 px-10 py-4 gap-x-10">
                    <div class="flex flex-col w-72">
                        <label for="" class="text-lg">Father Name</label>
                        <input type="text" name="fathername" id="fathername" placeholder="Enter Your Father Name"
                            class="h-12 rounded-lg text-lg pl-2 focus:ring-2 focus:outline-none outline-none focus:ring-offset-2 focus:ring-indigo-800"
                            required>
                    </div>
                    <div class="flex flex-col w-72">
                        <label for="Course" class="text-lg">Course</label>
                        <select required name="course" id="course"
                            class="bg-white h-12 rounded-lg pl-2 text-lg outline-none focus:ring-2 focus:ring-indigo-800">
                            <option value="Choose Course" class="hidden">Choose Course</option>
                            <?php
                            $courses = $bonafide->fetch_courses_from_table();
                            foreach ($courses as $course) {
                                $selected = ($course['course_code'] == $crs) ? 'selected' : ''; // Check if the course matches the selectedCourse variable
                                echo '<option value="' . $course['course_code'] . '" ' . $selected . '>' . $course['course_code'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="flex flex-col w-72">
                        <label for="" class="text-lg">Semester</label>
                        <select name="semester" id="semester" class="bg-white h-12 rounded-lg pl-2 text-lg outline-none focus:ring-2 focus:ring-indigo-800" required>
                            <option value="Choose Semester" class="hidden">Choose Semester</option>
                        </select>
                    </div>
                </div>
                <div class="grid grid-cols-3 px-10 py-4 gap-x-10">
                    <div class="flex flex-col w-72">
                        <label for="" class="text-lg">Email</label>
                        <input type="email" name="email" id="email" placeholder="Enter Your Email"
                            class="h-12 rounded-lg text-lg pl-2 focus:ring-2 focus:outline-none outline-none focus:ring-offset-2 focus:ring-indigo-800"
                            required>
                    </div>
                    <div class="flex flex-col w-72">
                        <label for="" class="text-lg">Mobile Number</label>
                        <input type="text" name="mobile" id="mobile" pattern="[0-9]{10}"
                            placeholder="Enter Your Mobile Number"
                            class="h-12 rounded-lg text-lg pl-2 focus:ring-2 focus:outline-none outline-none focus:ring-offset-2 focus:ring-indigo-800 w-full"
                            required>
                    </div>
                    <div class="flex flex-col w-72">
                        <label for="" class="text-lg">Enrollment Number</label>
                        <input type="text" name="enrollment" id="enrollment" placeholder="Enter Your Enrollment No"
                            class="h-12 rounded-lg text-lg pl-2 focus:ring-2 focus:outline-none outline-none focus:ring-offset-2 focus:ring-indigo-800 w-full"
                            required>
                    </div>
                </div>
                <div class="grid grid-cols-3 px-10 py-4 gap-x-10">
                    <div class="flex flex-col w-72">
                        <label for="" class="text-lg">Password</label>
                        <input type="password" name="password" id="password" placeholder="Enter Your Password"
                            class="h-12 rounded-lg text-lg pl-2 focus:ring-2 focus:outline-none outline-none focus:ring-offset-2 focus:ring-indigo-800 w-full"
                            required>
                    </div>
                    <div class="flex flex-col w-72">
                        <label for="" class="text-lg">Confirm Password</label>
                        <input type="password" name="password" id="confirm_password" placeholder="Enter Your Password"
                            class="h-12 rounded-lg text-lg pl-2 focus:ring-2 focus:outline-none outline-none focus:ring-offset-2 focus:ring-indigo-800 w-full"
                            required>
                    </div>
                </div>
                <div class="flex justify-end pr-10 py-5">
                    <button id="signup" type="submit"
                        class="bg-indigo-600 text-white text-lg font-medium rounded-lg px-3 py-2 focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600 hover:bg-indigo-500">Sign
                        Up</button>
                </div>
            </form>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $('#course').change(function(){            
            var course_code = $(this).val();
            jQuery.ajax({
                url: 'private/bonafide_server.php',
                type: 'POST',
                data: '&course_code='+ course_code,
                success: function(result){
                    let code = result;
                    $('#semester').html(code);
                }
            })
        });

        const form = document.getElementById('signup_form');
        form.addEventListener('submit', function (event) {
            event.preventDefault();
            var fname = document.getElementById('firstname').value;
            var mname = document.getElementById('middlename').value;
            var lname = document.getElementById('lastname').value;
            var father = document.getElementById('fathername').value;
            var course = document.getElementById('course').value;
            var semester = document.getElementById('semester').value;
            var enrollment = document.getElementById('enrollment').value;
            var email = document.getElementById('email').value;
            var mobile = document.getElementById('mobile').value;
            var pass = document.getElementById('password').value;
            var confirm_password = document.getElementById('confirm_password').value;
            if (pass == confirm_password) {

                jQuery.ajax({
                    url: 'private/signup_server.php',
                    type: 'POST',
                    data: '&fname=' + fname + '&mname=' + mname + '&lname=' + lname + '&father=' + father + '&course=' + course + '&sem=' + semester + '&enrollment=' + enrollment + '&email=' + email + '&mobile=' + mobile + '&pass=' + pass,
                    success: function () {
                        window.location.href = "signin";
                    }
                });
            } else {
                alert('Please Check and Fill Correct form!');
            }
        });
    </script>
</body>

</html>