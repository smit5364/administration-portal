<?php
// error_reporting(0);
session_start();
include('private/signin_server.php');
$signin = new Signin;
if (isset($_SESSION['enrollment'])) {
    header('location:home');
}
if (isset($_POST['validate'])) {
    $enroll = addslashes($_POST['enrollment']);
    $pass = addslashes($_POST['password']);
    $data = $signin->Search($enroll);
    if ($data[9] == $pass && $data[10] == "1") {
        $_SESSION['enrollment'] = $data[6];

        if (isset($_SESSION['redirect_url'])) {
            $redirect_url = $_SESSION['redirect_url'];
            unset($_SESSION['redirect_url']);
            header('Location: ' . $redirect_url);
        } else {
            header('location:home');
        }
    } else if ($data[10] == "0") {
        $_SESSION['status_code'] = "error";
        $_SESSION['status'] = "";
        $_SESSION['title'] = "You don't have authority for Login";
    } else {
        $_SESSION['status_code'] = "error";
        $_SESSION['status'] = "";
        $_SESSION['title'] = "Invalid Email or Password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignIn Administration</title>
    <link rel="icon" href="private/assets/images/BMCCA_logo.png">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="private/src/animate.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="private/src/font.css" rel="stylesheet">
    <link rel="stylesheet" href="private/src/aos.css" />
    <style>
        .enrollment::-webkit-outer-spin-button,
        .enrollment::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    
    .swal-modal{
        padding: 20px 0px 20px 0px;
    }
    .swal-text{
        font-size: 20px;
        text-align: center;
    }
    
    .swal-button{
        background-color: #4F46E5;
    }

    input[type=password]::-ms-reveal,
    input[type=password]::-ms-clear
    {
        display: none;
    }

    </style>
</head>

<body style="font-family: 'Geologica', sans-serif; -webkit-tap-highlight-color: transparent;" class="bg-gray-200">
    <div class="flex items-center justify-center h-[100vh] w-full overflow-hidden">
        <div class="bg-gray-100 w-fit rounded-xl shadow-lg py-5 px-6 mx-4 sm:px-10">
            <div class="w-full flex flex-col justify-center items-center">
                <img src="private/assets/images/BMCCA_logo.png" alt="" class="w-32 sm:w-36 mt-3">
            </div>
            <div class="grid grid-cols-1 py-4 gap-x-10">
                <form action="" method="post">
                    <div class="flex flex-col w-auto sm:w-[350px]">
                        <label for="" class="text-lg mb-1 sm:text-xl sm:mb-2">Enrollment Number</label>
                        <input type="number" name="enrollment" placeholder="Enter Your Enrollment" class="enrollment h-12 sm:h-14 rounded-lg text-lg sm:text-xl pl-2 focus:ring-2 focus:outline-none outline-none focus:ring-offset-2 focus:ring-indigo-600">
                    </div>
                    <div class="flex flex-col w-auto mt-4 sm:w-[350px]">
                        <label for="" class="text-lg mb-1 sm:text-xl sm:mb-2">Password</label>
                        <input type="password" name="password" id="password" placeholder="Enter Your Password" class="h-12 sm:h-14 rounded-lg text-lg sm:text-xl pl-2 focus:ring-2 focus:outline-none outline-none focus:ring-offset-2 focus:ring-indigo-600 w-full">
                    </div>
                    <div class="flex items-center w-auto mt-2 ml-1">
                        <input type="checkbox" name="showPassword" id="showPassword" class=" W-[16px] h-[16px] sm:w-[18px] sm:h-[18px] outline-none cursor-pointer" onclick="showPassword_onclick()">
                        <label for="showPassword" class="text-lg sm:text-xl pl-2 cursor-pointer">Show Password</label>
                    </div>
                    <div class="flex justify-center mt-2">
                        <p class="text-lg sm:text-xl text-indigo-600 cursor-pointer" onclick="forget_password()">Forget Password?</p>
                    </div>
                    <div class="flex justify-center mt-2">
                        <button name="validate" class="bg-indigo-600 text-white text-lg font-medium w-full sm:text-xl rounded-lg px-5 py-2 focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600 hover:bg-indigo-500">Login</button>
                    </div>
                    <div class="flex justify-center mt-4">
                        <p class="text-lg sm:text-xl text-gray-500">Don't have an account? <a href="signup" class="text-indigo-600">Sign Up</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="private/src/jQuery.js"></script>
    <script src="private/src/sweetalert.js"></script>
    <?php include('private/sweet_alert.php') ?>
    <script>
        function showPassword_onclick(){
            const showPassword = document.getElementById('showPassword');
            const password = document.getElementById('password');
            if(password.type == "password"){
                password.type = "text";
            }else{
                password.type = "password";
            }
        }

        function forget_password(){
            window.location.href = "forget_password";
        }
    </script>
</body>

</html>