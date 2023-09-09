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
    <link rel="icon" href="private/images/BMCCA_logo.png">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Geologica:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <style>
        @keyframes menuOption {
            from {
                top: 9rem;
                right: 0px;
            }

            to {
                top: 3.5rem;
                right: 0px;
            }
        }

        @keyframes reverseOption {
            from {
                top: 3.5rem;
                right: 0px;
            }

            to {
                top: 9rem;
                right: 0px;
            }
        }

        .menuOption {
            animation: menuOption 0.3s linear 0s none alternate;
            animation-fill-mode: forwards;
        }

        .reverseOption {
            animation: reverseOption 0.3s linear 0s none alternate;
            animation-fill-mode: forwards;
        }

        ::-webkit-scrollbar {
            display: none;
        }
    </style>
</head>

<body class="bg-gray-200" style="font-family: 'Geologica', sans-serif; -webkit-tap-highlight-color: transparent;">
    <div class="navbar">
        <nav class="bg-white w-full h-14">
            <ul class="flex items-center justify-between pt-1">
                <li><a href="home" class="flex"><img src="private/images/BMCCA_logo.png" alt="" class="object-cover w-12 mx-1"><img src="private/images/Bhagwan Mahavir College of Computer Application.svg" alt="" class="md:ml-2"></a></li>
                <li id="btn_student"><?php if (!isset($_SESSION['enrollment'])) { ?>
                        <img src="private/images/user.svg" alt="" class="w-12 mx-1 cursor-pointer" />
                    <?php } else { ?>
                        <img src="private/letters_images/d.svg" alt="" class="w-12 mx-1 cursor-pointer">
                    <?php } ?>
                </li>
            </ul>
        </nav>
    </div>
    <div id="hero_section">
        <div class="relative">
            <div class="bg-[#000]">
                <img src="private/images/img3.jpeg" alt="bmu" class="w-full h-[90vh] opacity-40 object-cover">
            </div>
        </div>
        <div class="text_section flex items-center justify-center">
            <div class="absolute top-32 md:top-96 lg:top-40 xl:top-56 flex flex-col items-center text-center ">
                <p class="text-white text-5xl md:text-6xl lg:text-[4rem] xl:text-[5rem] px-3 animate__animated animate__zoomIn animate__faster">Bhagwan Mahavir University</p>
                <div class="bg-white w-[80%] lg:w-[100%] h-2 mt-5 rounded-full animate__animated animate__zoomIn animate__fast"></div>
                <button class="bg-white my-7 px-4 py-2 md:px-6 md:py-4 text-xl md:text-2xl lg:text-xl lg:px-4 lg:py-2 font-medium rounded-full animate__animated animate__zoomIn animate__fast hover:border-2 hover:border-white hover:bg-transparent hover:text-white">Check Status</button>
                <lottie-player src="private/images/lottie.json" background="transparent" speed="1" loop autoplay direction="1" mode="normal" class="pb-4 animate__animated animate__zoomIn animate__fast w-[100px] h-[100px] md:w-[130px] md:h-[130px] lg:w-[100px] lg:h-[100px] lg:mt-12"></lottie-player>
            </div>
        </div>
        <input type="hidden" name="flag" value="0" id="flag">
        <div class="absolute bg-gray-100 w-fit h-fit flex justify-end top-36 rounded-xl hidden drop-shadow-sm" id="student_menu">
            <?php if (!isset($_SESSION['enrollment'])) { ?>
                <a href="signin">
                    <div class="flex justify-center px-3 py-2 md:px-6 md:py-4 lg:px-5 lg:py-3">
                        <img src="private/images/login.svg" alt="" class="w-5 md:w-8 mr-2 lg:w-6">
                        <p class="text-lg text-gray-800 md:text-2xl lg:text-lg">Login</p>
                    </div>
                </a>
            <?php }else{ ?>
                <a href="signout">
                    <div class="flex justify-center px-3 py-2 md:px-6 md:py-4 lg:px-5 lg:py-3">
                        <img src="private/images/power.svg" alt="" class="w-5 md:w-8 mr-2 lg:w-6">
                        <p class="text-lg text-gray-800 md:text-2xl lg:text-lg">Logout</p>
                    </div>
                </a>    
            <?php } ?>
        </div>
    </div>
    <div class="main bg-[#F7F8FC]">
        <div class="flex flex-col justify-center px-5 py-10 md:px-10 md:py-16 lg:grid lg:grid-cols-2 lg:gap-x-16 lg:py-14 lg:gap-y-16 xl:grid-cols-3">
            <!-- card 1 -->
            <div class=" transition-all duration-300 ease-in-out hover:scale-105 hover:shadow-2xl rounded-xl">
                <div class="document lg:p-3 xl:p-0 bg-white shadow-xl rounded-xl border-b-[10px] border-indigo-300" data-aos="zoom-in-up">
                    <img src="private/images/docuements_png.png" alt="" class="bg-indigo-300 rounded-t-xl lg:object-cover w-full h-[224px] sm:h-[390px] md:h-[458.66px] lg:h-[301.33px]">
                    <div class="grid grid-flow-col grid-cols-2">
                        <p class="text-xl md:text-3xl lg:text-2xl lg:p-4 font-medium p-3 md:p-6 col-span-1">Request For <br> Documents</p>
                        <a href="document" class="col-span-2 flex justify-end items-end pr-4 pb-4"><button class="bg-black flex flex-row items-center rounded-full h-fit w-fit text-white px-3 py-2 text-lg md:text-xl md:px-5 md:py-4 lg:px-3 lg:py-2 lg:text-lg">Request<img src="private/images/link_arrow.svg" alt="" class="ml-2 md:h-6 lg:h-5"></button></a>
                    </div>
                </div>
            </div>

            <!-- card 2 -->
            <div class=" transition-all duration-300 ease-in-out hover:scale-105 hover:shadow-2xl rounded-xl">
                <div class="bonafide lg:p-3 xl:p-0 bg-white shadow-xl rounded-xl mt-10 lg:mt-0 border-b-[10px] border-blue-300" data-aos="zoom-in-up">
                    <img src="private/images/bonafide.svg" alt="" class="bg-blue-300 rounded-t-xl w-full h-[224px] md:h-[458.66px] lg:h-[301.33px]">
                    <div class="grid grid-flow-col grid-cols-2">
                        <p class="text-xl md:text-3xl font-medium p-3 md:p-6 col-span-1 lg:text-2xl lg:p-4">Bonafide <br>Certificate</p>
                        <a href="bonafide" class="col-span-2 flex justify-end items-end pr-4 pb-4"><button class="bg-black  flex flex-row items-center rounded-full h-fit w-fit text-white px-3 py-2 text-lg md:text-xl md:px-5 md:py-4 lg:text-lg lg:px-3 lg:py-2">Request<img src="private/images/link_arrow.svg" alt="" class="ml-2 md:h-6 lg:h-5"></button></a>
                    </div>
                </div>
            </div>

            <!-- card 3 -->
            <div class=" transition-all duration-300 ease-in-out hover:scale-105 hover:shadow-2xl rounded-xl">
            <div class="admission_cancel lg:p-3 xl:p-0 bg-white shadow-xl rounded-xl mt-10 lg:mt-0 border-b-[10px] border-red-400" data-aos="zoom-in-up">
                <img src="private/images/admission_cancel.svg" alt="" class="bg-red-400 rounded-t-xl w-full h-[224px] md:h-[458.66px] object-cover lg:h-[301.33px]">
                <div class="grid grid-flow-col grid-cols-2 lg:pb-5 xl:pb-0">
                    <p class="text-xl font-medium p-3 col-span-1 md:text-3xl md:p-6 lg:text-2xl lg:p-4">Admission<br>Cancel</p>
                    <a href="admission_cancel" class="col-span-2 flex justify-end items-end pr-4 pb-4"><button class="bg-black  flex flex-row items-center rounded-full h-fit w-fit text-white px-3 py-2 text-lg md:text-xl md:px-5 md:py-4 lg:text-lg lg:px-3 lg:py-2">Request<img src="private/images/link_arrow.svg" alt="" class="ml-2 md:h-6 lg:h-5"></button></a>
                </div>
            </div>
            </div>

            <!-- card 4 -->
            <div class=" transition-all duration-300 ease-in-out hover:scale-105 hover:shadow-2xl rounded-xl">
            <div class="tc_mig_pd lg:p-3 xl:p-0 bg-white shadow-xl rounded-xl mt-10 lg:mt-0 border-b-[10px] border-green-400" data-aos="zoom-in-up">
                <img src="private/images/tc_mg_pd.svg" alt="" class="bg-green-400 rounded-t-xl w-full h-[224px] object-cover md:h-[458.66px] lg:h-[301.33px]">
                <div class="grid grid-flow-col grid-rows-1">
                    <p class="text-xl font-medium pl-3 pt-3 rows-span-1 md:text-3xl md:pl-6 md:pt-6 lg:text-2xl lg:pl-4 lg:pt-4">Transfer Cerificate,</p>
                </div>
                <div class="grid grid-flow-col grid-col-2 pb-3 lg:pb-1 2xl:pb-10">
                    <p class="text-xl font-medium pl-3 md:text-3xl md:pl-6 col-span-1 lg:text-2xl lg:pl-4">Provisional Degree</p>
                    <a href="external_study" class="col-span-2 flex justify-end items-end pr-4 pb-4"><button class="bg-black  flex flex-row items-center rounded-full h-fit w-fit text-white px-3 py-2 text-lg md:text-xl md:px-5 md:py-4 lg:text-lg lg:px-3 lg:py-2">Request<img src="private/images/link_arrow.svg" alt="" class="ml-2 md:h-6 lg:h-5"></button></a>
                </div>
            </div>
            </div>

            <!-- card 5 -->
            <div class=" transition-all duration-300 ease-in-out hover:scale-105 hover:shadow-2xl rounded-xl">
            <div class="abroad_study lg:p-3 xl:p-0 bg-white shadow-xl rounded-xl mt-10  lg:mt-0 border-b-[10px] border-orange-400" data-aos="zoom-in-up">
                <img src="private/images/abroad_Study.svg" alt="" class="bg-orange-400 rounded-t-xl w-full h-[224px] object-cover md:h-[458.66px] lg:h-[301.33px]">
                <div class="grid grid-flow-col grid-rows-1">
                    <p class="text-xl font-medium pl-3 pt-3 rows-span-1 md:text-3xl md:pl-6 md:pt-6 lg:text-2xl lg:pl-4 lg:pt-4">Abroad Study</p>
                </div>
                <div class="grid grid-flow-col grid-col-2 pb-3 lg:pb-0 xl:pb-9">
                    <p class="text-xl font-medium pl-3 col-span-1 md:text-3xl md:pl-6 lg:text-2xl lg:pl-4">(Transcript, MOI, <br class="hidden lg:block"> LOR)</p>
                    <a href="abroad_study" class="col-span-2 flex justify-end items-end pr-4 pb-4"><button class="bg-black  flex flex-row items-center rounded-full h-fit w-fit text-white px-3 py-2 text-lg md:text-xl md:px-5 md:py-4 lg:text-lg lg:px-3 lg:py-2">Request<img src="private/images/link_arrow.svg" alt="" class="ml-2 md:h-6 lg:h-5"></button></a>
                </div>
            </div>
            </div>

            <!-- card 6 -->
            <div class=" transition-all duration-300 ease-in-out hover:scale-105 hover:shadow-2xl rounded-xl">
            <div class="classroom lg:p-3 xl:p-0 bg-white shadow-xl rounded-xl mt-10 lg:mt-0 border-b-[10px] border-teal-400" data-aos="zoom-in-up">
                <img src="private/images/my_class.svg" alt="" class="bg-teal-400 rounded-t-xl w-full h-[224px] object-cover md:h-[458.66px] lg:h-[301.33px]">
                <div class="grid grid-flow-col grid-cols-2 lg:pb-4 xl:pb-[3.25rem]">
                    <p class="text-xl font-medium p-3 col-span-1 md:text-3xl md:p-6 lg:text-2xl lg:p-4">Find My <br class="hidden md:block"> Classroom</p>
                    <a href="document" class="col-span-2 flex justify-end items-end pr-4 pb-4"><button class="bg-black  flex flex-row items-center rounded-full h-fit w-fit text-white px-3 py-2 text-lg md:text-xl md:px-5 md:py-4 lg:text-lg lg:px-3 lg:py-2">Find<img src="private/images/link_arrow.svg" alt="" class="ml-2 md:h-6 lg:h-5"></button></a>
                </div>
            </div>
            </div>

            <!-- card 7 -->
            <div class=" transition-all duration-300 ease-in-out hover:scale-105 hover:shadow-2xl rounded-xl">
            <div class="hall_ticket lg:p-3 xl:p-0 bg-white shadow-xl rounded-xl mt-10 lg:mt-0 border-b-[10px] border-yellow-300" data-aos="zoom-in-up">
                <img src="private/images/hall_ticket.svg" alt="" class="bg-yellow-300 rounded-t-xl w-full h-[224px] object-cover md:h-[458.66px] lg:h-[301.33px]">
                <div class="grid grid-flow-col grid-cols-2">
                    <p class="text-xl font-medium p-3 col-span-1 md:text-3xl md:p-6 lg:text-2xl lg:p-4">Find My <br> Hall Ticket</p>
                    <a href="document" class="col-span-2 flex justify-end items-end pr-4 pb-4"><button class="bg-black  flex flex-row items-center rounded-full h-fit w-fit text-white px-3 py-2 text-lg md:text-xl md:px-5 md:py-4 lg:text-lg lg:px-3 lg:py-2">Find<img src="private/images/link_arrow.svg" alt="" class="ml-2 md:h-6 lg:h-5"></button></a>
                </div>
            </div>
            </div>

            <!-- card 8 -->
            <div class=" transition-all duration-300 ease-in-out hover:scale-105 hover:shadow-2xl rounded-xl">
            <div class="exam_block lg:p-3 xl:p-0 bg-white shadow-xl rounded-xl mt-10 lg:mt-0 border-b-[10px] border-gray-400" data-aos="zoom-in-up">
                <img src="private/images/exam_hall.svg" alt="" class="bg-gray-400 rounded-t-xl w-full h-[224px] md:h-[458.66px] lg:h-[301.33px]">
                <div class="grid grid-flow-col grid-cols-2">
                    <p class="text-xl font-medium p-3 col-span-1 md:text-3xl md:p-6 lg:text-2xl lg:p-4">Find My <br>Exam Hall</p>
                    <a href="document" class="col-span-2 flex justify-end items-end pr-4 pb-4"><button class="bg-black  flex flex-row items-center rounded-full h-fit w-fit text-white px-3 py-2 text-lg md:text-xl md:px-5 md:py-4 lg:text-xl lg:px-3 lg:py-2">Find<img src="private/images/link_arrow.svg" alt="" class="ml-2 md:h-6 lg:h-5"></button></a>
                </div>
            </div>
            </div>

            <!-- card 9 -->
            <div class=" transition-all duration-300 ease-in-out hover:scale-105 hover:shadow-2xl rounded-xl">
            <div class="timetable lg:p-3 xl:p-0 bg-white shadow-xl rounded-xl mt-10 lg:mt-0 border-b-[10px] border-purple-300" data-aos="zoom-in-up">
                <img src="private/images/timetable.svg" alt="" class="bg-purple-300 rounded-t-xl w-full h-[224px] object-cover object-center md:object-none md:h-[458.66px] lg:h-[301.33px]">
                <div class="grid grid-flow-col grid-cols-2">
                    <p class="text-xl font-medium p-3 col-span-1 md:text-3xl md:p-6 lg:text-2xl lg:p-4">Find My <br>Time Table</p>
                    <a href="document" class="col-span-2 flex justify-end items-end pr-4 pb-4"><button class="bg-black  flex flex-row items-center rounded-full h-fit w-fit text-white px-3 py-2 text-lg md:text-xl md:px-5 md:py-4 lg:text-lg lg:px-3 lg:py-2">Find<img src="private/images/link_arrow.svg" alt="" class="ml-2 md:h-6 lg:h-5"></button></a>
                </div>
            </div>
            </div>

            <!-- card 10 -->
            <div class=" transition-all duration-300 ease-in-out hover:scale-105 hover:shadow-2xl rounded-xl">
            <div class="id_card lg:p-3 xl:p-0 bg-white shadow-xl rounded-xl mt-10 lg:mt-0 border-b-[10px] border-orange-500" data-aos="zoom-in-up">
                <img src="private/images/ID_Card.svg" alt="" class="bg-orange-500 rounded-t-xl w-full h-[224px] object-cover object-top md:object-cover md:h-[458.66px] lg:h-[301.33px]">
                <div class="grid grid-flow-col grid-cols-2 xl:pb-7">
                    <p class="text-xl font-medium p-3 col-span-1 md:text-3xl md:p-6 lg:text-2xl lg:p-4">Request For<br>ID Card</p>
                    <a href="document" class="col-span-2 flex justify-end items-end pr-4 pb-4"><button class="bg-black  flex flex-row items-center rounded-full h-fit w-fit text-white px-3 py-2 text-lg md:text-xl md:px-5 md:py-4 lg:text-lg lg:px-3 lg:py-2">Request<img src="private/images/link_arrow.svg" alt="" class="ml-2 md:h-6 lg:h-5"></button></a>
                </div>
            </div>
            </div>

            <!-- card 11 -->
            <div class=" transition-all duration-300 ease-in-out hover:scale-105 hover:shadow-2xl rounded-xl">
            <div class="uniform lg:p-3 xl:p-0 bg-white shadow-xl rounded-xl mt-10 lg:mt-0 border-b-[10px] border-[#FFD684]" data-aos="zoom-in-up">
                <img src="private/images/uniform.svg" alt="" class="bg-[#FFD684] rounded-t-xl w-full h-[224px] object-cover object-top md:h-[458.66px] lg:h-[301.33px]">
                <div class="grid grid-flow-col grid-cols-2 lg:pb-7">
                    <p class="text-xl font-medium p-3 col-span-1 md:text-3xl md:p-6 lg:text-2xl lg:p-4">Request For<br>Uniform</p>
                    <a href="document" class="col-span-2 flex justify-end items-end pr-4 pb-4"><button class="bg-black  flex flex-row items-center rounded-full h-fit w-fit text-white px-3 py-2 text-lg md:text-xl md:px-5 md:py-4 lg:text-lg lg:px-3 lg:py-2">Request<img src="private/images/link_arrow.svg" alt="" class="ml-2 md:h-6 lg:h-5"></button></a>
                </div>
            </div>
            </div>

            <!-- card 12 -->
            <div class=" transition-all duration-300 ease-in-out hover:scale-105 hover:shadow-2xl rounded-xl">
                <div class="add_in_group lg:p-3 xl:p-0 bg-white shadow-xl rounded-xl mt-10 lg:mt-0 border-b-[10px] border-cyan-300" data-aos="zoom-in-up">
                <img src="private/images/add_in_group.svg" alt="" class="bg-cyan-300 rounded-t-xl w-full h-[224px] object-cover md:h-[458.66px] lg:h-[301.33px]">
                <div class="grid grid-flow-col grid-rows-1">
                    <p class="text-xl font-medium pl-3 pt-3 rows-span-1 md:text-3xl md:pl-6 md:pt-6 lg:text-2xl lg:pl-4 lg:pt-4">Request For Change</p>
                </div>
                <div class="grid grid-flow-col grid-col-2 pb-3">
                    <p class="text-xl font-medium pl-3 col-span-1 md:text-3xl md:pl-6 lg:pl-4 lg:text-2xl">Contact No,<br class="hidden lg:block"> Add in group</p>
                    <a href="bonafide" class="col-span-2 flex justify-end items-end pr-4 pb-4"><button class="bg-black  flex flex-row items-center rounded-full h-fit w-fit text-white px-3 py-2 text-lg md:text-xl md:px-5 md:py-4 lg:text-lg lg:px-3 lg:py-2">Request<img src="private/images/link_arrow.svg" alt="" class="ml-2 md:h-6 lg:h-5"></button></a>
                </div>
            </div>
            </div>
        </div>
    </div>
    <footer>
        <div class="bg-indigo-300 grid grid-rows-2 md:grid-rows-1 py-3 xl:py-6">
            <div class="flex flex-col justify-center">
                <p class="text-xl text-white font-semibold text-center md:text-3xl md:mt-3">Join Our <br> Social Media Community</p>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-4 md:mt-6">
                <div class="col-span-1 flex flex-col items-center justify-center">
                    <a href="https://www.facebook.com/BMCOCA" target="_blank"><img src="private/images/facebook.png" alt="" class="w-[90px] md:w-[110px]"></a>
                </div>
                <div class="col-span-1 flex flex-col items-center justify-center">
                    <a href="https://www.instagram.com/bmu.bmcca/" target="_blank"><img src="private/images/instagram.png" alt="" class="w-[80px] md:w-[100px]"></a>
                </div>
                <div class="col-span-1 hidden md:flex flex-col items-center justify-center">
                    <a href="https://www.linkedin.com/company/bmcoca/" target="_blank"><img src="private/images/linkedin.png" alt="" class="w-[80px] md:w-[100px]"></a>
                </div>
                <div class="col-span-1 hidden md:flex flex-col items-center justify-center">
                    <a href="https://twitter.com/bmcocasurat" target="_blank"><img src="private/images/twitter.png" alt="" class="w-[80px] md:w-[100px]"></a>
                </div>
            </div>
            <div class="grid grid-cols-2 pt-2 md:hidden">
                <div class="col-span-1 flex flex-col items-center justify-center">
                    <a href="https://www.linkedin.com/company/bmcoca/" target="_blank"><img src="private/images/linkedin.png" alt="" class="w-[80px]"></a>
                </div>
                <div class="col-span-1 flex flex-col items-center justify-center">
                    <a href="https://twitter.com/bmcocasurat" target="_blank"><img src="private/images/twitter.png" alt="" class="w-[80px]"></a>
                </div>
            </div>
        </div>
    </footer>
    <!-- <div class="overflow-hidden z-[99px]">
        <nav class="bg-white w-full py-2 flex justify-center shadow-lg">
            <ul class="flex justify-between">
                <li><a href="home"><img src="private/images/logo.png" alt="bmu" class="w-32"></a></li>
                <li>
                <?php
                if (!$_SESSION['enrollment']) {
                ?>
                    <a href="signin" class="ml-[1200px]"><button
                                class="bg-blue-800 text-white border-2 border-blue-800 rounded-lg hover:bg-transparent hover:text-blue-800 hover:border-2 hover:border-blue-800 px-4 py-2 text-lg font-medium">Login</button></a>
                    <?php
                } else {
                    ?>
                    <a href="signout" class="ml-[1100px]"><button
                                class="bg-blue-800 text-white border-2 border-blue-800 rounded-lg hover:bg-transparent hover:text-blue-800 hover:border-2 hover:border-blue-800 px-2 py-2 text-lg font-medium">Logout
                                <?php echo getnamebyenroll(); ?>
                            </button></a>
                    <?php
                }
                    ?>
                </li>
            </ul>
        </nav>
        <div class="relative">
            <div class="bg-[#000]">
                <img src="private/images/img3.jpeg" alt="bmu" class="w-full h-[30rem] opacity-40 bg-cover">
            </div>
            <div class="flex justify-center">
                <h1 class="absolute text-white top-[10rem] text-[5rem] font-serif animate__animated animate__zoomIn" style="font-family: 'Geologica', sans-serif;">Bhagwan Mahavir University</h1>
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
                    <a href="document">
                        <div class="bg-white flex items-center w-[22rem] h-48 rounded-xl shadow-lg">
                            <p class="text-4xl font-medium text-center px-6 m-auto">Request For Document</p>
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
    </div> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();

        const btn_student = document.getElementById('btn_student');
        const student_menu = document.getElementById('student_menu');
        const hero_section = document.getElementById('hero_section');

        btn_student.addEventListener('click', () => {
            const flag = document.getElementById('flag').value;
            if (flag == 0) {
                // student_menu.style.animation = "menuOption 0.3s linear 0s none alternate";
                // student_menu.style.animationFillMode = "forwards";
                student_menu.classList.remove('reverseOption');
                student_menu.classList.add('menuOption');
                $(student_menu).fadeIn();
                $('#flag').val("1");
            } else {
                student_menu.classList.remove('menuOption');
                student_menu.classList.add('reverseOption');
                $(student_menu).fadeOut();
                $('#flag').val("0");
            }
        });

        hero_section.addEventListener('click', () => {
            const flag = document.getElementById('flag').value;
            if (flag == 1) {
                student_menu.classList.remove('menuOption');
                student_menu.classList.add('reverseOption');
                $(student_menu).fadeOut();
                $('#flag').val("0");
            }
        })
    </script>


</body>

</html>