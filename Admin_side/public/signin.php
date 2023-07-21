<?php
error_reporting(0);
session_start();
include('private/signin_server.php');
$signin = new Signin;
if(isset($_POST['validate'])){
  $type = addslashes($_POST['type']);
  $email = addslashes($_POST['email']);
  $pass = addslashes($_POST['password']);
  $data = $signin->Search($email);
  if($data[1] == $pass && $data[2] == $type){
    $_SESSION['name'] = $data[0];
    $_SESSION['type'] = $data[2];
    header('location:bonafide');
  }else{
    $_SESSION['status_code'] = "error";
    $_SESSION['title'] = "Invalid Email,Password or Profession!";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" type="image/png" href="private/Images/BMCCA_logo.png" />
  <title>Sign in of Administration</title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Nucleo Icons -->
  <link href="private/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="private/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Main Styling -->
  <link rel="stylesheet" href="input.css">
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="m-0 font-sans antialiased font-normal bg-white text-start text-base leading-default text-slate-500">
  <main class="mt-0 transition-all duration-200 ease-in-out">
    <section>
      <div class="relative flex items-center justify-center min-h-screen p-0 overflow-hidden bg-center bg-cover">
        <div class="container z-1">
          <div class="flex flex-wrap xl:ml-28 w-full">
            <div class="flex flex-col w-full max-w-full px-4 lg:px-16 xl:px-10 mx-auto lg:mx-0 shrink-0 md:flex-0 md:w-4/5 lg:w-2/4 xl:w-4/12">
              <div class="relative flex flex-col justify-center min-w-0 break-words bg-transparent border-0 shadow-none lg:py-4 rounded-2xl bg-clip-border pr-3 lg:pr-0">
                <div class="p-6 pb-0 mb-0">
                  <h4 class="font-bold text-2xl xl:text-2xl mb-2 md:text-5xl text-gray-700 lg:text-3xl">Sign In</h4>
                  <p class="mb-0 xl:text-lg text-lg text-gray-500 md:text-3xl lg:text-xl">Enter your email and password to sign in</p>
                </div>
                <div class="flex-auto p-6">
                  <form role="form" method="post">
                    <select name="type" id="type" class="mb-4 h-10 w-28 xl:h-10 md:h-16 md:w-28 xl:w-24 outline-none ring-1 ring-inset shadow-sm ring-gray-300 text-lg md:text-2xl xl:text-lg rounded-md pr-5 pl-2 md:pl-3 xl:pl-2 text-gray-800 focus:ring-indigo-600 focus:ring-2 focus:ring-inset lg:h-12 lg:w-24 lg:text-xl">
                      <option value="Head">Head</option>
                      <option value="Clerk">Clerk</option>
                    </select>
                    <div class="mb-4">
                      <input type="email" name="email" id="name" class="block w-full rounded-lg border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-500 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-md sm:leading-6 outline-none pl-3 h-12 md:h-20 md:text-[27px] xl:h-12 xl:text-lg lg:h-14 lg:text-lg" placeholder="Email">
                    </div>
                    <div class="mb-4">
                      <input type="password" name="password" id="password" class="block w-full rounded-lg border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-500 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-md sm:leading-6 outline-none pl-3 h-12 md:h-20 md:text-[27px] xl:h-12 xl:text-lg lg:h-14 lg:text-lg" placeholder="Password">
                    </div>
                    <div class="text-center">
                      <button type="submit" name="validate" id="validate" class="rounded-md w-full h-12 mt-2 bg-indigo-600 px-3 py-2 text-md font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 md:h-16 md:text-[27px] xl:h-12 xl:text-lg lg:h-14 lg:text-xl">Sign in</button>
                    </div>
                  </form>
                </div>
                <div class="border-black/12.5 rounded-b-2xl border-t-0 border-solid p-6 text-center pt-0 px-1 sm:px-6">
                  <p class="mx-auto mb-6 leading-normal text-base text-gray-500 xl:text-lg md:text-[26px] lg:text-lg">Don't have an account? <a href="signup" class="font-semibold bg-clip-text text-indigo-600">Sign up</a></p>
                </div>
              </div>
            </div>
            <div class="absolute top-0 right-0 flex-col justify-center hidden w-6/12 h-full max-w-full px-3 pr-0 my-auto text-center flex-0 lg:flex">
              <div class="relative flex flex-col justify-center h-full bg-cover bg-center px-24 m-4 overflow-hidden bg-[url('https://images.static-collegedunia.com/public/college_data/images/appImage/160057955579000021132600064826526103121103920037888o.jpg?tr=c-force')] rounded-xl">
                <span class="absolute top-0 left-0 w-full h-full bg-center bg-cover bg-gradient-to-tl from-blue-500 to-violet-500 opacity-60"></span>
                <!-- <h4 class="z-20 mt-12 font-bold text-white">"Attention is the new currency"</h4>
                  <p class="z-20 text-white ">The more effortless the writing looks, the more effort the writer actually put into the process.</p> -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <?php include('private/sweet_alert.php');?>
</body>

</html>