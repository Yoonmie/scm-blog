<?php
session_start();
require('../connect.php');
$pid=$_GET['postid'];
$msg="Delete Succefully";
$delete="DELETE posts.*,comments.* FROM posts LEFT JOIN comments ON posts.id=comments.post_id WHERE posts.id='$pid'";
mysqli_query($db,$delete);
if($_SESSION['row']==1){
  header("Location:index.php");
}
else{
  header("Location:post-list.php");
}
?>