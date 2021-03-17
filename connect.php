<?php 
$db=new mysqli('localhost','root','');
$conn=mysqli_select_db($db,'blog');
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
?>