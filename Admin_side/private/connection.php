<?php
function connect(){
  try {
    $con = new mysqli("localhost","root","","admin_portal");
  } catch (Exception $e) {
    echo $e ->getMessage();
  }
  return $con;
}
?>