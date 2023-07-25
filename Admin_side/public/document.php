<?php
// error_reporting(0);
include('private/document_server.php');
include('private/sidebar_pending_counting.php');
$document = new Document;
unset($_SESSION['id']);
if ($_SESSION['name'] == "") {
  header('location:signin');
}
if ($_SESSION['type'] == "Clerk" && isset($_GET['pickup_id'])) {
  $id = (int) $_GET['pickup_id'];
  $document->date_for_pickup($id);
  // header('Location: bonafide');
}

if (isset($_POST['remark']) && isset($_POST['id'])) {
  $remark_id = addslashes($_POST['id']);
  $remark = addslashes($_POST['remark']);
  $document->cancel_verify($remark_id, $remark);
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" type="image/png" href="private/Images/BMCCA_logo.png" />
  <title>Administration Admin side</title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Nucleo Icons -->
  <link href="private/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="private/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Popper -->
  <script src="https://unpkg.com/@popperjs/core@2"></script>
  <link rel="stylesheet" href="private/assets/css/tooltips.css">
  <!-- Main Styling -->
  <link rel="stylesheet" href="input.css">
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Data Tables -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css">
  <style>
    ::-webkit-scrollbar {
      display: none;
    }
  </style>
</head>

<body class="m-0 font-sans text-base antialiased font-normal bg-gray-50 text-slate-500 overflow-hidden">
  <div class="absolute w-full bg-indigo-600 min-h-[25%]"></div>
  <!-- sidenav  -->
  <section
    class="fixed inset-y-0 flex-wrap items-center justify-between w-1/5 p-0 my-4 overflow-y-auto antialiased transition-transform duration-200 -translate-x-full bg-white border-0 shadow-xl max-w-64 ease-in-out z-[990] xl:ml-6 rounded-2xl xl:left-0 xl:translate-x-0">
    <div class="h-19 pt-2">
      <i class="absolute top-0 right-0 p-4 opacity-50 cursor-pointer fas fa-times text-slate-400 xl:hidden"
        sidenav-close></i>
      <a href="dashboard" class="flex justify-center">
        <img src="private/assets/img/logo.png" alt="" width="140px">
      </a>
    </div>

    <hr class="h-px mt-1 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent" />

    <div class="items-center block w-auto max-h-screen overflow-auto basis-full">
      <ul class="flex flex-col pl-0 mb-0">
        <li class="mt-2 w-full">
          <a href="dashboard"
            class="bg-white text-lg my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 py-3 font-medium text-slate-700 transition-colors">
            <i class="ni ni-tv-2 text-indigo-600 mr-3"></i>
            Dashboard
          </a>
        </li>
        <?php if ($_SESSION['type'] == "Head") { ?>
          <li class="w-full">
            <a href="student"
              class="bg-white text-lg my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 py-3 font-medium text-slate-700 transition-colors">
              <i class="ni ni-tv-2 text-indigo-600 mr-3"></i>
              Student
              <div class="bg-indigo-600 ml-[7.5rem] text-white font-medium px-4 text-xl py-0 rounded-full">
                <?php echo pending_provide_authority(); ?>
              </div>
            </a>
          </li>
        <?php } ?>
        <li class="w-full">
          <a href="bonafide"
            class="text-lg my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 py-3 font-medium text-slate-700 transition-colors">
            <i class="ni ni-tv-2 text-indigo-600 mr-3"></i>
            Bonafide
            <div class="bg-indigo-600 ml-28 text-white font-medium px-4 text-xl py-0 rounded-full">
              <?php if ($_SESSION['type'] == "Head") {
                echo pending__bonafide_approval();
              } else {
                echo pending_bonafide_verify();
              } ?>
            </div>
          </a>
        </li>
        <li class="w-full">
          <a href="document"
            class="bg-indigo-200 text-lg my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 py-3 font-medium text-slate-700 transition-colors">
            <i class="ni ni-tv-2 text-indigo-600 mr-3"></i>
            Document
          </a>
        </li>
      </ul>
    </div>
  </section>
  <!-- end sidenav -->

  <main
    class="relative h-full max-h-screen transition-all duration-200 ease-in-out xl:ml-68 rounded-xl overflow-x-hidden scroll-smooth overflow-y-visible">
    <!-- Navbar -->
    <nav
      class="relative flex flex-wrap items-center justify-between px-0 pt-5 mx-6 transition-all ease-in shadow-none duration-250 rounded-2xl lg:flex-nowrap lg:justify-start"
      navbar-main navbar-scroll="false">
      <div class="flex w-full 2xl:px-4 py-1 mx-auto flex-wrap-inherit">
        <nav class="xl:pl-80">
          <!-- breadcrumb -->
          <ol class="flex flex-wrap pt-1 bg-transparent rounded-lg">
            <li class="text-sm leading-normal">
              <a class="text-white opacity-50 text-base" href="javascript:;">Pages</a>
            </li>
            <li
              class="text-base pl-2 capitalize leading-normal text-white before:float-left before:pr-2 before:text-white before:content-['/']"
              aria-current="page">Documents</li>
          </ol>
          <h6 class="mb-0 font-bold text-white capitalize text-lg">Documents</h6>
        </nav>

        <div class="flex items-center justify-end mt-2 grow sm:mt-0 sm:mr-6 md:mr-0 lg:flex lg:basis-auto">
          <div class="flex items-center md:ml-auto md:pr-4">
            <!-- <div class="relative flex flex-wrap items-stretch w-full transition-all rounded-lg ease">
                <span class="text-sm ease leading-5.6 absolute z-50 -ml-px flex h-full items-center whitespace-nowrap rounded-lg rounded-tr-none rounded-br-none border border-r-0 border-transparent bg-transparent py-2 px-2.5 text-center font-normal text-slate-500 transition-all">
                  <i class="fas fa-search"></i>
                </span>
                <input type="text" class="pl-9 text-sm focus:shadow-primary-outline ease w-1/100 leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 dark:bg-slate-850 dark:text-white bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none focus:transition-shadow" placeholder="Type here..." />
              </div> -->
          </div>
          <ul class="flex flex-row justify-end pl-0 mb-0 list-none md-max:w-full">
            <!-- online builder btn  -->
            <!-- <li class="flex items-center">
                <a class="inline-block px-8 py-2 mb-0 mr-4 text-xs font-bold text-center text-blue-500 uppercase align-middle transition-all ease-in bg-transparent border border-blue-500 border-solid rounded-lg shadow-none cursor-pointer leading-pro hover:-translate-y-px active:shadow-xs hover:border-blue-500 active:bg-blue-500 active:hover:text-blue-500 hover:text-blue-500 tracking-tight-rem hover:bg-transparent hover:opacity-75 hover:shadow-none active:text-white active:hover:bg-transparent" target="_blank" href="https://www.creative-tim.com/builder/soft-ui?ref=navbar-dashboard&amp;_ga=2.76518741.1192788655.1647724933-1242940210.1644448053">Online Builder</a>
              </li> -->
            <li class="flex items-center xl:mr-3">
              <?php
              if ($_SESSION['name'] == "") {
                ?>
                <a href="signin" class="block px-0 py-2 text-lg font-semibold text-white transition-all ease-nav-brand">
                  <i class="fa fa-user sm:mr-1"></i>
                  <span class="hidden sm:inline">Sign In</span>
                </a>
                <?php
              } else {
                ?>
                <a href="signout">
                  <i class="fa fa-user sm:mr-2 text-white font-semibold text-lg"></i>
                  <span class="hidden sm:inline text-white font-semibold text-lg">
                    <?php echo $_SESSION['name']; ?>
                  </span>
                </a>
                <?php
              }
              ?>
            </li>
            <li class="flex items-center pl-4 xl:hidden">
              <a href="javascript:;" class="block p-0 text-sm text-white transition-all ease-nav-brand" sidenav-trigger>
                <div class="w-4.5 overflow-hidden">
                  <div class="ease mb-0.75 relative block h-0.5 rounded-sm bg-white transition-all"></div>
                  <div class="ease mb-0.75 relative block h-0.5 rounded-sm bg-white transition-all"></div>
                  <div class="ease relative block h-0.5 rounded-sm bg-white transition-all">
                    </d>
                  </div>
              </a>
            </li>
            <!-- <li class="flex items-center px-4">
                <a href="javascript:;" class="p-0 text-sm text-white transition-all ease-nav-brand">
                  <i fixed-plugin-button-nav class="cursor-pointer fa fa-cog"></i>
                </a>
              </li> -->

            <!-- notifications -->

            <!-- <li class="relative flex items-center pr-2">
                <p class="hidden transform-dropdown-show"></p>
                <a href="javascript:;" class="block p-0 text-sm text-white transition-all ease-nav-brand" dropdown-trigger aria-expanded="false">
                  <i class="cursor-pointer fa fa-bell"></i>
                </a>

                <ul dropdown-menu class="text-sm transform-dropdown before:font-awesome before:leading-default before:duration-350 before:ease lg:shadow-3xl duration-250 min-w-44 before:sm:right-8 before:text-5.5 pointer-events-none absolute right-0 top-0 z-50 origin-top list-none rounded-lg border-0 border-solid border-transparent dark:shadow-dark-xl dark:bg-slate-850 bg-white bg-clip-padding px-2 py-4 text-left text-slate-500 opacity-0 transition-all before:absolute before:right-2 before:left-auto before:top-0 before:z-50 before:inline-block before:font-normal before:text-white before:antialiased before:transition-all before:content-['\f0d8'] sm:-mr-6 lg:absolute lg:right-0 lg:left-auto lg:mt-2 lg:block lg:cursor-pointer"> -->
            <!-- add show class on dropdown open js -->
            <!-- <li class="relative mb-2">
                    <a class="dark:hover:bg-slate-900 ease py-1.2 clear-both block w-full whitespace-nowrap rounded-lg bg-transparent px-4 duration-300 hover:bg-gray-200 hover:text-slate-700 lg:transition-colors" href="javascript:;">
                      <div class="flex py-1">
                        <div class="my-auto">
                          <img src="../assets/img/team-2.jpg" class="inline-flex items-center justify-center mr-4 text-sm text-white h-9 w-9 max-w-none rounded-xl" />
                        </div>
                        <div class="flex flex-col justify-center">
                          <h6 class="mb-1 text-sm font-normal leading-normal dark:text-white"><span class="font-semibold">New message</span> from Laur</h6>
                          <p class="mb-0 text-xs leading-tight text-slate-400 dark:text-white/80">
                            <i class="mr-1 fa fa-clock"></i>
                            13 minutes ago
                          </p>
                        </div>
                      </div>
                    </a>
                  </li>

                  <li class="relative mb-2">
                    <a class="dark:hover:bg-slate-900 ease py-1.2 clear-both block w-full whitespace-nowrap rounded-lg px-4 transition-colors duration-300 hover:bg-gray-200 hover:text-slate-700" href="javascript:;">
                      <div class="flex py-1">
                        <div class="my-auto">
                          <img src="../assets/img/small-logos/logo-spotify.svg" class="inline-flex items-center justify-center mr-4 text-sm text-white bg-gradient-to-tl from-zinc-800 to-zinc-700 dark:bg-gradient-to-tl dark:from-slate-750 dark:to-gray-850 h-9 w-9 max-w-none rounded-xl" />
                        </div>
                        <div class="flex flex-col justify-center">
                          <h6 class="mb-1 text-sm font-normal leading-normal dark:text-white"><span class="font-semibold">New album</span> by Travis Scott</h6>
                          <p class="mb-0 text-xs leading-tight text-slate-400 dark:text-white/80">
                            <i class="mr-1 fa fa-clock"></i>
                            1 day
                          </p>
                        </div>
                      </div>
                    </a>
                  </li>

                  <li class="relative">
                    <a class="dark:hover:bg-slate-900 ease py-1.2 clear-both block w-full whitespace-nowrap rounded-lg px-4 transition-colors duration-300 hover:bg-gray-200 hover:text-slate-700" href="javascript:;">
                      <div class="flex py-1">
                        <div class="inline-flex items-center justify-center my-auto mr-4 text-sm text-white transition-all duration-200 ease-nav-brand bg-gradient-to-tl from-slate-600 to-slate-300 h-9 w-9 rounded-xl">
                          <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <title>credit-card</title>
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                              <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                <g transform="translate(1716.000000, 291.000000)">
                                  <g transform="translate(453.000000, 454.000000)">
                                    <path class="color-background" d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z" opacity="0.593633743"></path>
                                    <path class="color-background" d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z"></path>
                                  </g>
                                </g>
                              </g>
                            </g>
                          </svg>
                        </div>
                        <div class="flex flex-col justify-center">
                          <h6 class="mb-1 text-sm font-normal leading-normal dark:text-white">Payment successfully completed</h6>
                          <p class="mb-0 text-xs leading-tight text-slate-400 dark:text-white/80">
                            <i class="mr-1 fa fa-clock"></i>
                            2 days
                          </p>
                        </div>
                      </div>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </div> -->
        </div>
    </nav>
    <!-- cards -->
    <div class="w-full py-3 px-4 2xl:w-4/5 2xl:px-6 2xl:pt-8 xl:ml-80">
      <?php
      if ($_SESSION['type'] == "Head") {
        ?>
        <!-- row 1 -->
        <div class="flex flex-wrap -mx-3 mb-2">
          <!-- card1 -->
          <div class="w-full max-w-full px-3 mb-3 2xl:mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4 cursor-pointer"
            id="pending_verify">
            <div class="relative flex flex-col min-w-0 break-words bg-white shadow-xl rounded-2xl bg-clip-border">
              <div class="flex-auto p-4">
                <div class="flex flex-row -mx-3">
                  <div class="flex-none w-2/3 max-w-full px-3">
                    <div>
                      <p class="mb-0 font-sans text-lg 2xl:text-base font-semibold leading-normal uppercase">Pending
                        Verify</p>
                      <h5 class="mb-2 font-bold text-2xl">
                        <?php echo $document->pending_verify(); ?>
                      </h5>
                    </div>
                  </div>
                  <div class="px-3 text-right basis-1/3">
                    <div
                      class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-blue-500 to-violet-500">
                      <i class="ni leading-none ni-money-coins text-lg relative top-3.5 text-white"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- card2 -->
          <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4 cursor-pointer"
            id="pending_approval">
            <div class="relative flex flex-col min-w-0 break-words bg-white shadow-xl rounded-2xl bg-clip-border">
              <div class="flex-auto p-4">
                <div class="flex flex-row -mx-3">
                  <div class="flex-none w-2/3 max-w-full px-3">
                    <div>
                      <p class="mb-0 font-sans text-base font-semibold leading-normal uppercase">Pending Approval</p>
                      <h5 class="mb-2 font-bold text-2xl">
                        <?php echo $document->pending_approval(); ?>
                      </h5>
                    </div>
                  </div>
                  <div class="px-3 text-right basis-1/3">
                    <div
                      class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-red-600 to-orange-600">
                      <i class="ni leading-none ni-world text-lg relative top-3.5 text-white"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- card3 -->
          <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4 cursor-pointer"
            id="reject_bonafide">
            <div class="relative flex flex-col min-w-0 break-words bg-white shadow-xl rounded-2xl bg-clip-border">
              <div class="flex-auto p-4">
                <div class="flex flex-row -mx-3">
                  <div class="flex-none w-2/3 max-w-full px-3">
                    <div>
                      <p class="mb-0 font-sans text-base font-semibold leading-normal uppercase">Reject Document</p>
                      <h5 class="mb-2 font-bold text-2xl">
                        <?php //echo $document->reject_bonafide(); ?>
                      </h5>
                    </div>
                  </div>
                  <div class="px-3 text-right basis-1/3">
                    <div
                      class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-emerald-500 to-teal-400">
                      <i class="ni leading-none ni-paper-diploma text-lg relative top-3.5 text-white"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- card4 -->
          <div class="w-full max-w-full px-3 sm:w-1/2 sm:flex-none xl:w-1/4 cursor-pointer" id="complete_delivery">
            <div class="relative flex flex-col min-w-0 break-words bg-white shadow-xl rounded-2xl bg-clip-border">
              <div class="flex-auto p-4">
                <div class="flex flex-row -mx-3">
                  <div class="flex-none w-2/3 max-w-full px-3">
                    <div>
                      <p class="mb-0 font-sans text-base font-semibold leading-normal uppercase">Deliver Complete</p>
                      <h5 class="mb-2 font-bold text-2xl">
                        <?php echo $document->complete_deliver(); ?>
                      </h5>
                    </div>
                  </div>
                  <div class="px-3 text-right basis-1/3">
                    <div
                      class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-orange-500 to-yellow-500">
                      <i class="ni leading-none ni-cart text-lg relative top-3.5 text-white"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php
      }
      ?>
      <!-- end Navbar -->
      <div class="min-w-full bg-white shadow-lg rounded-2xl mt-0 py-4">
        <div class="flex flex-col justify-start">
          <h1 class="text-2xl font-medium text-indigo-600 py-2 pl-3">Undertaking Documents</h1>
        </div>
        <div class="px-4 min-w-full text-left text-base mt-2 overflow-x-auto">
          <table id="myTable">
            <thead class="border-b font-medium text-lg">
              <tr>
                <th scope="col" class="px-6 py-3">Sr.No</th>
                <th scope="col" class="px-6 py-3 hidden lg:table-cell">Token No</th>
                <th scope="col" class="px-0 py-3">Enrollment No</th>
                <th scope="col" class="pr-6 py-3 hidden md:table-cell">Name</th>
                <th scope="col" class="py-3 hidden xl:table-cell">Course</th>
                <th scope="col" class="px-6 py-3">Verify</th>
                <th scope="col" class="py-3">Approve</th>
                <th scope="col" class="py-3">Deliver</th>
                <th scope="col" class="py-3">Return</th>
              </tr>
            </thead>
            <tbody class="text-left">

              <?php
              $get_deatils = $document->get_details();
              $count = 0;
              while ($row = mysqli_fetch_assoc($get_deatils)) {
                $count++;
                ?>
                <tr class="border-b transition duration-300 ease-in-out hover:bg-neutral-100 2xl:text-lg">
                  <td class="whitespace-nowrap px-6 py-4 font-medium">
                    <?php echo htmlspecialchars($count); ?>
                  </td>
                  <td class="whitespace-nowrap px-6 py-4 hidden lg:table-cell">
                    <?php echo htmlspecialchars($row['id']); ?>
                  </td>
                  <td class="whitespace-nowrap px-0 py-4 text-indigo-600 font-medium cursor-pointer"
                    onclick="verify(<?php echo htmlspecialchars($row['id']) ?>)">
                    <?php echo htmlspecialchars($row['enrollment_no']); ?>
                  </td>
                  <td class="whitespace-nowrap pr-6 py-4 hidden md:table-cell">
                    <?php echo htmlspecialchars($row['name']); ?>
                  </td>
                  <td class="whitespace-nowrap py-4 hidden xl:table-cell">
                    <?php echo htmlspecialchars($row['course']); ?>
                  </td>

                  <!-- Verification Documents -->
                  <td class="whitespace-nowrap px-6 py-4">
                    <?php if ($_SESSION['type'] == "Clerk" && $row['verify_flag'] == 0 && $row['remark'] == "") { ?>
                      <button name="view" id="view"
                        class="bg-indigo-600 px-4 py-2 rounded-lg text-white font-medium hover:bg-indigo-500 shadow-md"
                        onclick="verify(<?php echo htmlspecialchars($row['id']); ?>)">View</button>
                    <?php } else if ($_SESSION['type'] == "Head" && $row['verify_flag'] == 0 && $row['remark'] == "") { ?>
                        <p class="text-base bg-yellow-600 mr-3 p-1 text-white font-medium text-center rounded-full">Pending
                        </p>
                      <?php } else if ($row['verify_flag'] == 1 && $row['remark'] == "") { ?>
                          <p class="text-base bg-green-500 mr-3 p-1 text-white font-medium text-center rounded-full">Verified
                          </p>
                        <?php } else if ($row['verify_flag'] == 0 || $row['verify_flag'] == 1 && $row['remark'] != "") { ?>
                            <p class="text-base bg-red-500 mr-3 p-1 text-white font-medium text-center rounded-full">Canceled</p>
                          <?php } ?>
                  </td>

                  <!-- Approval Documents -->
                  <td class="whitespace-nowrap px-6 py-4">
                    <?php if ($_SESSION['type'] == "Head" && $row['verify_flag'] == 1 && $row['approve_flag'] == 0 && $row['remark'] == "") { ?>
                      <button name="approve" onclick="verify(<?php echo htmlspecialchars($row['id']); ?>)" id="approve"
                        class="bg-indigo-600 px-4 py-2 rounded-lg text-white font-medium hover:bg-indigo-500 shadow-md">View</button>
                    <?php } else if (($_SESSION['type'] == "Clerk" || $_SESSION['type'] == "Head") && ($row['verify_flag'] == 1 || $row['verify_flag'] == 0) && $row['approve_flag'] == 0 && $row['remark'] == "") { ?>
                        <p class="text-base bg-yellow-600 mr-3 p-1 text-white font-medium text-center rounded-full">Pending
                        </p>
                      <?php } else if ($row['approve_flag'] == 1 && $row['remark'] == "") { ?>
                          <p class="text-base bg-green-500 mr-3 p-1 text-white font-medium text-center rounded-full">Approved
                          </p>
                        <?php } else if ($row['approve_flag'] == 0 && $row['remark'] != "") { ?>
                            <p class="text-base bg-red-500 mr-3 p-1 text-white font-medium text-center rounded-full">Canceled</p>
                          <?php } ?>
                  </td>

                  <!-- Deliver Documents -->
                  <td class="whitespace-nowrap px-6 py-4">
                    <?php if ($row['approve_flag'] == 1 && $_SESSION['type'] == "Clerk" && $row['delever_flag'] == 0 && $row['remark'] == "") { ?>
                      <div class="flex"> <a
                          href="private/document_server.php?pickup_id=<?php echo htmlspecialchars($row['id']); ?>"><button
                            class="bg-indigo-600 px-4 py-2 rounded-lg text-white font-medium hover:bg-indigo-500 shadow-md deliver">Deliver</button></a>
                      </div>
                    <?php } else if ($_SESSION['type'] == "Head" && $row['delever_flag'] == 0 && $row['remark'] == "") { ?>
                        <div class="flex">
                          <p class="text-base bg-yellow-600 mr-3 py-1 px-2 text-white font-medium text-center rounded-full">
                            Pending</p>
                        </div>
                      <?php } else if ($_SESSION['type'] == "Clerk" && $row['delever_flag'] == 0 && $row['remark'] == "") { ?>
                          <div class="flex">
                            <p class="text-base bg-yellow-600 mr-3 py-1 px-2 text-white font-medium text-center rounded-full">
                              Pending</p>
                          </div>
                        <?php } else if ($row['delever_flag'] == 1 && $row['remark'] == "") { ?>
                            <div class="flex ">
                              <p class="text-base bg-green-500 mr-3 py-1 px-2 text-white font-medium text-center rounded-full">
                                Delivered
                              </p>
                            </div>
                          <?php } else if ($row['verify_flag'] == 1 || $row['verify_flag'] == 0 && $row['delever_flag'] == 0 && $row['remark'] != "") { ?>
                              <div class="flex ">
                                <p class="text-base bg-red-500 mr-3 py-1 px-2 text-white font-medium text-center rounded-full">
                                  Canceled
                                </p>
                              </div>
                            <?php } ?>
                  </td>

                  <!-- Return Documents -->
                  <td class="whitespace-nowrap px-6 py-4">
                    <?php if ($row['delever_flag'] == 1 && $_SESSION['type'] == "Clerk" && $row['remark'] == "" && $row['return_flag'] == 0) { ?>
                      <div class="flex"> <a
                          href="private/document_server.php?return_date=<?php echo htmlspecialchars($row['id']); ?>"><button
                            class="bg-indigo-600 px-4 py-2 rounded-lg text-white font-medium hover:bg-indigo-500 shadow-md">Return</button></a>
                      </div>
                    <?php } else if ($_SESSION['type'] == "Head" && $row['delever_flag'] == 0 && $row['remark'] == "") { ?>
                        <div class="flex">
                          <p class="text-base bg-yellow-600 mr-3 py-1 px-2 text-white font-medium text-center rounded-full">
                            Pending</p>
                        </div>
                      <?php } else if ($_SESSION['type'] == "Clerk" && $row['delever_flag'] == 0 && $row['remark'] == "") { ?>
                          <div class="flex">
                            <p class="text-base bg-yellow-600 mr-3 py-1 px-2 text-white font-medium text-center rounded-full">
                              Pending</p>
                          </div>
                        <?php } else if ($row['return_flag'] == 1 && $row['remark'] == "") { ?>
                            <div class="flex ">
                              <p class="text-base bg-green-500 mr-3 py-1 px-2 text-white font-medium text-center rounded-full">
                                Returned
                              </p>
                            </div>
                          <?php } else if ($row['verify_flag'] == 1 || $row['verify_flag'] == 0 && $row['delever_flag'] == 0 && $row['remark'] != "") { ?>
                              <div class="flex ">
                                <p class="text-base bg-red-500 mr-3 py-1 px-2 text-white font-medium text-center rounded-full">
                                  Canceled
                                </p>
                              </div>
                            <?php } ?>
                  </td>
                </tr>
                <?php
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
  </main>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
  <script>
    $(document).ready(function () {
      $('#myTable').DataTable();
    });

    const pending_verify = document.getElementById('pending_verify');
    const pending_approval = document.getElementById('pending_approval');
    const reject_bonafide = document.getElementById('reject_bonafide');
    const complete_delivery = document.getElementById('complete_delivery');
    <?php if ($_SESSION['type'] == "Head") { ?>
      pending_verify.addEventListener('click', function (event) {
        event.preventDefault();
        window.location.href = "private/excel_file.php?action=pending_bonafide_verification";
      });

      pending_approval.addEventListener('click', function (event) {
        event.preventDefault();
        window.location.href = "private/excel_file.php?action=pending_bonafide_approval";
      });

      reject_bonafide.addEventListener('click', function (event) {
        event.preventDefault();
        window.location.href = "private/excel_file.php?action=bonafide_rejection";
      });

      complete_delivery.addEventListener('click', function (event) {
        event.preventDefault();
        window.location.href = "private/excel_file.php?action=bonafide_Delivery_complete";
      });
    <?php } ?>

    function verify(id) {
      jQuery.ajax({
        url: 'private/document_server.php',
        type: 'POST',
        data: "&id=" + id,
        success: function (response) {
          // console.log(response);
          window.location.href = "document_verification";
        }
      })
    }
  </script>
  <?php include('private/sweet_alert.php'); ?>
</body>

</html>