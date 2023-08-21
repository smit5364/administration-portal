<?php
// error_reporting(0);
// session_start();
include('private/admission_cancel_server.php');
include('private/sidebar_pending_counting.php');
$admission = new admission;
unset($_SESSION['id']);
if ($_SESSION['name'] == "") {
    header('location:signin');
}
if ($_SESSION['type'] == "Clerk" && isset($_GET['pickup_id'])) {
    $id = (int)$_GET['pickup_id'];
    // $bonafide->date_for_pickup($id);
    // header('Location: bonafide');
}
if (isset($_GET['deliver_id'])) {
    $id = (int)$_GET['deliver_id'];
    // $bonafide->print_bonafide($id);
    // $bonafide->edit_doc($id);
}

if (isset($_POST['remark']) && isset($_POST['id'])) {
    $remark_id = addslashes($_POST['id']);
    $remark = addslashes($_POST['remark']);
    // $bonafide->cancel_verify($remark_id, $remark);
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

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.css">
    <style>
        ::-webkit-scrollbar {
            display: none;
        }

        #line {
            display: flex;
            justify-content: space-between;
        }

        #swal_upload {
            /* display: flex; */
            justify-items: flex-end;
        }
    </style>
</head>

<body class="m-0 font-sans text-base antialiased font-normal bg-gray-50 text-slate-500 overflow-hidden">
    <div class="absolute w-full bg-indigo-600 min-h-[25%]"></div>
    <!-- sidenav  -->
    <section class="fixed inset-y-0 flex-wrap items-center justify-between w-1/5 p-0 my-4 overflow-y-auto antialiased transition-transform duration-200 -translate-x-full bg-white border-0 shadow-xl max-w-64 ease-in-out z-[990] xl:ml-6 rounded-2xl xl:left-0 xl:translate-x-0">
        <div class="h-19 pt-2">
            <i class="absolute top-0 right-0 p-4 opacity-50 cursor-pointer fas fa-times text-slate-400 xl:hidden" sidenav-close></i>
            <a href="dashboard" class="flex justify-center">
                <img src="private/assets/img/logo.png" alt="" width="140px">
            </a>
        </div>

        <hr class="h-px mt-1 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent" />

        <div class="items-center block w-auto max-h-screen overflow-auto basis-full">
            <ul class="flex flex-col pl-0 mb-0">
                <li class="mt-2 w-full">
                    <a href="dashboard" class="bg-white text-lg my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 py-3 font-medium text-slate-700 transition-colors">
                        <i class="ni ni-tv-2 text-indigo-600 mr-3"></i>
                        Dashboard
                    </a>
                </li>
                <?php if ($_SESSION['type'] == "Head") { ?>
                    <li class="w-full">
                        <a href="student" class="bg-white text-lg my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 py-3 font-medium text-slate-700 transition-colors">
                            <i class="ni ni-tv-2 text-indigo-600 mr-3"></i>
                            Student
                            <div class="bg-indigo-600 ml-[7.5rem] text-white font-medium px-4 text-xl py-0 rounded-full">
                                <?php echo pending_provide_authority(); ?>
                            </div>
                        </a>
                    </li>
                <?php } ?>
                <li class="w-full">
                    <a href="bonafide" class="text-lg my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 py-3 font-medium text-slate-700 transition-colors">
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
                    <a href="document" class="text-lg my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 py-3 font-medium text-slate-700 transition-colors">
                        <i class="ni ni-tv-2 text-indigo-600 mr-3"></i>
                        Document
                    </a>
                </li>
                <li class="w-full">
                    <a href="admission_cancel" class="bg-indigo-200 text-lg my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 py-3 font-medium text-slate-700 transition-colors">
                        <i class="ni ni-tv-2 text-indigo-600 mr-3"></i>
                        Admission Cancle
                    </a>
                </li>
            </ul>
        </div>
    </section>
    <!-- end sidenav -->

    <main class="relative h-full max-h-screen transition-all duration-200 ease-in-out xl:ml-68 rounded-xl overflow-x-hidden scroll-smooth overflow-y-visible">
        <!-- Navbar -->
        <nav class="relative flex flex-wrap items-center justify-between px-0 pt-5 mx-6 transition-all ease-in shadow-none duration-250 rounded-2xl lg:flex-nowrap lg:justify-start" navbar-main navbar-scroll="false">
            <div class="flex w-full 2xl:px-4 py-1 mx-auto flex-wrap-inherit">
                <nav class="xl:pl-80">
                    <!-- breadcrumb -->
                    <ol class="flex flex-wrap pt-1 bg-transparent rounded-lg">
                        <li class="text-sm leading-normal">
                            <a class="text-white opacity-50 text-base" href="javascript:;">Pages</a>
                        </li>
                        <li class="text-base pl-2 capitalize leading-normal text-white before:float-left before:pr-2 before:text-white before:content-['/']" aria-current="page">Admission Cancel</li>
                    </ol>
                    <h6 class="mb-0 font-bold text-white capitalize text-lg">Admission Cancel</h6>
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
            <!-- end Navbar -->
            <div class="min-w-full bg-white shadow-lg rounded-2xl mt-0 py-4">
                <div class="flex flex-col justify-between">
                    <span id="line">
                        <h1 class="text-2xl font-medium text-indigo-600 py-2 pl-3">Admission Cancel Applicants</h1>
                        <?php if ($_SESSION['type'] == "Head") { ?>
                            <button class="px-4 py-2 bg-blue-500 text-white rounded bg-red-600 px-4 py-2 rounded-lg text-white font-medium hover:bg-indigo-500 shadow-md mr-4" type="button" onclick="selectPDF()">Upload New Form</button>
                        <?php } ?>
                        <!-- Add SweetAlert2 library -->
                        <script>
                            async function selectPDF() {
                                const {
                                    value: file
                                } = await Swal.fire({
                                    title: 'Select PDF',
                                    input: 'file',
                                    inputAttributes: {
                                        'accept': 'application/pdf', // Update to accept only PDF files
                                        'aria-label': 'Upload your PDF'
                                    }
                                });

                                if (file) {
                                    // const formData = new FormData();
                                    // formData.append('pdf', file);
                                    // console.log(file);
                                    // Send the PDF file to the PHP backend
                                    // const response = await fetch('upload.php', {
                                    //     method: 'POST',
                                    //     body: file
                                    // });
                                    const respo = jQuery.ajax({
                                        url: "upload",
                                        type: "POST",
                                        data: "&file=" + file,
                                        success: function(response) {
                                            console.log(response);
                                            return response;
                                        }

                                    })

                                    if (respo.ok) {
                                        const imageUrl = await response.text();
                                        Swal.fire({
                                            title: 'Your uploaded PDF',
                                            text: 'Click the button to view the PDF.',
                                            icon: 'success',
                                            showCancelButton: true,
                                            confirmButtonText: 'View PDF',
                                            showLoaderOnConfirm: true,
                                            preConfirm: () => {
                                                // Open the PDF in a new tab using the URL returned from the server
                                                window.open(imageUrl, '_blank');
                                            }
                                        });
                                    } else {
                                        Swal.fire({
                                            title: 'Error',
                                            text: 'Failed to upload the PDF file.',
                                            icon: 'error'
                                        });
                                    }
                                }
                            }
                        </script>

                    </span>
                </div>
                <div class="px-4 min-w-full text-left text-base mt-2 overflow-x-auto">
                    <table id="myTable">
                        <thead class="border-b font-medium text-lg">
                            <tr>
                                <th scope="col" class="px-6 py-3">Sr.No</th>
                                <th scope="col" class="px-6 py-3">Enrollment No</th>
                                <th scope="col" class="pr-6 py-3">Name</th>
                                <th scope="col" class="pr-6 py-3">Father Name</th>
                                <th scope="col" class="py-3 hidden xl:table-cell">Course</th>
                                <th scope="col" class="px-6 py-3">Sem</th>
                                <th scope="col" class="px-6 py-3">Mobile No</th>
                                <th scope="col" class="px-6 py-3">Email</th>
                            </tr>
                        </thead>
                        <tbody class="text-left">

                            <?php
                            $get_deatils = $admission->get_details();
                            $count = 0;
                            while ($row = mysqli_fetch_assoc($get_deatils)) {
                                $count++;
                            ?>
                                <tr class="border-b transition duration-300 ease-in-out hover:bg-neutral-100 2xl:text-lg">
                                    <td class="whitespace-nowrap px-6 py-4 font-medium">
                                        <?php echo htmlspecialchars($count); ?>
                                    </td>
                                    <td class="whitespace-nowrap px-0 py-4 text-indigo-600 font-medium cursor-pointer" onclick="verify(<?php echo htmlspecialchars($row['id']) ?>)">
                                        <?php echo htmlspecialchars($row['enrollment_no']); ?>
                                    </td>
                                    <td class="whitespace-nowrap pr-6 py-4 hidden md:table-cell">
                                        <?php echo htmlspecialchars($row['name']); ?>
                                    </td>
                                    <td class="whitespace-nowrap pr-6 py-4 hidden md:table-cell">
                                        <?php echo htmlspecialchars($row['father_name']); ?>
                                    </td>
                                    <td class="whitespace-nowrap py-4 hidden xl:table-cell">
                                        <?php echo htmlspecialchars($row['course']); ?>
                                    </td>
                                    <td class="whitespace-nowrap pr-6 py-4 hidden md:table-cell">
                                        <?php echo htmlspecialchars($row['semester']); ?>
                                    </td>
                                    <td class="whitespace-nowrap pr-6 py-4 hidden md:table-cell">
                                        <?php echo htmlspecialchars($row['mobile_no']); ?>
                                    </td>
                                    <td class="whitespace-nowrap pr-6 py-4 hidden md:table-cell">
                                        <?php echo htmlspecialchars($row['email']); ?>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>

</body>

</html>



<!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
                        <script>
                            async function selectFileAndStore() {
                                const {
                                    value: file
                                } = await Swal.fire({
                                    title: 'Select file',
                                    input: 'file',
                                    inputAttributes: {
                                        'accept': '.pdf', // Specify that only PDF files are allowed
                                        'aria-label': 'file NAME(admission_cancel.pdf)only'
                                    }
                                });

                                if (file) {
                                    // Send the file to the server for storage
                                    const uploadResult = await sendFileToServer(file);

                                    // Display success message with the server response
                                    Swal.fire({
                                        title: 'Upload Successful',
                                        text: uploadResult.message,
                                        icon: 'success'
                                    });
                                }
                            }

                            // Send file to server using AJAX (Replace 'upload.php' with your PHP endpoint)
                            function sendFileToServer(file) {
                                return new Promise((resolve) => {
                                    const formData = new FormData();
                                    formData.append('file', file);

                                    const xhr = new XMLHttpRequest();
                                    xhr.open('POST', 'upload.php', true);
                                    xhr.onreadystatechange = function() {
                                        if (xhr.readyState === 4) {
                                            if (xhr.status === 200) {
                                                const response = JSON.parse(xhr.responseText);
                                                resolve(response);
                                            } else {
                                                resolve({
                                                    message: 'Failed to upload the file.'
                                                });
                                            }
                                        }
                                    };
                                    xhr.send(formData);
                                });
                            }
                        </script> -->
<!-- <script>
                            async function selectPDFAndStore() {
                                const {
                                    value: file
                                } = await Swal.fire({
                                    title: 'Select PDF',
                                    input: 'file',
                                    inputAttributes: {
                                        'accept': 'application/pdf', // Specify that only PDF files are allowed
                                        'aria-label': 'Upload your PDF file'
                                    }
                                });

                                if (file) {
                                    // Simulate file upload to a specific location (e.g., a server or cloud storage)
                                    const uploadResult = await simulatePDFUpload(file);

                                    // Display success message
                                    Swal.fire({
                                        title: 'Upload Successful',
                                        text: `PDF '${file.name}' has been stored at: ${uploadResult.location}`,
                                        icon: 'success'
                                    });
                                }
                            }

                            // Simulate PDF upload function (Replace this with your actual PDF upload code)
                            function simulatePDFUpload(file) {
                                return new Promise((resolve) => {
                                    // Simulate some asynchronous process for PDF upload
                                    setTimeout(() => {
                                        const uploadResult = {
                                            location: 'C:/wamp64/www/administration-portal/pdf/' + file.name // Replace with your actual file location
                                        };
                                        resolve(uploadResult);
                                    }, 2000); // Simulating a 2-second delay for the upload process
                                });
                            }
                        </script> -->