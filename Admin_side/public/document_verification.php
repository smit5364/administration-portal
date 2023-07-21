<?php
// error_reporting(0);
include('private/document_server.php');
include('private/sidebar_pending_counting.php');
if ($_SESSION['name'] == "") {
  header('location:signin');
}
$document = new Document;
$id = htmlspecialchars($_SESSION['id']);
$document_details = $document->individual_detail($id);

if (isset($_POST['verify'])) {
  $document->update_verify($id);
  header('location:document');
}
if (isset($_POST['approve'])) {
  $document->approve_verify($id);
  header('location:document');
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" type="image/png" href="private/assets/img/fav.png" />
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
  <!-- Main Styling -->
  <link rel="stylesheet" href="input.css">
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    .swal-modal {
      padding-top: 10px;
      padding-bottom: 15px;
    }

    .swal-text {
      font-size: 20px;
      text-align: center;
    }

    ::-webkit-scrollbar{
      display: none;
    }
  </style>
</head>

<body class="m-0 font-sans text-base antialiased font-normal leading-default bg-gray-50 text-slate-500 overflow-hidden">
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
            <div class="bg-indigo-600 ml-28 text-white font-medium px-4 text-xl py-0 rounded-full">
            </div>
          </a>
        </li>
      </ul>
    </div>
  </section>
  <!-- end sidenav -->

  <main class="relative h-full max-h-screen transition-all duration-200 ease-in-out xl:ml-68 rounded-xl overflow-auto">
    <!-- Navbar -->
    <nav
      class="relative flex flex-wrap items-center justify-between px-0 pt-5 mx-6 transition-all ease-in shadow-none duration-250 rounded-2xl lg:flex-nowrap lg:justify-start"
      navbar-main navbar-scroll="false">
      <div class="flex items-center justify-between w-full px-4 py-1 mx-auto flex-wrap-inherit">
        <nav class="pl-80">
          <!-- breadcrumb -->
          <ol class="flex flex-wrap pt-1 bg-transparent rounded-lg">
            <li class="text-sm leading-normal">
              <a class="text-white opacity-50 text-md" href="javascript:;">Pages</a>
            </li>
            <li
              class="text-md pl-2 capitalize leading-normal text-white before:float-left before:pr-2 before:text-white before:content-['/']"
              aria-current="page">Documents</li>
          </ol>
          <h6 class="mb-0 font-bold text-white capitalize text-lg">Documents</h6>
        </nav>

        <div class="flex items-center mt-2 grow sm:mt-0 sm:mr-6 md:mr-0 lg:flex lg:basis-auto">
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
            <li class="flex items-center mr-3">
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
                  <i class="ease mb-0.75 relative block h-0.5 rounded-sm bg-white transition-all"></i>
                  <i class="ease mb-0.75 relative block h-0.5 rounded-sm bg-white transition-all"></i>
                  <i class="ease relative block h-0.5 rounded-sm bg-white transition-all"></i>
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
    <div class="w-4/5 px-6 py-8 ml-80">
      <?php
      if ($_SESSION['type'] == "Head") {
        ?>
        <!-- row 1 -->
        <div class="flex flex-wrap -mx-3 mb-6">
          <!-- card1 -->
          <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4 cursor-pointer"
            onclick="pending_verify_2()">
            <div class="relative flex flex-col min-w-0 break-words bg-white shadow-xl rounded-2xl bg-clip-border">
              <div class="flex-auto p-4">
                <div class="flex flex-row -mx-3">
                  <div class="flex-none w-2/3 max-w-full px-3">
                    <div>
                      <p class="mb-0 font-sans text-md font-semibold leading-normal uppercase">Pending Verify</p>
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
            onclick="pending_approval()">
            <div class="relative flex flex-col min-w-0 break-words bg-white shadow-xl rounded-2xl bg-clip-border">
              <div class="flex-auto p-4">
                <div class="flex flex-row -mx-3">
                  <div class="flex-none w-2/3 max-w-full px-3">
                    <div>
                      <p class="mb-0 font-sans text-md font-semibold leading-normal uppercase">Pending Approval</p>
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
            onclick="reject_document()">
            <div class="relative flex flex-col min-w-0 break-words bg-white shadow-xl rounded-2xl bg-clip-border">
              <div class="flex-auto p-4">
                <div class="flex flex-row -mx-3">
                  <div class="flex-none w-2/3 max-w-full px-3">
                    <div>
                      <p class="mb-0 font-sans text-md font-semibold leading-normal uppercase">Reject document</p>
                      <h5 class="mb-2 font-bold text-2xl">
                        <?php echo $document->reject_document(); ?>
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
          <div class="w-full max-w-full px-3 sm:w-1/2 sm:flex-none xl:w-1/4 cursor-pointer" onclick="complete_delivery()">
            <div class="relative flex flex-col min-w-0 break-words bg-white shadow-xl rounded-2xl bg-clip-border">
              <div class="flex-auto p-4">
                <div class="flex flex-row -mx-3">
                  <div class="flex-none w-2/3 max-w-full px-3">
                    <div>
                      <p class="mb-0 font-sans text-md font-semibold leading-normal uppercase">Deliver Complete</p>
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
      <div class="w-full bg-white shadow-2xl rounded-2xl mt-0 py-4">
        <div class="flex flex-col justify-start">
          <h1 class="text-2xl font-medium text-indigo-600 pl-3">Documents Verification</h1>
        </div>
        <div class="flex flex-col justify-start px-5">
          <?php
          while ($row = mysqli_fetch_assoc($document_details)) {
            ?>
            <div class="grid grid-cols-3">
              <div class="col-span-1">
                <h1 class="text-lg font-medium">Token number</h1>
                <p class="text-lg">
                  <?php echo htmlspecialchars($row['id']); ?>
                </p>
              </div>
              <div class="col-span-1">
                <h1 class="text-lg font-medium">Name</h1>
                <p class="text-lg">
                  <?php echo htmlspecialchars($row['name']); ?>
                </p>
              </div>
              <div class="col-span-1">
                <h1 class="text-lg font-medium">Father Name</h1>
                <p class="text-lg">
                  <?php echo htmlspecialchars($row['father_name']); ?>
                </p>
              </div>
            </div>
            <div class="grid grid-cols-3 mt-6">
              <div class="col-span-1">
                <h1 class="text-lg font-medium">Enrollment Number</h1>
                <p class="text-lg">
                  <?php echo htmlspecialchars($row['enrollment_no']); ?>
                </p>
              </div>
              <div class="col-span-1">
                <h1 class="text-lg font-medium">Course</h1>
                <p class="text-lg">
                  <?php echo htmlspecialchars($row['course']); ?>
                </p>
              </div>
              <div class="col-span-1">
                <h1 class="text-lg font-medium">Semester</h1>
                <p class="text-lg">
                  <?php echo htmlspecialchars($row['semester']); ?>
                </p>
              </div>
            </div>
            <div class="grid grid-cols-3 mt-6">
              <div class="col-span-1">
                <h1 class="text-lg font-medium">Document</h1>
                <p class="text-lg">
                  <?php $documents = array();
                  if ($row['document10th'] === '1') {
                    $documents[] = "10th Marksheet";
                  }
                  if ($row['document12th'] === '1') {
                    $documents[] = "12th Marksheet";
                  }
                  if ($row['leaving_certificate'] === '1') {
                    $documents[] = "Leaving Certificate";
                  }
                  $doc = implode(', ', $documents);
                  echo $doc; ?>
                </p>
              </div>
              <div class="col-span-1">
                <h1 class="text-lg font-medium">Return Date</h1>
                <p class="text-lg">
                  <?php echo htmlspecialchars($row['date']); ?>
                </p>
              </div>
              <?php if ($_SESSION['type'] == "Head" && $row['delever_flag'] == 1 || $_SESSION['type'] == "Clerk" && $row['delever_flag'] == 1) { ?>
                <div class="col-span-1">
                  <h1 class="text-lg font-medium">Pickup Date</h1>
                  <p class="text-lg">
                    <?php echo htmlspecialchars($row['pickup_date']); ?>
                  </p>
                </div>
              <?php } else if (($_SESSION['type'] == "Head" || $_SESSION['type'] == "Clerk") && $row['remark'] != "") { ?>
                  <div class="col-span-1">
                    <h1 class="text-lg font-medium">Reason for Cancel</h1>
                    <p class="text-lg">
                    <?php echo htmlspecialchars($row['remark']); ?>
                    </p>
                  </div>
                <?php } ?>
            </div>
            <div class="grid grid-cols-3 mt-6">
              <div class="col-span-1">
                <h1 class="text-lg font-medium">Email</h1>
                <p class="text-lg">
                  <?php echo htmlspecialchars($row['email']); ?>
                </p>
              </div>
              <div class="col-span-1">
                <h1 class="text-lg font-medium">Mobile No</h1>
                <p class="text-lg">
                  <?php echo htmlspecialchars($row['mobile_no']); ?>
                </p>
              </div>


            </div>
            <div class="grid grid-cols-3 mt-6">
              <div class="col-span-1">
                <h1 class="text-lg font-medium">Reason for document</h1>
                <p class="text-lg">
                  <?php echo htmlspecialchars($row['purpose']); ?>
                </p>
              </div>
              <div class="col-span-1">
                <h1 class="text-lg font-medium">Fees Recipt</h1>
                <p class="text-lg flex items-center">
                  <a href="private/Fees_recipt/<?php echo htmlspecialchars($row['fee_recipt']); ?>" target="_blank">
                    <abbr title="View"><img src="private/Images/icons8-view-94.png" alt="" class="w-14"></abbr>
                  </a>
                </p>
              </div>

            </div>
            <div class="grid-cols-2 mt-6 hidden" id="cancel_input">
              <div class="flex flex-col col-span-1">
                <label for="" class="text-lg font-medium">Reason for Cancel</label>
                <input type="text" name="remark" placeholder="Enter Your Remark"
                  class="w-96 h-12 bg-gray-50 border-2 border-indigo-600 outline-none text-lg pl-3 rounded-xl mt-1 font-medium"
                  id="remark">
              </div>
            </div>
            <div class="grid grid-cols-2 mt-6">
              <?php if ($row['verify_flag'] == 0 && $_SESSION['type'] == "Clerk" && $row['remark'] == "") { ?>
                <div class="col-span-1">
                  <form method="post"><button type="submit" name="verify"
                      class="bg-indigo-600 px-4 py-2 text-white font-medium rounded-lg hover:bg-indigo-500">Verify</button>
                    <button type="button" id="cancel" name="cancel"
                      class="bg-red-600 px-4 py-2 text-white font-medium rounded-lg hover:bg-red-500">Cancel</button>
                    <input type="hidden" name="cancel_flag" value="0" id="cancel_flag">
                  </form>
                <?php } ?>
                <?php if ($row['verify_flag'] == 1 && $_SESSION['type'] == "Head" && $row['approve_flag'] == 0 && $row['remark'] == "") { ?>
                  <div class="col-span-1">
                    <form method="post"><button type="submit" name="approve"
                        class="bg-indigo-600 px-4 py-2 text-white font-medium rounded-lg hover:bg-indigo-500">Approve</button>
                      <button type="button" id="cancel" name="cancel"
                        class="bg-red-600 px-4 py-2 text-white font-medium rounded-lg hover:bg-red-500">Cancel</button>
                      <input type="hidden" name="cancel_flag" value="0" id="cancel_flag">
                    </form>
                  <?php } ?>
                </div>
              </div>
              <?php
          }
          ?>
          </div>
        </div>
  </main>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script>
    const cancel = document.getElementById('cancel');
    const cancel_input = document.getElementById('cancel_input');
    const remark = document.getElementById('remark');
    cancel.addEventListener('click', function (event) {
      event.preventDefault();
      if (cancel_input.classList.contains('hidden')) {
        cancel_input.classList.remove('hidden');
        remark.focus();
        $('#cancel_flag').val("1");
      }
    });
    cancel.addEventListener('click', function (event) {
      event.preventDefault();
      const cancel_flag = document.getElementById('cancel_flag').value;
      const remark_value = document.getElementById('remark').value;
      const verify_id = <?php echo $_SESSION['id']; ?>;
      if (cancel_flag == "1" && remark_value != "" && remark_value != null) {
        swal({
          title: "Are you sure?",
          text: "This document request is cancel!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
          .then((willDelete) => {
            if (willDelete) {
              jQuery.ajax({
                url: 'document',
                type: 'POST',
                data: "&id=" + verify_id + "&remark=" + remark_value,
                success: function () {
                  swal({
                    title: "Cancel document Request.",
                    icon: "success",
                    button: false,
                    timer: 1500,
                  }).then(() => {
                    window.location.href = "document";
                  })
                }
              });
            } else {
              swal({
                title: "This Request is safe.",
                icon: "success",
                button: false,
                timer: 1500,
              }).then(() => {
                $('#remark').val("");
              })
            }
          })
      }
    });

    function pending_verify_2() {
      window.location.href = "private/excel_file.php?action=pending_document_verification";
    }

    function pending_approval() {
      window.location.href = "private/excel_file.php?action=pending_document_approval";
    }

    function reject_document() {
      window.location.href = "private/excel_file.php?action=document_rejection";
    }

    function complete_delivery() {
      window.location.href = "private/excel_file.php?action=document_Delivery_complete";
    }
  </script>
</body>

</html>