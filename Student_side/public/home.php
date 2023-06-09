<!DOCTYPE html>

<?php

session_start();
if (isset($_POST["enroll_text"])) {
    $_SESSION['enroll'] = $_POST["enroll_text"];
}
if (isset($_SESSION['enroll'])) {
    $enroll = $_SESSION['enroll'];
} else {
    // echo "No enrollment number found in session.";
}
?>

<html lang="en">



<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration</title>
    <link rel="icon" href="public/images/fav.png">
    <link rel="stylesheet" href="../style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Geologica:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
</head>

<body class="bg-gray-200">
    <div class="overflow-hidden">
        <nav class="bg-white py-2 flex justify-center shadow-lg">
            <ul>
                <li><img src="public/images/logo.png" alt="bmu" class="w-32"></li>
            </ul>
        </nav>
        <div class="relative">
            <div class="bg-[#000]">
                <img src="public/images/img3.jpeg" alt="bmu" class="w-full h-[30rem] opacity-40 bg-cover">
            </div>
            <div class="flex justify-center">
                <h1 class="absolute text-white top-[10rem] text-[5rem] font-serif animate__animated animate__zoomIn"
                    style="font-family: 'Geologica', sans-serif;">Bhagwan Mahavir University</h1>
            </div>
        </div>
        <div class="absolute w-full px-28 top-[29rem]">
            <div class="flex justify-between" style="font-family: 'Geologica', sans-serif;">
                <div class="getEnroll cursor-pointer" data-certificate-url="bonafide">
                    <div class="bg-white flex items-center w-[22rem] h-48 rounded-xl shadow-lg">
                        <p class="text-4xl font-medium text-center px-6">Bonafide Certificate</p>
                    </div>
                </div>
                <div class="getEnroll cursor-pointer" data-certificate-url="bonafide2">
                    <div class="bg-white flex items-center w-[22rem] h-48 rounded-xl shadow-lg">
                        <p class="text-4xl font-medium text-center px-6">2 Certificate</p>
                    </div>
                </div>
                <div class="getEnroll cursor-pointer" data-certificate-url="bonafide3">
                    <div class="bg-white flex items-center w-[22rem] h-48 rounded-xl shadow-lg">
                        <p class="text-4xl font-medium text-center px-6">3 Certificate</p>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <dialog class="bg-white p-8 rounded shadow-lg" data-modal id="formContainer" form="myForm">
        <form method="post" id="myForm">
            <h2 class="text-2xl font-medium mb-4">Enter Enrollment Number</h2>
            <input name="enroll_text" id="enrollmentInput" type="number" value="<?php if (isset($_SESSION["enroll"])) {
                echo $_SESSION["enroll"];
            } ?>" class="w-full px-4 py-2 border border-gray-300 rounded mb-4">


            <button type="button" formmethod="dialog" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded"
                onclick="closeForm()">Cancel</button>
            <button type="button" onclick="submitForm()"
                class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">Submit</button>

        </form>
    </dialog>




    <script>
        const openButtons = document.getElementsByClassName("getEnroll");
        const form = document.querySelector("[data-modal]");
        let certificateUrl;

        for (let i = 0; i < openButtons.length; i++) {
            openButtons[i].addEventListener("click", (event) => {
                form.showModal();
                certificateUrl = openButtons[i].dataset.certificateUrl;
            });
        }

        function closeForm() {
            var form = document.querySelector("[data-modal]");
            form.close();
        }

        function submitForm() {
            var form = document.querySelector("[data-modal] form");
            form.action = certificateUrl;
            form.submit();
        }


        form.addEventListener("click", (e) => {
            const dialogDimensions = form.getBoundingClientRect();
            if (
                e.clientX < dialogDimensions.left ||
                e.clientX > dialogDimensions.right ||
                e.clientY < dialogDimensions.top ||
                e.clientY > dialogDimensions.bottom
            ) {
                form.close();
            }
        });
    </script>
    </script>


</body>

</html>