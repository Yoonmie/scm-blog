<?php
session_start();
if($_SESSION['row']=="")
{
  header("Location: login.php");
}
else{
  if($_SESSION['row']!=1) {
    header("Location:post-list.php");
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/style.css">
  <title>Post-List | Blog</title>
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
          <a class="nav-link" href="user-list.php">User List <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#"><?php echo $_SESSION['row']?></a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Welcome <?php echo $_SESSION['username']?> !</a>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <a href="logout.php" class="btn btn-danger" >Log-Out</a>
      </form>
    </div>
  </nav>
<!--nav--->
<div class="container col-lg-10 col-sm-12 col-12">
<form action="search-post.php" method="POST">
  <div class="input-group add-list mb-5">
    <input type="text" class="form-control" placeholder="Search this blog" name="searchtext">
    <div class="input-group-append">
      <button class="btn btn-info" type="submit"><i class="fa fa-search"></i></button>
    </div>
    <a href="post-create.php" class="btn btn-info search offset-1">Add Post</a>
  </div>
</form>
  <!---add post list--->
  <?php 
    require('../connect.php');
    $userid=$_SESSION['userid'];
    $post_select = mysqli_query($db, "SELECT posts.*,users.id AS userid, users.name, users.image AS userimg FROM posts LEFT JOIN users ON posts.user_id=users.id ORDER BY updated_date_time DESC"); 
    while($post = mysqli_fetch_assoc($post_select)): 
    $postid= $post['id'];
  ?> 
<form action="index.php" method="POST">
  <div class="card border mb-5">
    <div class="card-header bg-light"> 
      <img src="../img/<?php echo $post['userimg'] ?>" class="rounded-circle user-pic mr-3" alt="user-pic" style="width:50px; height: 50px;">
      <span class="blog-username"><a href="../post.php?uid=<?php echo $post['userid'] ?>"><?php echo $post['name'] ?></a></span>
      <div class="icn-list clearFix">
        <a href="post-delete.php?postid=<?php echo $post['id'] ?>" class="icn-close"> <i class="fa fa-times" aria-hidden="true"></i> </a>
        <a href="post-show.php?postid=<?php echo $post['id'] ?>" class="icn-edit"> <i class="fa fa-pencil" aria-hidden="true"></i> </a>
      </div>
    </div>
    <!---title--->
    <div class="card-body bg-white border-bottom">
      <div class="row">
        <img src="../img/<?php echo $post['image'] ?>"  class="col-lg-6 col-sm-12 col-12" alt="post-img" style="width:100%; height: auto;">
        <div class="blog-body col-lg-6 col-sm-12 col-12">
          <a href="../post-detail.php?pid=<?php echo $post['id']?>" class="title"><h3 class="mb-3"><?php echo $post['title'] ?></h3></a>
          <p><?php echo $post['body'] ?></p>
        </div>
      </div>
    </div>
    <!--body--->
    <?php 
        require('../connect.php');
          if(isset($_POST['cmt-icn'.$postid])){
            echo $_POST['cmt-icn'.$postid];
            $postcomment= $_POST['cmt'];
            $userid=$_SESSION['userid'];
            $insertcmt = "INSERT INTO comments (user_id, post_id, body) VALUES ('$userid', '$postid', '$postcomment')";
            mysqli_query($db, $insertcmt); 
    }?> <!--comment insert end if-->
  <form method="POST">
    <div class="card-comment p-3 bg-light">
      <span><h5>Comments</h5></span>
      <div class="input-group mb-3">
        <textarea name="cmt" id="comment" rows="1"></textarea>
        <button class="btn cmt-icn" name="cmt-icn<?php echo $postid ?>" type="submit"><i class="fa fa-paper-plane arrow-icn" aria-hidden="true" id="arrow-icn"></i></button>
      </div>
      
      <div class="overflow-auto">

      <?php
        $cmtselect = mysqli_query($db, "SELECT comments.*,users.name, users.image AS userimg from comments join users on users.id=comments.user_id join posts on posts.id=comments.post_id ORDER BY comments.updated_date_time DESC");
        while($cmt=mysqli_fetch_assoc($cmtselect)):
         if($cmt['post_id']==$post['id']):
      ?>

        <div class="form-group border comment-session p-2">
          <img src="../img/<?php echo $cmt['userimg']?>" class="rounded-circle user-pic mr-1" alt="user-pic" style="width:30px; height: 30px;">
          <span><a href="#"><?php echo $cmt['name']?></a></span>
          <p class="ml-5"><?php echo $cmt['body']?></p> 
        </div>
        <?php endif;  endwhile;?> <!--comment if and comment while loop end-->
      </div>
      </form>
    </div>
    <!--comment--->
  </div>
   <?php endwhile; ?> <!--post select while loop end -->
    <!--card--->
    </form>
</div>
<!---container--->
</body>
<script type="text/javascript" src="../js/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.bundle.min.js"></script>
</html>
