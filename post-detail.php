<?php
session_start();
$role="";$username="";$button="";$url='';
if(isset($_SESSION['username'])){
  $role=$_SESSION['row'];
  $username=$_SESSION['username'];
}
else {
  $role="Position";
  $username="";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <title>Post-Detail | BLOG </title>
</head>
<body id="post">
<nav class="navbar navbar-expand-lg navbar-light fixed-top bg-light">
  <?php
       if(isset($_SESSION['username'])){

        if($role==1){
          echo '<a class="navbar-brand" href="admin/index.php">BLOG</a>';
        }
        else{
          echo '<a class="navbar-brand" href="admin/post-list.php">BLOG</a>';
        }
       }
       else{
        echo '<a class="navbar-brand" href="index.php">BLOG</a>';
       }
    
  ?>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        
        <li class="nav-item">
          <a class="nav-link disabled" href="#"><?php echo $role;?></a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Welcome <?php echo $username; ?> !</a>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0">

        <?php
            if(isset($_SESSION['username'])){
              echo '<a href="admin/logout.php" class="btn btn-danger" >Log-Out</a>';
            }
            else{
              echo '<a href="admin/login.php" class="btn btn-info" >Log-In</a>';
            }
        ?>
     
      </form>
    </div>
  </nav>
<!--nav--->
<div class="container col-lg-10 col-sm-12 col-12">
  
  <?php 
    require('connect.php');
    $pid=$_GET['pid'];
    $post_select = mysqli_query($db, "SELECT posts.*,users.id AS userid, users.name, users.image AS userimg FROM posts LEFT JOIN users ON posts.user_id=users.id WHERE posts.id=$pid");  
    $post=mysqli_fetch_assoc($post_select);
  ?> 

  <div class="card border">
    <div class="card-header bg-light"> 
      <img src="img/<?php echo $post['userimg']?>" class="rounded-circle user-pic mr-3" alt="user-pic" style="width:50px; height: 50px;">
      <span class="blog-username"><a href=""><?php echo $post['name']?></a></span>
    </div>
    <!---title--->
    <div class="card-body bg-white" style="border-bottom: lightgray thin solid;">
      <div class="row">
        <img src="img/<?php echo $post['image']?>"  class="col-lg-6 col-sm-12 col-12" alt="post-img" style="width:100%; height: auto;">
        <div class="blog-body col-lg-6 col-sm-12 col-12">
          <h3><?php echo $post['title']?></h3>
          <p><?php echo $post['body']?></p>
        </div>
      </div>
    </div>
    <!--body--->
    <div class="change-session p-4" class="bg-light"

       <?php
        if(isset($_SESSION['userid'])){
          $uid=$_SESSION['userid']; //userid from session(login)
          $role=$_SESSION['row']; //roleid from session(login)

          if($role!=1) {
            if($uid!=$post['user_id']) {
              echo 'style="display: none;"';
            }
          }
        }
        else{
          echo 'style="display: none;"';
        }
       
       ?>>


      <a href="admin/post-show.php?postid=<?php echo $post['id'] ?>" class="pr-3">Edit Post</a>  |
      <a href="admin/post-delete.php?postid=<?php echo $post['id'] ?>" class="delete-link pl-3">Delete Post</a>
    </div>
    <!--change-session--->
  </div>
    <!--card--->
</div>
<!---container--->
</body>
<script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
</html>

