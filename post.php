<?php
session_start();
require('connect.php');
if($_SESSION['login']==false)
{
  header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css"/>
  <title>Home Page</title>
</head>
<body id="home">
<form action="post.php" method="post">
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
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
<div class="container border col-lg-10 col-sm-12 col-12 main">
  <div class="input-group add-list mt-5">
    <input type="text" class="form-control" placeholder="Search this blog">
    <div class="input-group-append">
      <button class="btn btn-info" type="button">
        <i class="fa fa-search"></i>
      </button>
    </div>
    <a href="admin/post-create.php" class="btn btn-info search offset-1">Add Post</a>
  </div>
<!---add post list--->

  <?php 
    require('connect.php');
    $userid=$_SESSION['userid'];
    $post_result = mysqli_query($db, "SELECT posts.*,users.name FROM posts LEFT JOIN users ON posts.user_id=users.id"); 
    while($postrow = mysqli_fetch_assoc($post_result)): 
    $postid= $postrow['id'];
    ?> 
     <table class="border rounded-lg col-12 mt-5 table">
      <tr class="blog-ttl">
        <th class="bg-light">
          <h3 class="ttl-name"><?php echo $postrow['title']?></h3> <h5>published by <?php echo $postrow['name']?></h5>
          <span class="icn-list clearFix" 
          <?php 
             if($userid!=$postrow['user_id']) { ?>
             style="display: none;"
            <?php }
          ?>>
          <a href="#" class="icn-close"> <i class="fa fa-times" aria-hidden="true"></i> </a>
          <a href="admin/post-show.php?postid=<?php echo $postrow['id'] ?>" class="icn-edit"> <i class="fa fa-pencil" aria-hidden="true"></i> </a>
          </span>
        </th>
      </tr>
      <tr><td><p><?php echo $postrow['body'] ,$_SESSION['username'],$_SESSION['userid']?></p></td></tr>
      <tr> 
        <td>
        <form method="POST">
        <div class="input-group mb-3 text-area">
          <textarea name="cmt" id="comment" rows="1"></textarea>
          <button class="btn cmt-icn" name="cmt-icn<?php echo $postid ?>" type="submit"><i class="fa fa-paper-plane arrow-icn" aria-hidden="true"></i></button>
          <!-- <a href="#" class="cmt-icn" name="cmt-icn?php echo $postid ?>"><i class="fa fa-paper-plane" aria-hidden="true"></i></a> -->
        </div>

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
        $cmtselect = mysqli_query($db, "SELECT comments.*,users.name from comments join users on users.id=comments.user_id join posts on posts.id=comments.post_id");
        while($cmtrow=mysqli_fetch_assoc($cmtselect)):
         if($cmtrow['post_id']==$postrow['id']){?>
          <div class="form-group border comment-session">
            <a href="#"> <?php echo $cmtrow['name'];?></a>
            <p><?php  print_r($cmtrow['body']);?></p> 
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
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</html>