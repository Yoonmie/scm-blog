<?php
session_start();
$errorMessage="";
if($_SESSION['row']=="") {
  header("Location:login.php");
}
else {
  unset($_SESSION['row']);
  unset($_SESSION['userid']);
  unset($_SESSION['username']);
  header("Location:login.php");
}
?>