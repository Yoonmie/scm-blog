<?php
require('../connect.php');
$id=$_POST['id'];
$name=$_POST['name'];
$email=$_POST['email'];
$pw=$_POST['password'];
$role=$_POST['role'];
$photo=$_FILES['image']['name'];

echo $id,$name,$email,$pw,$img,$role;
if($photo){
  $temp=$_FILES['image']['tmp_name'];
  $img=uniqid().'_'.$photo;
  move_uploaded_file($temp,"../img/$img");
  $update="UPDATE users SET name='$name',email='$email',password='$pw' ,role_id='$role', image='$img' WHERE id=$id";
  mysqli_query($db,$update);
  // header("Location:register.php?status=2");
  header("Location:user-list.php");
}
else {
  $update="UPDATE users SET name='$name',email='$email',password='$pw' ,role_id='$role' WHERE id=$id";
  mysqli_query($db,$update);
  // header("Location:register.php?status=2");
  header("Location:user-list.php");
}
?>