<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp BMCCA Administration</title>
    <link rel="icon" href="Assets/images/BMCCA_logo.png">
    <link rel="icon" href="Assets/images/BMCCA_logo.png">
    <link rel="apple-touch-icon" href="Assets/images/BMCCA_logo_96x96.png">
    <link rel="stylesheet" href="style.css">
    <script src="Assets/src/tailwind.js"></script>
    <link rel="manifest" href="manifest.json">
    <link rel="stylesheet" href="Assets/src/animate.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="Assets/src/font.css" rel="stylesheet">
    <style>
        ::-webkit-scrollbar {
            display: none;
        }
    </style>
</head>

<body style="font-family: 'Geologica', sans-serif;" class="bg-gray-200 w-full flex justify-center items-center md:h-[95vh] lg:h-[95vh] xl:h-[100vh]">
    <div class="w-fit h-fit">
        <div class="bg-gray-100 py-8 px-5 shadow-lg md:px-8 lg:px-12" style="border-radius: 1.75rem;">
            <div class="image flex justify-center">
                <a href="home"><img src="Assets/images/BMCCA_logo.png" alt="" class="w-32 md:w-48 xl:w-36"></a>
            </div>
            <div class="form mt-6">
                <form action="" method="post" id="signup_form" enctype="multipart/form-data">
                    <div class="grid sm:grid sm:grid-cols-2 sm:place-items-center
                    gap-x-5 md:gap-x-9 md:gap-y-3 lg:gap-x-12 lg:gap-y-5 xl:grid-cols-3 xl:place-items-start xl:gap-y-2">
                        <div class="flex flex-col justify-start w-80 mt-3 sm:mt-0 sm:w-72 md:w-80 lg:w-96 xl:w-80">
                            <label for="firstname" class="text-lg ml-1 font-medium text-gray-800 md:text-2xl lg:text-[27px] xl:text-xl">First Name</label>
                            <input type="text" name="firstname" id="firstname" placeholder="Enter Your Name" class="h-12 rounded-lg text-lg pl-2 mt-1 focus:ring-2 outline-none focus:outline-none focus:ring-offset-2 focus:ring-indigo-600 md:text-xl md:h-14 md:pl-3 lg:text-[27px] xl:text-lg xl:h-12 shadow-sm" required>
                        </div>
                        <div class="flex flex-col justify-start w-80 mt-3 sm:mt-0 sm:w-72 md:w-80 lg:w-96 xl:w-80">
                            <label for="middlename" class="text-lg ml-1 font-medium text-gray-800 md:text-2xl lg:text-[27px] xl:text-xl">Middle Name</label>
                            <input type="text" name="middlename" id="middlename" placeholder="Enter Your Father Name" class="h-12 rounded-lg text-lg pl-2 mt-1 focus:ring-2 focus:outline-none outline-none focus:ring-offset-2 focus:ring-indigo-600 md:text-xl md:h-14 md:pl-3 lg:text-[27px] xl:text-lg xl:h-12 shadow-sm" required>
                        </div>
                        <div class="flex flex-col justify-start w-80 mt-3 sm:mt-3 sm:w-72 md:w-80 lg:w-96 xl:w-80 xl:mt-0">
                            <label for="lastname" class="text-lg ml-1 font-medium text-gray-800 md:text-2xl lg:text-[27px] xl:text-xl">Last Name</label>
                            <input type="text" name="lastname" id="lastname" placeholder="Enter Your Surname" class="h-12 rounded-lg text-lg pl-2 mt-1 focus:ring-2 focus:outline-none outline-none focus:ring-offset-2 focus:ring-indigo-600 md:text-xl md:h-14 md:pl-3 lg:text-[27px] xl:text-lg xl:h-12 shadow-sm" required>
                        </div>
                        <!-- <div class="flex flex-col justify-start w-80 mt-3 sm:mt-3 sm:w-72 md:w-80 lg:w-96 xl:w-80">
                            <label for="fathername" class="text-lg ml-1 font-medium text-gray-800 md:text-2xl lg:text-[27px] xl:text-xl">Father Name</label>
                            <input type="text" name="fathername" id="fathername" placeholder="Enter Your Father Name" class="h-12 rounded-lg text-lg pl-2 mt-1 focus:ring-2 focus:outline-none outline-none focus:ring-offset-2 focus:ring-indigo-600 md:text-xl md:h-14 md:pl-3 lg:text-[27px] xl:text-lg xl:h-12 shadow-sm" required>
                        </div> -->
                        <div class="flex flex-col justify-start w-80 mt-3 sm:mt-3 sm:w-72 md:w-80 lg:w-96 xl:w-80">
                            <label for="course" class="text-lg ml-1 font-medium text-gray-800 md:text-2xl lg:text-[27px] xl:text-xl">Course</label>
                            <select required name="course" id="course" class="bg-white h-12 rounded-lg pl-2 text-lg mt-1 outline-none focus:ring-2 focus:ring-indigo-600 md:text-xl md:h-14 md:pl-3 lg:text-[27px] xl:text-lg xl:h-12 shadow-sm">
                                <option value="Choose Course" class="hidden">Choose Course</option>
                                <?php
                                $courses = $signup->fetch_courses_from_table();
                                foreach ($courses as $course) {
                                    $selected = ($course['course_code'] == $crs) ? 'selected' : ''; // Check if the course matches the selectedCourse variable
                                    echo '<option value="' . $course['course_code'] . '" ' . $selected . '>' . $course['course_code'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="flex flex-col justify-start w-80 mt-3 sm:mt-3 sm:w-72 md:w-80 lg:w-96 xl:w-80">
                            <label for="enrollment" class="text-lg ml-1 font-medium text-gray-800 md:text-2xl lg:text-[27px] xl:text-xl">Enrollment Number</label>
                            <input type="text" name="enrollment" id="enrollment" placeholder="Enter Your Enrollment" class="h-12 rounded-lg text-lg pl-2 mt-1 focus:ring-2 focus:outline-none outline-none focus:ring-offset-2 focus:ring-indigo-600 md:text-xl md:h-14 md:pl-3 lg:text-[27px] xl:text-lg xl:h-12 shadow-sm" required>
                        </div>

                        <div class="flex flex-col justify-start w-80 mt-3 sm:mt-3 sm:w-72 md:w-80 lg:w-96 xl:w-80">
                            <label for="email" class="text-lg ml-1 font-medium text-gray-800 md:text-2xl lg:text-[27px] xl:text-xl">Email</label>
                            <input type="email" name="email" id="email" placeholder="Enter Your Email" class="h-12 rounded-lg text-lg pl-2 mt-1 focus:ring-2 focus:outline-none outline-none focus:ring-offset-2 focus:ring-indigo-600 md:text-xl md:h-14 md:pl-3 lg:text-[27px] xl:text-lg xl:h-12 shadow-sm" required>
                        </div>
                        <div class="flex flex-col justify-start w-80 mt-3 sm:mt-3 sm:w-72 md:w-80 lg:w-96 xl:w-80">
                            <label for="mobile" class="text-lg ml-1 font-medium text-gray-800 md:text-2xl lg:text-[27px] xl:text-xl">Mobile Number</label>
                            <input type="text" name="mobile" id="mobile" minlength="10" maxlength="10" pattern="[1-9]{1}[0-9]{9}" placeholder="Enter Your Mobile No" class="h-12 rounded-lg text-lg pl-2 mt-1 focus:ring-2 focus:outline-none outline-none focus:ring-offset-2 focus:ring-indigo-600 md:text-xl md:h-14 md:pl-3 lg:text-[27px] xl:text-lg xl:h-12 shadow-sm" required>
                        </div>
                        <div class="flex flex-col justify-start w-80 mt-3 sm:mt-3 sm:w-72 md:w-80 lg:w-96 xl:w-80">
                            <label for="password" class="text-lg ml-1 font-medium text-gray-800 md:text-2xl lg:text-[27px] xl:text-xl">Password</label>
                            <input type="password" name="password" id="password" placeholder="Enter Your Password" class="h-12 rounded-lg text-lg pl-2 mt-1 focus:ring-2 focus:outline-none outline-none focus:ring-offset-2 focus:ring-indigo-600 md:text-xl md:h-14 md:pl-3 lg:text-[27px] xl:text-lg xl:h-12 shadow-sm" required>
                        </div>
                        <div class="flex flex-col justify-start w-80 mt-3 sm:mt-3 sm:w-72 md:w-80 lg:w-96 xl:w-80">
                            <label for="confirm_password" class="text-lg ml-1 font-medium text-gray-800 md:text-2xl lg:text-[27px] xl:text-xl">Confirm Password</label>
                            <input type="password" name="confirm_password" id="confirm_password" placeholder="Enter Your Password" class="h-12 rounded-lg text-lg pl-2 mt-1 focus:ring-2 focus:outline-none outline-none focus:ring-offset-2 focus:ring-indigo-600 md:text-xl md:h-14 md:pl-3 lg:text-[27px] xl:text-lg xl:h-12 shadow-sm" required>
                        </div>
                    </div>
                    <div class="flex flex-col justify-start w-full mt-5 md:mt-8">
                            <button id="signup" type="submit" name="signup" class="bg-indigo-600 text-white text-lg font-medium rounded-lg px-3 py-2 focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600 hover:bg-indigo-500 md:text-xl md:h-14 md:pl-3 lg:text-[27px] xl:text-lg xl:h-12 shadow-sm">Sign
                                Up</button>
                        </div>
                        <div class="flex justify-center mt-5">
                            <div class="text-xl font-medium text-gray-700 md:text-2xl lg:w-96 xl:text-xl">
                                Already you Registered?
                                <a href="signin" class="text-indigo-600">Sign in</a>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
    <!-- <div class="flex justify-center h-full 2xl:h-screen items-center">
        <div class="bg-gray-100 w-fit h-fit rounded-xl shadow-lg my-10 mx-16">
            <div class="w-full flex justify-center items-center"><img src="private/images/BMCCA_logo.png" alt="" class="w-32 2xl:w-36 mt-3">
            </div>
            <form action="" method="post" id="signup_form">
                <div class="flex flex-col px- 2xl:grid 2xl:grid-cols-3 2xl:px-10 2xl:py-4 2xl:gap-x-10">
                    <div class="flex flex-col 2xl:w-72">
                        <label for="" class="text-lg">First Name</label>
                        <input type="text" name="firstname" id="firstname" placeholder="Enter Your Name" class="h-12 rounded-lg text-lg pl-2 focus:ring-2 focus:outline-none outline-none focus:ring-offset-2 focus:ring-indigo-600" required>
                    </div>
                    <div class="flex flex-col 2xl:w-72">
                        <label for="" class="text-lg">Middle Name</label>
                        <input type="text" name="middlename" id="middlename" placeholder="Enter Your Father Name" class="h-12 rounded-lg text-lg pl-2 focus:ring-2 focus:outline-none outline-none focus:ring-offset-2 focus:ring-indigo-600 w-full" required>
                    </div>
                    <div class="flex flex-col 2xl:w-72">
                        <label for="" class="text-lg">Last Name</label>
                        <input type="text" name="lastname" id="lastname" placeholder="Enter Your Surname" class="h-12 rounded-lg text-lg pl-2 focus:ring-2 focus:outline-none outline-none focus:ring-offset-2 focus:ring-indigo-600" required>
                    </div>
                </div>
                <div class="2xl:grid 2xl:grid-cols-3 2xl:px-10 2xl:py-4 2xl:gap-x-10">
                    <div class="flex flex-col 2xl:w-72">
                        <label for="" class="text-lg">Father Name</label>
                        <input type="text" name="fathername" id="fathername" placeholder="Enter Your Father Name" class="h-12 rounded-lg text-lg pl-2 focus:ring-2 focus:outline-none outline-none focus:ring-offset-2 focus:ring-indigo-600" required>
                    </div>
                    <div class="flex flex-col 2xl:w-72">
                        <label for="Course" class="text-lg">Course</label>
                        <select required name="course" id="course" class="bg-white h-12 rounded-lg pl-2 text-lg outline-none focus:ring-2 focus:ring-indigo-600">
                            <option value="Choose Course" class="hidden">Choose Course</option>
                            <?php
                            // $courses = $bonafide->fetch_courses_from_table();
                            // foreach ($courses as $course) {
                            //     $selected = ($course['course_code'] == $crs) ? 'selected' : ''; // Check if the course matches the selectedCourse variable
                            //     echo '<option value="' . $course['course_code'] . '" ' . $selected . '>' . $course['course_code'] . '</option>';
                            // }
                            ?>
                        </select>
                    </div>
                    <div class="flex flex-col 2xl:w-72">
                        <label for="" class="text-lg">Enrollment Number</label>
                        <input type="text" name="enrollment" id="enrollment" placeholder="Enter Your Enrollment No" class="h-12 rounded-lg text-lg pl-2 focus:ring-2 focus:outline-none outline-none focus:ring-offset-2 focus:ring-indigo-600 w-full" required>
                    </div> -->
    <!-- <div class="flex flex-col w-72">
                        <label for="" class="text-lg">Semester</label>
                        <select name="semester" id="semester" class="bg-white h-12 rounded-lg pl-2 text-lg outline-none focus:ring-2 focus:ring-indigo-600" required>
                            <option value="Choose Semester" class="hidden">Choose Semester</option>
                        </select>
                    </div> -->
    <!-- </div>
                <div class="grid grid-cols-3 px-10 py-4 gap-x-10">
                    <div class="flex flex-col 2xl:w-72">
                        <label for="" class="text-lg">Email</label>
                        <input type="email" name="email" id="email" placeholder="Enter Your Email" class="h-12 rounded-lg text-lg pl-2 focus:ring-2 focus:outline-none outline-none focus:ring-offset-2 focus:ring-indigo-600" required>
                    </div>
                    <div class="flex flex-col 2xl:w-72">
                        <label for="" class="text-lg">Mobile Number</label>
                        <input type="text" name="mobile" id="mobile" pattern="[0-9]{10}" placeholder="Enter Your Mobile Number" minlength="10" maxlength="10" class="h-12 rounded-lg text-lg pl-2 focus:ring-2 focus:outline-none outline-none focus:ring-offset-2 focus:ring-indigo-600 w-full" required>
                    </div>
                </div>
                <div class="grid grid-cols-3 px-10 py-4 gap-x-10">
                    <div class="flex flex-col 2xl:w-72">
                        <label for="" class="text-lg">Password</label>
                        <input type="password" name="password" id="password" placeholder="Enter Your Password" class="h-12 rounded-lg text-lg pl-2 focus:ring-2 focus:outline-none outline-none focus:ring-offset-2 focus:ring-indigo-600 w-full" required>
                    </div>
                    <div class="flex flex-col 2xl:w-72">
                        <label for="" class="text-lg">Confirm Password</label>
                        <input type="password" name="password" id="confirm_password" placeholder="Enter Your Password" class="h-12 rounded-lg text-lg pl-2 focus:ring-2 focus:outline-none outline-none focus:ring-offset-2 focus:ring-indigo-600 w-full" required>
                    </div>
                </div>
                <div class="flex justify-end items-center pr-10 py-5">
                    <div class="text-xl font-medium mr-[14.5rem] text-gray-500">
                        Already you Registered?
                        <a href="signin" class="text-indigo-600">Sign in</a>
                    </div>
                    <button id="signup" type="submit" class="bg-indigo-600 text-white text-lg font-medium rounded-lg px-3 py-2 focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600 hover:bg-indigo-500">Sign
                        Up</button>
                </div>
            </form>
        </div>
    </div> -->
    <script src="Assets/src/jQuery.js"></script>
    <script src="Assets/src/sweetalert.js"></script>
    <?php include('Controllers/sweet_alert.php'); ?>
    <!-- <script>
        const form = document.getElementById('signup_form');
        form.addEventListener('submit', function(event) {
            event.preventDefault();
            var fname = document.getElementById('firstname').value;
            var mname = document.getElementById('middlename').value;
            var lname = document.getElementById('lastname').value;
            var father = document.getElementById('fathername').value;
            var course = document.getElementById('course').value;
            var enrollment = document.getElementById('enrollment').value;
            var email = document.getElementById('email').value;
            var mobile = document.getElementById('mobile').value;
            var pass = document.getElementById('password').value;
            var confirm_password = document.getElementById('confirm_password').value;
            if (enrollment != "" && enrollment != null) {
                jQuery.ajax({
                    url: 'private/signup_server.php',
                    type: 'POST',
                    data: '&enrollment=' + enrollment,
                    success: function(response) {
                        let check = response;
                        if (check == 1) {
                            swal({
                                icon: "warning",
                                title: "This Enrollment is already exist!",
                                text: "Please Enter your Enrollment Number",
                            })
                        } else {
                            if (pass == confirm_password) {
                                jQuery.ajax({
                                    url: 'private/signup_server.php',
                                    type: 'POST',
                                    data: '&insert=' + 'true' + '&fname=' + fname + '&mname=' + mname + '&lname=' + lname + '&father=' + father + '&course=' + course + '&enrollment=' + enrollment + '&email=' + email + '&mobile=' + mobile + '&pass=' + pass,
                                    success: function() {
                                        window.location.href = "signin";
                                    }
                                });
                            } else {
                                swal({
                                    icon: "warning",
                                    title: "Please Check Your confirm Password",
                                })
                            }
                        }
                    }
                })
            }
        });
    </script> -->
</body>
</html>