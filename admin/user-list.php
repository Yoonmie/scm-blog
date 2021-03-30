<?php
session_start();
if($_SESSION['row']=="")
{
  header("Location: login.php");
}
else{
  if($_SESSION['row']!=1) {
    header("Location:post-list.php");
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User-List | Blog</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/style.css">
</head>
<body id="user-list">
<nav class="navbar navbar-expand-lg navbar-light fixed-top bg-light">
  <a class="navbar-brand" href="index.php">BLOG</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link disabled" href="#"><?php echo $_SESSION['row'] ?> <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Welcome <?php echo $_SESSION['username']?> !</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <a href="logout.php" class="btn btn-danger" >Log-Out</a>
    </form>
  </div>
</nav>
<!--nav--->
<div class="container col-lg-10 col-sm-12 col-12">
  <div class="input-group add-list mb-5">
    <input type="text" class="form-control" placeholder="Search User Name">
    <div class="input-group-append">
      <button class="btn btn-info" type="button"><i class="fa fa-search"></i></button>
    </div>
  </div>
  <!---add post list--->
  <table class="table border table-striped mt-4">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Password</th>
      <th scope="col">Role</th>
      <th scope="col">Image</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
  <?php 
    require('../connect.php');
    $userresult=mysqli_query($db,"SELECT users.*, role.name AS rolename FROM users LEFT JOIN role ON users.role_id=role.id");
    while($user=mysqli_fetch_assoc($userresult)):
  ?>
    <tr>
      <th scope="row"><?php echo $user['id'] ?></th>
      <td><?php echo $user['name'] ?></td>
      <td><?php echo $user['email'] ?></td>
      <td><?php echo $user['password'] ?></td>
      <td><?php echo $user['rolename'] ?></td>
      <td class="user-img"><img src="../img/<?php echo $user['image'] ?>" alt="user image" class="img-thumbnail "> </td>
      <td><a href="user-show.php?cid= <?php echo $user['id'] ?>" class="btn btn-primary mr-2">Edit</a><a href="user-delete.php?cid=<?php echo $user['id'] ?>" class="btn btn-danger">Delete</a></td>
    </tr>
    <?php endwhile; ?>
  </tbody>
  </table>
</div>
</body>
<script type="text/javascript" src="../js/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.bundle.min.js"></script>
</html>
