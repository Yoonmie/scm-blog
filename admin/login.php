<?php
require('../connect.php');
session_start();
$errorMessage="";
$userselect=mysqli_query($db,"SELECT * FROM users");

if(isset($_POST['btnlogin'])) {
  $email=$_POST['email'];
  $password =$_POST['pw'];

  if($email!=null && $password!=null)
  {
      while($user=mysqli_fetch_assoc($userselect)){
        if($email==$user['email'] && $password==$user['password'])
        {
          $_SESSION['row']=$user['role_id'];
          $_SESSION['userid']=$user['id'];
          $_SESSION['username']=$user['name'];
          if($_SESSION['row']==1){
            header("Location:index.php");
          }
          else {
            header("Location:post-list.php");
          }
        } 
        else{
          $errorMessage='LogIn Failed';
        }
      }
  }
  else{
    $errorMessage='Please Enter UserName and Password';
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <title>Log In Form</title>
  <style>
  </style>
</head>
<body class="bg-light">

<div class="container rounded-lg col-lg-6  col-sm-10  col-10 mt-5">
<?php if(isset($_POST['btnlogin'])):?>
  <div class="alert alert-danger">
    <?php echo $errorMessage;?>
  </div>
<?php endif; ?>
  <form action="login.php" method="post">
  <div class="form-group mt-3">
    <label for="email">Email address</label>
    <input type="email" class="form-control form-control-sm col-12" name="email" id="email" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control form-control-sm col12" name="pw" id="password">
  </div>
  <a href="register.php">Register</a>
  <button type="submit" class="btn btn-info col-12 mt-3 mb-3 " name="btnlogin">Log In</button>
  </form>
</div>
</body>
<script type="text/javascript" src="../js/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.bundle.min.js"></script>
</html>