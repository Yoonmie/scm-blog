<?php
session_start();
require('connect.php');
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
  <title>Home Page</title>
</head>
<body id="home">
<form action="post.php" method="post">
  <nav class="navbar navbar-expand-lg navbar-light fixed-top bg-light">
    <a class="navbar-brand" href="#">Navbar</a>
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
        <a href="admin/logout.php" class="btn btn-primary">Logout</a>
      </form>
    </div>
  </nav>
<!--nav--->
<div class="container col-lg-10 col-sm-12 col-12 main">
  <div class="input-group add-list mt-5">
    <input type="text" class="form-control" placeholder="Search this blog">
    <div class="input-group-append">
      <button class="btn btn-info" type="button">
        <i class="fa fa-search"></i>
      </button>
    </div>
    <a href="admin/post-create.php" class="btn btn-info search offset-1">Add Post</a>
  </div>
<!---search and add post list--->

  <?php 
    require('connect.php');
    $userid=$_GET['uid'];
    $post_result = mysqli_query($db, "SELECT posts.*,users.name FROM posts LEFT JOIN users ON posts.user_id=users.id WHERE posts.user_id=$userid ORDER BY updated_date_time DESC"); 
    while($postrow = mysqli_fetch_assoc($post_result)): 
    $postid= $postrow['id'];
    ?> 
     <table class="border rounded-lg col-12 mt-5 table">
      <tr class="blog-ttl">
        <th class="bg-light">
          <img src="img/bnr-2.JPG" class="rounded-circle user-pic mr-3" alt="user-pic" style="width:50px; height: 50px;">
          <span class="username-ttl"><a href="post.php?uid=<?php echo $postrow['user_id']?>"><?php echo $postrow['name']?></a></span>
        </th>
      </tr>
      <tr>
        <td class="form-group blog-body">
          <div class="row">
            <img src="img/bnr-2.JPG"  class="col-lg-6 col-sm-12 col-12" alt="post-img" style="width:100%; height: auto;">
            <div class="bodylist col-lg-6 col-sm-12 col-12">
            <h3><?php echo $postrow['title']?></h3>
            <p><?php echo $postrow['body']?></p>
            </div>
          </div>
        </td>
      </tr>
      <tr> 
        <td>
        <form method="POST">
        <span><h5>Comments</h5></span>

        <?php 
        require('connect.php');
          if(isset($_POST['cmt-icn'.$postid])){
            echo $_POST['cmt-icn'.$postid];
            $postcomment= $_POST['cmt'];
            $userid=$_SESSION['userid'];
            $insertcmt = "INSERT INTO comments (user_id, post_id, body) VALUES ('$userid', '$postid', '$postcomment')";
            mysqli_query($db, $insertcmt); 
        }?>
      <div class="overflow-auto">
        <?php
        $cmtselect = mysqli_query($db, "SELECT comments.*,users.name from comments join users on users.id=comments.user_id join posts on posts.id=comments.post_id ORDER BY comments.updated_date_time DESC");
        while($cmtrow=mysqli_fetch_assoc($cmtselect)):
         if($cmtrow['post_id']==$postrow['id']){?>
          <div class="form-group border comment-session pl-3">
            <img src="img/bnr-2.JPG" class="rounded-circle user-pic mr-1 mt-2" alt="user-pic" style="width:30px; height: 30px;">
            <span><a href="#"><?php echo $cmtrow['name']?></a></span>
            <p class="ml-5"><?php  print_r($cmtrow['body']);?></p> 
            </div>
        <?php }
        endwhile; ?>
        </div>
     </form>
        </td> 
      </tr>
      </table>
      <?php endwhile; ?>
      <!--table--> 
</div> 
  


  
</form>
</body>
<script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
</html>