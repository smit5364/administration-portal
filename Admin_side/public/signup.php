<?php
// if(isset($_POST['insert'])){
//   $name = addslashes($_POST['name']);
//   $email = addslashes($_POST['email']);
//   $type = addslashes($_POST['type']);
//   $password = addslashes($_POST['password']);
//   $signup->insert($password,$name,$email,$type);
//   header('location:signin');
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" type="image/png" href="private/assets/img/fav.png" />
  <title>Admin Side Administration</title>
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

<body class="m-0 font-sans antialiased font-normal bg-gray-100 text-start text-base leading-default text-slate-500">
  <main class="mt-0 transition-all duration-200 ease-in-out" style="background-color: whitesmoke;">
    <section style="min-height: 97vh;">
      <div class="bg-top relative flex items-start pt-12 pb-56 m-4 overflow-hidden bg-cover min-h-50-screen rounded-xl bg-[url('https://images.static-collegedunia.com/public/college_data/images/appImage/160057955579000021132600064826526103121103920037888o.jpg?tr=h-150,w-320,c-force')]">
        <span class="absolute top-0 left-0 w-full h-full bg-center bg-cover bg-gradient-to-tl from-zinc-800 to-zinc-700 opacity-60"></span>
        <div class="container z-10">
          <div class="flex flex-wrap justify-center -mx-3">
            <div class="w-full max-w-full px-3 mx-auto mt-0 text-center lg:flex-0 shrink-0 lg:w-5/12">
              <h1 class="mt-12 mb-2 text-white text-6xl font-medium">Welcome to BMU!</h1>
              <p class="text-white text-xl">Use these awesome forms to login or create new account in your project for free.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="flex flex-wrap -mx-3 -mt-48 md:-mt-56 lg:-mt-48">
          <div class="w-full max-w-full px-3 mx-auto mt-0 md:flex-0 shrink-0 md:w-7/12 lg:w-5/12 xl:w-4/12">
            <div class="relative z-0 flex flex-col min-w-0 break-words bg-white border-0 shadow-xl rounded-2xl bg-clip-border">
              <div class="p-6 mb-0 text-center text-gray-800 text-lg font-medium bg-white border-b-0 rounded-t-2xl">
                <h5>Register with</h5>
              </div>
              <div class="flex-auto px-6 pb-6">
                <form role="form text-left" method="post" id="form">
                  <div class="mb-4">
                    <input type="text" name="name" id="name" class="block w-full rounded-lg border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-500 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 outline-none pl-3 h-10" placeholder="Name">
                  </div>
                  <div class="mb-4">
                    <input type="email" name="email" id="email" class="block w-full rounded-lg border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-500 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 outline-none pl-3 h-10" placeholder="Email">
                  </div>
                  <div role="radiogroup" class="mb-4 flex items-center">
                    <input name="type" id="radio1" type="radio" class="h-4 w-4  focus:bg-indigo-600 border-gray-300 text-indigo-600 focus:text-indigo-600 focus:ring-2 focus:ring-indigo-600 ml-2" value="Head">
                    <label for="Head" class="block text-sm font-medium leading-6 text-gray-500 pl-2">Head</label>
                    <input name="type" id="radio2" type="radio" class="h-4 w-4  focus:bg-indigo-600 border-gray-300 text-indigo-600 focus:text-indigo-600 focus:ring-2 focus:ring-indigo-600 ml-8" value="Clerk">
                    <label for="Head" class="block text-sm font-medium leading-6 text-gray-500 pl-2">Clerk</label>
                  </div>
                  <div class="mb-4">
                    <input type="password" name="password" id="password" class="block w-full rounded-lg border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-500 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 outline-none pl-3 h-10" placeholder="Password">
                  </div>
                  <div class="text-center">
                    <button type="submit" name="insert" id="insert" class="rounded-md w-full mt-2 bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign Up</button>
                  </div>
                  <p class="mt-4 mb-0 leading-normal text-sm text-center">Already have an account? <a href="signin" class="font-bold text-indigo-600">Sign in</a></p>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
  <script>
    const insert = document.getElementById('insert');
    const form = document.getElementById('form');
    insert.addEventListener('click', function(event) {
      event.preventDefault();
      var username = document.getElementById('name').value;
      var email = document.getElementById('email').value;
      var type = document.getElementsByName('type');
      var SelectedType;
      for (var i = 0; i < type.length; i++) {
        if (type[i].checked) {
          SelectedType = type[i].value;
          break;
        }
      }
      var password = document.getElementById('password').value;
      if(username != "" && email != "" && SelectedType != "" && password != ""){
      jQuery.ajax({
        url: 'private/signup_server.php',
        type: 'POST',
        data: "&name="+username+"&email="+email+"&type="+SelectedType+"&password="+password,
        success: function(){
          window.location.href = "signin";
        },
        error: function(error){
          console.log(error);
        }        
      });
    }
    });
  </script>
</body>
<!-- plugin for scrollbar  -->
<script src="private/assets/js/plugins/perfect-scrollbar.min.js" async></script>

</html>