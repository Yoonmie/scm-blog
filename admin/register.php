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
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <title>User Registraton Form</title>
</head>
<body id="reg" class="bg-light">

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
  <form action="user-create.php" method="post" enctype="multipart/form-data">
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
       <label for="password" class="col-4">Role</label>
      </div>
      <div class="col-7">

        <?php
          require ('../connect.php');
          $roleresult=mysqli_query($db,"SELECT * FROM role") ;
        ?>
        
        <select class="form-select" aria-label="Default select example" name="role" style="width: 100%; border:lightgray thin solid;outline:none;">
        <?php while($role=mysqli_fetch_assoc($roleresult)):?>
          <option value="<?php echo $role['id']?>" ><?php echo $role['name']?></option>
        <?php endwhile; ?>
        </select>
      </div>
    </div>
    <div class="form-group row offset-1">
      <div class="col-3">
       <label for="email" class="col-4">email</label>
      </div>
      <div class="col-7">
        <input type="email" name="email" class="form-control">
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
    <div class="form-group row offset-1">
      <div class="col-3">
       <label for="image" class="col-4">Image</label>
      </div>
      <div class="col-7">
        <input type="file" name="image">
      </div>
    </div>
      <button class="btn btn-primary offset-5" name="btn-reg">Register</button>
  </form>
</div>
 
</body>
<script type="text/javascript" src="../js/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.bundle.min.js"></script>
</html>