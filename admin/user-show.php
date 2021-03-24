<?php
  require ('../connect.php');
  $id=$_GET['cid'];
  echo $id;
  $userselect=mysqli_query($db,"SELECT * FROM users WHERE id=$id");
  $row=mysqli_fetch_assoc($userselect);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <title>Document</title>
</head>
<body class="bg-light">
<div class="container col-lg-8 col-sm-10 mt-3">
  <form action="user-edit.php" method="post" enctype="multipart/form-data">
    <h1 class="text-center mb-3">Edit Form</h1>
    <div class="row">
      <div class="col-7">
      <div class="form-group row offset-1">
      <div class="col-3">
       <label for="name" class="col-4">Name</label>
      </div>
      <div class="col-7">
        <input type="text" name="name" class="form-control" value="<?php echo $row['name'] ?>">
      </div>
    </div>
    <?php
       require ('../connect.php');
       $roleresult=mysqli_query($db,"SELECT * FROM role") ;
    ?>
    <select class="form-select" aria-label="Default select example" name="role" style="width: 100%; border:lightgray thin solid;outline:none;">
      <?php while($role=mysqli_fetch_assoc($roleresult)):?>
        <option value="<?php echo $role['id']?>" ><?php echo $role['name']?></option>
      <?php endwhile; ?>
    </select>


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
     <div class="form-group row offset-1">
      <div class="col-3">
       <label for="image" class="col-4">Image</label>
      </div>
      <div class="col-7">
        <input type="file" name="image">
      </div>
    </div>

      </div>
      <div class="col-5 border">
        <img src="../img/<?php echo $row['image'] ?>" alt="user image">
      </div>
    </div>
    <div class="form-group mt-4">
      <button class="btn btn-primary offset-5" type="submit">Update</button>
      <a href="user-list.php" type="cancel" class="btn btn-danger">Cancel</a>
    </div>
      
  </form>
</div>
 
</body>
<script type="text/javascript" src="../js/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.bundle.min.js"></script>
</html>