<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admission Cancel</title>
    <link rel="icon" href="Assets/images/BMCCA_logo.png">
    <!-- <link rel="stylesheet" href="style.css"> -->
    <script src="Assets/src/tailwind.js"></script>
    <link rel="manifest" href="manifest.json">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Geologica:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        ::-webkit-scrollbar {
            display: none;
        }
    </style>
</head>

<body style="font-family: 'Geologica', sans-serif;" class="bg-gray-100">
<div class="shadow-lg">
        <?php include("Views/header.php"); ?>
    </div>
    <div class="flex items-center justify-center my-6">
        <div class="w-full h-fit flex flex-col justify-start px-5 py-3 sm:py-6 md:mx-12 xl:mx-56 xl:py-5
        xl:px-12 mx-5 rounded-xl" style="background: linear-gradient(-45deg, #e3ffe7 0%, #d9e7ff 100%);">
            <!-- Title -->
            <h1 class="text-2xl font-medium mt-2 md:text-3xl">Request for Admission Cancel</h1>
            <form action="" method="post" id="document_form" enctype="multipart/form-data">
                <div class="grid grid-rows-20 sm:grid-cols-2 sm:gap-x-6 mt-4 gap-y-3 xl:gap-x-10 xl:gap-y-5">

                    <!-- Fullname -->
                    <div class="row-span-1 flex flex-col">
                        <label for="Fullname" class="text-xl">Full Name<sup class="text-red-600">*</sup></label>
                        <input required readonly type="text" name="fullname" placeholder="Enter Your Fullname" value="<?php if (isset($name)) { echo $name; } ?>" class="bg-white h-12 rounded-lg pl-3 text-lg outline-none focus:ring-2 focus:ring-indigo-800 cursor-not-allowed" id="fullname">
                    </div>

                    <!-- Father Name -->
                    <div class="row-span-1 flex flex-col">
                        <label for="Fathername" class="text-xl">Father Name<sup class="text-red-600">*</sup></label>
                        <input required readonly type="text" name="fathername" placeholder="Enter Your Fathername" value="<?php if (isset($fathername)) { echo $fathername; } ?>" class="bg-white h-12 rounded-lg pl-3 text-lg outline-none focus:ring-2 focus:ring-indigo-800 cursor-not-allowed" id="fathername">
                    </div>

                    <div class="grid sm:grid-cols-4 grid-cols-1 sm:flex-col sm:col-span-2 sm:gap-x-6 xl:gap-x-10">
                    <!-- Enrollment -->
                    <div class="sm:col-span-2 flex flex-col">
                        <label for="Enrollment" class="text-xl">Enrollment Number<sup class="text-red-600">*</sup></label>
                        <input required readonly type="text" name="enrollment" value="<?php if (isset($enroll)) { echo htmlspecialchars($enroll);} ?>" placeholder="Enter Your Enrollment Number" class="bg-white h-12 rounded-lg pl-3 text-lg outline-none focus:ring-2 focus:ring-indigo-800 cursor-not-allowed">
                    </div>

                    <!-- Course -->
                    <div class="sm:row-span-2 flex flex-col">
                        <label for="Course" class="text-xl">Course<sup class="text-red-600">*</sup></label>
                        <input readonly required class="bg-white h-12 rounded-lg pl-2 text-lg outline-none focus:ring-2 focus:ring-indigo-800 cursor-not-allowed" type="text" name="course" id="Course" value="<?php if (isset($crs)) { echo htmlspecialchars($crs);} ?>" id="">
                    </div>

                    <!-- Semester -->
                    <div class="sm:row-span-2 flex flex-col">
                        <label for="Semester" class="text-xl">Semester<sup class="text-red-600">*</sup></label>
                        <select name="semester" id="Semester" class="bg-white h-12 rounded-lg pl-2 text-lg outline-none focus:ring-2 focus:ring-indigo-800" required>
                            <option value="" class="hidden">Choose Semester</option>
                        </select>
                    </div>
                </div>
                 
                    <!-- E-mail -->
                    <div class="row-span-1 flex flex-col">
                        <label for="Email" class="text-xl">E-mail<sup class="text-red-600">*</sup></label>
                        <input required readonly type="email" name="email" placeholder="Enter Your Email" value="<?php if (isset($email)) { echo $email; } ?>" class="bg-white h-12 rounded-lg pl-3 text-lg outline-none focus:ring-2 focus:ring-indigo-800 cursor-not-allowed" id="Email">
                    </div>

                    <!-- MobileNo -->
                    <div class="row-span-1 flex flex-col">
                        <label for="Mobile_No" class="text-xl">Mobile No<sup class="text-red-600">*</sup></label>
                        <input required readonly type="tel" name="Mobile_No" pattern="[0-9]{10}" placeholder="Enter Your Mobile No" value="<?php if (isset($mobile)) { echo $mobile; } ?>" class="bg-white h-12 rounded-lg pl-3 text-lg outline-none focus:ring-2 focus:ring-indigo-800 cursor-not-allowed" id="Mobile_No">
                    </div>
                    <div class="w-full mt-3 sm:col-span-2 flex justify-between sm:justify-end">
                        <!-- Reset Button -->
                        <input class="bg-red-700 text-white h-12 px-7 text-lg rounded-lg focus:ring-2 focus:ring-offset-2 focus:ring-offset-red-700 mr-8 cursor-pointer"
                        type="reset" value="Reset">
                        <!-- Submit Button -->
                        <button class="bg-indigo-800 text-white h-12 px-5 text-lg rounded-lg focus:ring-2 focus:ring-offset-2 focus:ring-offset-indigo-800"
                        name="insert">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="Assets/src/semester_change.js"></script>
</body>

</html>