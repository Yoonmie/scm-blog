<?php
session_start();
$errorMessage="";
if($_SESSION['login']==false) {
  header("Location:../index.php");
}
else {
  unset($_SESSION['login']);
  header("Location:../index.php");
}
?>
