<?php
// error_reporting(0);
session_start();
include('private/signin_server.php');
$signin = new Signin;
if (isset($_POST['validate'])) {
    $email = addslashes($_POST['email']);
    $pass = addslashes($_POST['password']);
    $data = $signin->Search($email);
    if ($data[9] == $pass) {
        $_SESSION['enrollment'] = $data[6];
        header('location:home');
    } else {
        echo "Email and Password is Wrong";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp Administration</title>
    <link rel="icon" href="private/images/fav.png">
    <link rel="stylesheet" href="../style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Geologica:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
</head>

<body style="font-family: 'Geologica', sans-serif;" class="bg-gray-200">
    <div class="flex justify-center mt-28">
        <div class="bg-gray-100 w-fit rounded-xl shadow-lg py-5 px-14">
            <div class="w-full flex justify-center"><img src="private/images/logo.png" alt="" class="w-36 mt-3"></div>
            <div class="grid grid-cols-1 py-4 gap-x-10">
                <form action="" method="post">
                <div class="flex flex-col w-80">
                    <label for="" class="text-lg">Email</label>
                    <input type="email" name="email" placeholder="Enter Your Email" class="h-12 rounded-lg text-lg pl-2 focus:ring-2 focus:outline-none outline-none focus:ring-offset-2 focus:ring-indigo-600">
                </div>
                <div class="flex flex-col w-80 mt-4">
                    <label for="" class="text-lg">Password</label>
                    <input type="password" name="password" placeholder="Enter Your Password" class="h-12 rounded-lg text-lg pl-2 focus:ring-2 focus:outline-none outline-none focus:ring-offset-2 focus:ring-indigo-600 w-full">
                </div>
                <div class="flex justify-center mt-5">
                    <button name="validate" class="bg-indigo-600 text-white text-lg font-medium w-full rounded-lg px-5 py-2 focus:ring-2 focus:ring-offset-2 focus:ring-indigo-800">Login</button>
                </div>
                <div class="flex justify-center mt-4">
                    <p class="text-lg text-gray-500">Don't have an account? <a href="signup" class="text-indigo-600">Sign Up</a></p>
                </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>