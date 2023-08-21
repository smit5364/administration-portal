<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forget Password</title>
    <link rel="icon" href="private/images/BMCCA_logo.png">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Geologica:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <style>
        .enrollment::-webkit-outer-spin-button,
        .enrollment::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>
</head>

<body style="font-family: 'Geologica', sans-serif;" class="bg-gray-200">
    <div class="flex items-center justify-center h-[100vh] w-full overflow-hidden">
        <div class="bg-gray-100 w-fit rounded-xl shadow-lg py-5 px-6 mx-4 sm:px-10">
            <div class="w-full flex flex-col justify-center items-center">
                <img src="private/images/BMCCA_logo.png" alt="" class="w-32 sm:w-36 mt-3">
            </div>
            <div class="grid grid-cols-1 py-4 gap-x-10">
                    <div class="flex flex-col w-auto sm:w-[350px]">
                        <label for="" class="text-lg mb-1 sm:text-xl sm:mb-2">Enrollment Number</label>
                        <input type="number" name="enrollment" id="enrollment" placeholder="Enter Your Enrollment" class="enrollment h-12 sm:h-14 rounded-lg text-lg sm:text-xl pl-2 focus:ring-2 focus:outline-none outline-none focus:ring-offset-2 focus:ring-indigo-600">
                    </div>
                    <div class="flex justify-center mt-5">
                        <button name="validate" class="bg-indigo-600 text-white text-lg font-medium w-full sm:text-xl rounded-lg px-5 py-2 focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600 hover:bg-indigo-500" onclick="send_mail_of_password()">Forget Password</button>
                    </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        function send_mail_of_password(){
            const enrollment = document.getElementById('enrollment').value;
            console.log(enrollment);
            if(enrollment != "" || enrollment != null){
                jQuery.ajax({
                url: 'private/signin_server.php',
                type: 'POST',
                data: '&enrollment=' + enrollment,
                success: function(response){
                    swal({
                        title: "Send Password on Registered Email",
                        icon: "success",
                        buttons: true,
                        dangerMode: true,
                    }).then((success) => {
                        if(success){
                            window.open("https://mail.google.com","_blank");
                        }else{
                            window.location.href = "http://localhost/administration-portal/Student_side/signin";
                        }
                    })
                }
            });
            }
        }
    </script>
</body>
</html>