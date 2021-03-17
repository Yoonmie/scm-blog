<?php
  require ('../connect.php');
  $id=$_GET['cid'];
  $select=mysqli_query($db,"SELECT * FROM users WHERE id=$id");
  $row=mysqli_fetch_assoc($select);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <title>Document</title>
</head>
<body class="bg-light">
<div class="container col-lg-8 col-sm-10 mt-3">
  <form action="user-edit.php" method="post">
    <h1 class="text-center mb-3">Edit Form</h1>
    <div class="form-group row offset-1">
      <div class="col-3">
       <label for="name" class="col-4">Name</label>
      </div>
      <div class="col-7">
        <input type="text" name="name" class="form-control" value="<?php echo $row['name'] ?>">
      </div>
    </div>

     <div class="form-group row offset-1">
      <div class="col-3">
       <label for="email" class="col-4">email</label>
      </div>
      <div class="col-7">
        <input type="text" name="email" class="form-control" value="<?php echo $row['email'] ?>">
      </div>
     </div>

     <div class="form-group row offset-1">
      <div class="col-3">
       <label for="password" class="col-4">Password</label>
      </div>
      <input type="hidden" name="id" value="<?php echo $id ?>">
      <div class="col-7">
        <input type="text" name="password" class="form-control"  value="<?php echo $row['password'] ?>">
      </div>
     </div>
      <button class="btn btn-primary offset-5" name="btn-edit" type="submit">Update</button>
     <a href="reg.php" type="cancel" class="btn btn-danger">Cancel</a>
  </form>
</div>
 
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</html>