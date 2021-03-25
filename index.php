<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <title>Index | BLOG </title>
</head>
<body id="post">
<nav class="navbar navbar-expand-lg navbar-light fixed-top bg-light">
    <a class="navbar-brand" href="index.php">BLOG</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Dropdown
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <a href="admin/login.php" class="btn btn-info" >Log-In</a>
      </form>
    </div>
  </nav>
<!--nav--->
<div class="container col-lg-10 col-sm-12 col-12">
  <div class="input-group add-list mb-5">
    <input type="text" class="form-control" placeholder="Search this blog">
    <div class="input-group-append">
      <button class="btn btn-info" type="button"><i class="fa fa-search"></i></button>
    </div>
    <a href="admin/post-create.php" class="btn btn-info search offset-1">Add Post</a>
  </div>
  <!---add post list--->
  <?php 
    require('connect.php');
    $post_select = mysqli_query($db, "SELECT posts.*,users.name,users.id AS userid, users.image AS userimg FROM posts LEFT JOIN users ON posts.user_id=users.id ORDER BY updated_date_time DESC"); 
    while($post = mysqli_fetch_assoc($post_select)): 
    $postid= $post['id'];
  ?> 
  <div class="card border mb-5">
    <div class="card-header bg-light"> 
      <img src="img/<?php echo $post['userimg'] ?>" class="rounded-circle user-pic mr-3" alt="user-pic" style="width:50px; height: 50px;">
      <span class="blog-username"><a href="post.php?uid=<?php echo $post['userid'] ?>"><?php echo $post['name'] ?></a></span>
     
    </div>
    <!---title--->
    <div class="card-body bg-white">
      <div class="row">
        <img src="img/<?php echo $post['image'] ?>"  class="col-lg-6 col-sm-12 col-12" alt="post-img" style="width:100%; height: auto;">
        <div class="blog-body col-lg-6 col-sm-12 col-12">
          <h3 class="mb-3"><?php echo $post['title'] ?></h3>
          <p><?php echo $post['body'] ?></p>
        </div>
      </div>
    </div>
    <!--body--->
  
    <div class="card-comment p-3 bg-light">
      <span><h5>Comments</h5></span>
      

      <form method="POST">
      <div class="overflow-auto">
        
      <?php
        $cmtselect = mysqli_query($db, "SELECT comments.*,users.name, users.image AS userimg from comments join users on users.id=comments.user_id join posts on posts.id=comments.post_id ORDER BY comments.updated_date_time DESC");
        while($cmt=mysqli_fetch_assoc($cmtselect)):
         if($cmt['post_id']==$post['id']):
      ?>

        <div class="form-group border comment-session p-2">
          <img src="img/<?php echo $cmt['userimg']?>" class="rounded-circle user-pic mr-1" alt="user-pic" style="width:30px; height: 30px;">
          <span><a href="#"><?php echo $cmt['name']?></a></span>
          <p class="ml-5"><?php echo $cmt['body']?></p> 
        </div>
        <?php endif;  endwhile;?> <!--comment if and comment while loop end-->
      </div>
      </form>
    </div>
    <!--comment--->
  </div>
  <?php endwhile; ?><!--post select while loop end -->
    <!--card--->
    </form>
</div>
<!---container--->
</body>
<script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
</html>
