<?php
require('../connect.php');
$id=$_POST['id'];
$name=$_POST['name'];
$email=$_POST['email'];
$pw=$_POST['password'];
echo $id,$name,$email,$pw;
$update="UPDATE users SET name='$name',email='$email',password='$pw' WHERE id=$id";
mysqli_query($db,$update);
header("Location:register.php?status=2");
?>