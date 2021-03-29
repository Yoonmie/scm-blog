<?php
  require('../connect.php');
  $name=$_POST['name'];
  $email=$_POST['email'];
  $pw=$_POST['password'];
  $role=$_POST['role'];
  $imgname=$_FILES['image']['name'];
  $temp=$_FILES['image']['tmp_name'];
  $img=uniqid().'_'.$imgname;
  if($img){
    move_uploaded_file($temp,"../img/$img");
  }
  if($name!=null && $email!=null && $pw!=null && $imgname){
    $insert="insert into users (name,role_id,email,password,image) values ('$name','$role','$email','$pw','$img')";
    $ret=mysqli_query($db,$insert);
    header("Location:login.php");
  }
  else {
    header("Location:register.php?status=4");
  }
?>