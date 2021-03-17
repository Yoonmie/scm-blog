<?php
require('../connect.php');
session_start();
$id="";
$errorMessage="";
$select=mysqli_query($db,"SELECT * FROM users");

if(isset($_POST['btnlogin'])) {
  $email=$_POST['email'];
  $password =$_POST['pw'];

  if($email!=null && $password!=null)
  {
    while($row=mysqli_fetch_assoc($select)){
      if($email==$row['email'] && $password==$row['password'])
      {
        $_SESSION['login']=true;
        $_SESSION['userid']=$row['id'];
        $_SESSION['username']=$row['name'];
        header("Location:post-list.php");
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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <title>Log In Form</title>
  <style>
  </style>
</head>
<body class="bg-light">

<div class="container rounded-lg col-lg-6  col-sm-10  col-10 mt-5">
<?php if(isset($_POST['btnlogin'])) { ?>
  <div class="alert alert-danger">
    <?php echo $errorMessage;?>
  </div>
<?php }?>
  <form action="login.php" method="post">
  <div class="form-group mt-3">
    <label for="email">Email address</label>
    <input type="email" class="form-control form-control-sm col-12" name="email" id="email" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control form-control-sm col12" name="pw" id="password">
  </div>
  <button type="submit" class="btn btn-info col-12 mt-3 mb-3 " name="btnlogin">Log In</button>
  </form>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</html>