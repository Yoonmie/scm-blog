<?php 
session_start();
require('../connect.php');
$id=$_POST['postid'];
$title=$_POST['title'];
$body=$_POST['body'];
$photo=$_FILES['image']['name'];
echo $id,$title,$body,$photo;
if($photo){
  $temp=$_FILES['image']['tmp_name'];
  $img=uniqid().'_'.$photo;
  move_uploaded_file($temp,"../img/$img");
  $update="UPDATE posts SET title='$title',body='$body',image='$img' WHERE id=$id";
  mysqli_query($db,$update);
  if($_SESSION['row']==1){
    header("Location:index.php");
  }
  else{
    header("Location:post-list.php");
  }
}
else {
  $update="UPDATE posts SET title='$title',body='$body' WHERE id=$id";
  mysqli_query($db,$update);
  if($_SESSION['row']==1){
    header("Location:index.php");
  }
  else{
    header("Location:post-list.php");
  }
}
$update="UPDATE posts SET title='$title',body='$body' WHERE id=$id";
mysqli_query($db,$update);
if($_SESSION['row']==1){
  header("Location:index.php");
}
else{
  header("Location:post-list.php");
}
?>