<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignIn Administration</title>
    <link rel="icon" href="Assets/images/BMCCA_logo.png">
    <link rel="stylesheet" href="style.css">
    <script src="Assets/src/tailwind.js"></script>
    <link rel="stylesheet" href="Assets/src/animate.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="Assets/src/font.css" rel="stylesheet">
    <link rel="stylesheet" href="Assets/src/aos.css" />
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
                <img src="Assets/images/BMCCA_logo.png" alt="" class="w-32 sm:w-36 mt-3">
            </div>
            <div class="grid grid-cols-1 py-4 gap-x-10">
                <form method="post">
                    <div class="flex flex-col w-auto sm:w-[350px]">
                        <label for="enrollment" class="text-lg mb-1 sm:text-xl sm:mb-2">Enrollment Number</label>
                        <input type="number" name="enrollment" id="enrollment" placeholder="Enter Your Enrollment" class="enrollment h-12 sm:h-14 rounded-lg text-lg sm:text-xl pl-2 focus:ring-2 focus:outline-none outline-none focus:ring-offset-2 focus:ring-indigo-600 shadow-sm" required>
                    </div>
                    <div class="flex flex-col w-auto mt-4 sm:w-[350px]">
                        <label for="password" class="text-lg mb-1 sm:text-xl sm:mb-2">Password</label>
                        <input type="password" name="password" id="password" placeholder="Enter Your Password" class="h-12 sm:h-14 rounded-lg text-lg sm:text-xl pl-2 focus:ring-2 focus:outline-none outline-none focus:ring-offset-2 focus:ring-indigo-600 w-full shadow-sm" required>
                    </div>
                    <div class="flex items-center w-auto mt-2 ml-1">
                        <input type="checkbox" name="showPassword" id="showPassword" class=" W-[16px] h-[16px] sm:w-[18px] sm:h-[18px] outline-none cursor-pointer" onclick="showPassword_onclick()">
                        <label for="showPassword" class="text-lg sm:text-xl pl-2 cursor-pointer">Show Password</label>
                    </div>
                    <div class="flex justify-center mt-2">
                        <p class="text-lg sm:text-xl text-indigo-600 cursor-pointer" onclick="forget_password()">Forget Password?</p>
                    </div>
                    <div class="flex justify-center mt-2">
                        <button name="login" class="bg-indigo-600 text-white text-lg font-medium w-full sm:text-xl rounded-lg px-5 py-2 focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600 hover:bg-indigo-500"  type="submit">Login</button>
                    </div>
                    <div class="flex justify-center mt-4">
                        <p class="text-lg sm:text-xl text-gray-700">Don't have an account? <a href="signup" class="text-indigo-600">Sign Up</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="Assets/src/jQuery.js"></script>
    <script src="Assets/src/sweetalert.js"></script>
    <?php include('Controllers/sweet_alert.php'); ?>
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
    </script>
</body>

</html>