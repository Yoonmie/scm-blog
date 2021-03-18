<?php
  require ('../connect.php');
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <title>User Registraton Form</title>
</head>
<body class="bg-light">

<div class="container col-lg-8 col-sm-10 col-10 mt-3">
<?php
  if(isset($_REQUEST['status'])){
  $status=$_REQUEST['status'];
    if($status==1){
    echo "<div class='alert alert-success'>User Registration Success!</div>";
    }elseif($status==2){
    echo "<div class='alert alert-success'>User Updated Successfully!</div>";
    }elseif($status==3){
    echo "<div class='alert alert-danger'>User Deleted Successfully!</div>";
    }else{
      echo "<div class='alert alert-danger'>Please Fill the forms.</div>";
    }
  }
?>
  <form action="user-create.php" method="post">
    <h1 class="text-center mb-3">User Registration Form</h1>
    <div class="form-group row offset-1">
      <div class="col-3">
       <label for="name" class="col-4">Name</label>
      </div>
      <div class="col-7">
        <input type="text" name="name" class="form-control">
      </div>
    </div>
    <div class="form-group row offset-1">
      <div class="col-3">
       <label for="email" class="col-4">email</label>
      </div>
      <div class="col-7">
        <input type="text" name="email" class="form-control">
      </div>
    </div>
    <div class="form-group row offset-1">
      <div class="col-3">
       <label for="password" class="col-4">Password</label>
      </div>
      <div class="col-7">
        <input type="text" name="password" class="form-control">
      </div>
    </div>
      <button class="btn btn-primary offset-5" name="btn-reg">Register</button>
  </form>
<table class="table border table-striped mt-4">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Password</th>
      <th scope="col">Time</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
  <?php 
    require('../connect.php');
    $select=mysqli_query($db,"SELECT * FROM users");
    while($row=mysqli_fetch_assoc($select)):
  ?>
    <tr>
      <th scope="row"><?php echo $row['id'] ?></th>
      <td><?php echo $row['name'] ?></td>
      <td><?php echo $row['email'] ?></td>
      <td><?php echo $row['password'] ?></td>
      <td><?php echo $row['created_date_time'] ?></td>
      <td><a href="user-show.php?cid=<?php echo $row['id'] ?>" class="btn btn-primary mr-2">Edit</a><a href="user-delete.php?cid=<?php echo $row['id'] ?>" class="btn btn-danger">Delete</a></td>
    </tr>
    <?php endwhile; ?>
  </tbody>
</table>
</div>
 
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</html>