<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request For TC & PD</title>
    <link rel="icon" href="Assets/images/BMCCA_logo.png">
    <script src="Assets/src/tailwind.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Geologica:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
</head>

<body style="font-family: 'Geologica', sans-serif;">
    <div class="shadow-lg">
        <?php include('header.php');?>
    </div>
    <div class="flex items-center justify-center my-6">
        <div class="w-full h-fit flex flex-col justify-start px-5 py-3 sm:py-6 md:mx-12 xl:mx-56 xl:py-5
        xl:px-12 mx-5 rounded-xl" style="background: linear-gradient(-45deg, #e3ffe7 0%, #d9e7ff 100%);">
            <!-- Title -->
            <h1 class="text-2xl font-medium mt-2 md:text-3xl">Request for Transfer & Provisional Degree Certificate</h1>
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
                        <select name="Semester" id="Semester" class="bg-white h-12 rounded-lg pl-2 text-lg outline-none focus:ring-2 focus:ring-indigo-800" required>
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

                    <!-- Request for Document -->
                    <div class="row-span-1 flex flex-col">
                        <label for="Reason For Bonafide Issue" class="text-xl">Select Document</label>
                        <div class="row-span-1 flex items-center mt-1 relative">
                            <input type="checkbox" id="tc" name="tc" value="1" class="h-4 w-4" required>
                            <label for="tc" class="ml-2 text-lg">Transfer Certificate</label>
                        </div>
                        <div class="row-span-1 flex items-center mt-1">
                            <input type="checkbox" id="pdc" name="pdc" value="1" class="h-4 w-4 text-indigo-600 bg-indigo-600" required>
                            <label for="pdc" class="ml-2 text-lg">Provisional Degree Certificate</label>
                        </div>
                    </div> 

                    <!-- Semester Fees File uploadation -->
                    <div class="row-span-1 flex flex-col">
                        <label for="fees_recipt" class="text-xl">Upload Final semester Marksheet<sup class="text-red-600">*</sup></label>
                        <input required type="file" name="marksheet" id="marksheet"
                        class="file:outline-none w-full file:w-fit file:h-12 file:rounded-lg cursor-pointer file:cursor-pointer file:border-0 file:bg-white focus:ring-2 focus:ring-indigo-800 focus:rounded-lg text-lg file:text-gray-400" accept=".pdf,.jpg">
                        <span class="text-red-600">*Note: Only PDF file accepted</span>
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
    <!-- <div class="flex items-center justify-center mt-3">
        <div class="bg-[#F3F7F6] w-[64rem] px-14 py-8 rounded-xl shadow-md flex flex-col justify-start" style="background: linear-gradient(90deg, #e3ffe7 0%, #d9e7ff 100%);">
            <h1 class="text-2xl font-medium">Request For Transfer , Migration & Provisional Degree Certificate :</h1>
            <form action="" method="post" id="document_form" enctype="multipart/form-data">
                <div class="grid grid-cols-2 mt-6 gap-x-10">
                    <div class="row-span-1 flex flex-col gap-y-1">
                        <label for="Fullname" class="text-xl">Full Name</label>
                         pattern="^[A-Za-z]+\s[A-Za-z]+\s[A-Za-z]+$" -->
                    <!--    <input required readonly type="text" name="fullname" placeholder="Enter Your Fullname" value="<?php if (isset($name)) {
                                                            
                                                            echo $name;
                                                                                                                        } ?>" class="bg-white h-12 rounded-lg pl-3 text-lg outline-none focus:ring-2 focus:ring-indigo-800 cursor-not-allowed" id="fullname">
                    </div>
                    <div class="row-span-2 flex flex-col gap-y-1 ">
                        <label for="Fathername" class="text-xl">Father Name</label>
                        <input required readonly type="text" name="fathername" placeholder="Enter Your Father Name" value="<?php if (isset($fathername)) {
                                                                                                                                echo $fathername;
                                                                                                                            } ?>" class="bg-white h-12 rounded-lg pl-3 text-lg outline-none focus:ring-2 focus:ring-indigo-800 cursor-not-allowed">
                    </div>
                </div>
                <div class="grid grid-cols-4 mt-5 gap-x-10">
                    <div class="col-span-2 flex flex-col gap-y-1 ">
                        <label for="Enrollment" class="text-xl">Enrollment Number</label>
                        <input required readonly type="text" name="enrollment" value="<?php if (isset($enroll)) {
                                                                                            echo $enroll;
                                                                                        } ?>" placeholder="Enter Your Enrollment Number" class="bg-white h-12 rounded-lg pl-3 text-lg outline-none focus:ring-2 focus:ring-indigo-800 cursor-not-allowed">
                    </div>
                    <div class="row-span-2 flex flex-col gap-y-1 ">
                        <label for="Course" class="text-xl">Course</label>
                        <input readonly required class="bg-white h-12 rounded-lg pl-2 text-lg outline-none focus:ring-2 focus:ring-indigo-800 cursor-not-allowed" type="text" name="course" value="<?php if (isset($crs)) {
                                                                                                                                                                                                        echo $crs;
                                                                                                                                                                                                    } ?>" id="">
                    </div>
                    <div class="row-span-2 flex flex-col gap-y-1 ">
                        <label for="Semester" class="text-xl">Semester</label>
                        <input readonly required class="bg-white h-12 rounded-lg pl-2 text-lg outline-none focus:ring-2 focus:ring-indigo-800 cursor-not-allowed" type="text" name="semester" value="<?php if (isset($sem)) {
                                                                                                                                                                                                            echo $sem;
                                                                                                                                                                                                        } ?>" id="">
                    </div>
                </div>
                <div class="grid grid-cols-2 mt-5 gap-x-10">
                    <div class="row-span-1 flex flex-col gap-y-1 ">
                        <label for="Email" class="text-xl">Email</label>
                        <input required readonly type="email" name="email" placeholder="Enter Your Email" class="bg-white h-12 rounded-lg pl-3 text-lg outline-none focus:ring-2 focus:ring-indigo-800 cursor-not-allowed" value="<?php if (isset($email)) {
                                                                                                                                                                                                                                        echo $email;
                                                                                                                                                                                                                                    } ?>">
                    </div>
                    <div class="row-span-2 flex flex-col gap-y-1 ">
                        <label for="Mobile No" class="text-xl">Mobile No</label>
                        <input required readonly type="tel" name="mobile" pattern="[0-9]{10}" placeholder="Enter Your Mobile No" class="bg-white h-12 rounded-lg pl-3 text-lg outline-none focus:ring-2 focus:ring-indigo-800 cursor-not-allowed" value="<?php if (isset($mobile)) {
                                                                                                                                                                                                                                                                echo $mobile;
                                                                                                                                                                                                                                                            } ?>">
                    </div>
                </div>
                <div class="grid grid-cols-2 mt-5 gap-x-10">
                    <div class="row-span-1 flex flex-col gap-y-1">
                        <label for="Reason For Bonafide Issue" class="text-xl">Select Document</label>
                        <div class="row-span-1 flex items-center mt-1 relative">
                            <input type="checkbox" id="tc" name="tc" value="1" class="h-4 w-4">
                            <label for="tc" class="ml-2 text-lg">Transfer Certificate</label>
                        </div>
                        <div class="row-span-1 flex items-center mt-1">
                            <input type="checkbox" id="migration" name="migration" value="1" class="h-4 w-4 text-indigo-600 bg-indigo-600">
                            <label for="migration" class="ml-2 text-lg">Migration Certificate</label>
                        </div>
                        <div class="row-span-1 flex items-center mt-1">
                            <input type="checkbox" id="pdc" name="pdc" value="1" class="h-4 w-4 text-indigo-600 bg-indigo-600">
                            <label for="pdc" class="ml-2 text-lg">Provisional Degree Certificate</label>
                        </div>
                    </div>
                    <div class="flex flex-col row-span-1">
                        <label for="Fees" class="text-xl">Upload Final semester Marksheet</label>
                        <input required type="file" name="marksheet" id="marksheet" class="mt-3 file:outline-none file:h-12 file:w-36 file:rounded-lg cursor-pointer file:cursor-pointer file:border-0 file:bg-white focus:ring-2 focus:ring-indigo-800 focus:rounded-lg text-lg file: file:text-gray-400">
                    </div>
                </div>
                <div class="w-full mt-3 flex justify-end">
                    <input class="bg-red-700 text-white h-12 px-7 text-lg rounded-lg focus:ring-2 focus:ring-offset-2 focus:ring-offset-red-700 mr-8" type="reset" value="Reset">
                    <button class="bg-indigo-800 text-white h-12 px-5 text-lg rounded-lg focus:ring-2 focus:ring-offset-2 focus:ring-offset-indigo-800" name="insert">Submit</button>
                </div>
            </form>
        </div>
    </div> -->
    <script src="Assets/src/jQuery.js"></script>
    <script src="Assets/src/semester_change.js"></script>
</body>

</html>