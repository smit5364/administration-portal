<?php
    $page = isset($_GET['url']) ? $_GET['url'] : "home";
    $folder = "Views/";
    $files = glob($folder . "*.php");
    $file_name = $folder . $page . ".php";
    if (in_array($file_name, $files)) {
        if ($page == "home")
        {
            include('home_controller.php');
        }
        elseif ($page == "signin")
        {
            include('signin_controller.php');
        }
        elseif ($page == "signup")
        {
            include('signup_controller.php');
        }
        elseif ($page == "signout")
        {
            include('signout_controller.php');
        }
        elseif ($page == "document")
        {
            include('document_controller.php');
        }
        elseif ($page == "bonafide")
        {
            include('bonafide_controller.php');
        }
        elseif ($page == "admission_cancel")
        {
            include('admission_cancel_controller.php');
        }
        elseif ($page == "admission_cancel_form")
        {
            include('admission_cancel_form_controller.php');
        }
        elseif ($page == "other_document")
        {
            include('other_document_controller.php');
        }
    } else {
        include("Views/404.php");
    }
?>