<?php
include('private/home_server.php');
error_reporting(0);
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration</title>
    <link rel="icon" href="private/images/fav.png">
    <link rel="stylesheet" href="../style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Geologica:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css"   />
</head>

<body class="bg-gray-200">
    <div class="overflow-hidden">
        <nav class="bg-white py-2 flex justify-center shadow-lg">
            <ul class="flex justify-between">
                <li><a href="home"><img src="private/images/logo.png" alt="bmu" class="w-32"></a></li>
                <?php
                if (!$_SESSION['enrollment']) {
                    ?>
                    <li><a href="signin"><button
                                class="bg-blue-800 text-white border-2 border-blue-800 rounded-lg hover:bg-transparent hover:text-blue-800 hover:border-2 hover:border-blue-800 px-4 py-2 text-lg font-medium ml-[1200px]">Login</button></a>
                    </li>
                    <?php
                } else {
                    ?>
                    <li><a href="signout"><button
                                class="bg-blue-800 text-white border-2 border-blue-800 rounded-lg hover:bg-transparent hover:text-blue-800 hover:border-2 hover:border-blue-800 px-2 py-2 text-lg font-medium ml-[1100px]">Logout
                                <?php echo getnamebyenroll(); ?>
                            </button></a></li>
                    <?php
                }
                ?>
            </ul>
        </nav>
        <div class="relative">
            <div class="bg-[#000]">
                <img src="private/images/img3.jpeg" alt="bmu" class="w-full h-[30rem] opacity-40 bg-cover">
            </div>
            <div class="flex justify-center">
                <h1 class="absolute text-white top-[10rem] text-[5rem] font-serif animate__animated animate__zoomIn"
                    style="font-family: 'Geologica', sans-serif;">Bhagwan Mahavir University</h1>
            </div>
        </div>
        <div class="absolute w-full px-28 top-[29rem]">
            <div class="flex justify-between" style="font-family: 'Geologica', sans-serif;">
                <div class="getEnroll m-2 cursor-pointer" data-certificate-url="bonafide" data-aos="fade-right">
                    <a href="bonafide">
                        <div class="bg-white flex items-center w-[22rem] h-48 rounded-xl shadow-lg">
                            <p class="text-4xl font-medium text-center px-6 m-auto">Bonafide Certificate</p>
                        </div>
                    </a>
                </div>
                <div class="getEnroll  m-2 cursor-pointer" data-certificate-url="bonafide2" data-aos="fade-up">
                    <a href="hdf">
                        <div class="bg-white flex items-center w-[22rem] h-48 rounded-xl shadow-lg">
                            <p class="text-4xl font-medium text-center px-6 m-auto">2 Certificate</p>
                        </div>
                    </a>
                </div>
                <div class="getEnroll  m-2 cursor-pointer" data-certificate-url="bonafide3" data-aos="fade-left">
                    <div class="bg-white flex items-center w-[22rem] h-48 rounded-xl shadow-lg">
                        <p class="text-4xl font-medium text-center px-6 m-auto">Certificate</p>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>


</body>

</html>