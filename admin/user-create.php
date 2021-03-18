<?php
  require('../connect.php');
  $name=$_POST['name'];
  $email=$_POST['email'];
  $pw=$_POST['password'];
  if($name!=null && $email!=null && $pw!=null){
    $insert="insert into users (name,email,password) values ('$name','$email','$pw')";
    $ret=mysqli_query($db,$insert);
    header("Location:register.php?status=1");
  }
  else {
    header("Location:register.php?status=4");
  }
?>