<?php 
require('../connect.php');
$id=$_POST['postid'];
$title=$_POST['title'];
$body=$_POST['body'];
echo $id,$title,$body;
$update="UPDATE posts SET title='$title',body='$body' WHERE id=$id";
mysqli_query($db,$update);
header("Location:post-list.php");
?>