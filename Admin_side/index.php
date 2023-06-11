<?php

$page = isset($_GET['url']) ? $_GET['url'] : "signin";
$folder = "public/";
$files = glob($folder."*.php");
$file_name = $folder . $page . ".php";

if(in_array($file_name,$files)){
    include($file_name);
}else{
    include("public/404.php");
}

?>