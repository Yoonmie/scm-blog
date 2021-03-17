<?php
require('../connect.php');
$id=$_GET['cid'];
$msg="Delete Succefully";
echo $id;

$delete="DELETE FROM users WHERE id=$id";
mysqli_query($db,$delete);
header("Location:register.php?status=3");
?>