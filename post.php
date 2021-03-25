<?php
session_start();
$row="";$username="";
if(isset($_SESSION['row']) && isset($_SESSION['username'])){
  $row=$_SESSION['row'];
  $username=$_SESSION['username'];
}
else {
  $row="Position";
  $username="User Name";
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
  <title>Post | Blog</title>
</head>
<body id="post">
<nav class="navbar navbar-expand-lg navbar-light fixed-top bg-light">
    <a class="navbar-brand" href="post-list.php">BLOG</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><?php echo $row?></a>
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
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Welcome <?php echo $username?> !</a>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <a href="admin/logout.php" class="btn btn-info" >Log-Out</a>
      </form>
    </div>
  </nav>
<!--nav--->
<div class="container col-lg-10 col-sm-12 col-12">
<form action="post.php" method="POST">
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
    $userid=$_GET['uid']; //userid from url link(username from post)
    $post_result = mysqli_query($db, "SELECT posts.*,users.name , users.image AS userimg FROM posts LEFT JOIN users ON posts.user_id=users.id WHERE posts.user_id=$userid ORDER BY updated_date_time DESC"); 
    while($post = mysqli_fetch_assoc($post_result)): 
    $postid= $post['id'];
  ?> 
  <div class="card border mb-5">
    <div class="card-header bg-light"> 
      <img src="img/<?php echo $post['userimg'] ?>" class="rounded-circle user-pic mr-3" alt="user-pic" style="width:50px; height: 50px;">
      <span class="blog-username"><a href=""><?php echo $post['name'] ?></a></span>
      <div class="icn-list clearFix"

      <?php 
        if(isset($_SESSION['userid'])){
            $uid=$_SESSION['userid']; //userid from session(login)
              if($row!=1):

                if($uid!=$post['user_id']) : ?>
                  style="display: none;"
                  <?php endif; //if loop for checking edit and delete btn

              endif;//if loop for checking row is admin or author

        }//if loop for checking session userid(login)

        else {?>
          style="display: none;"
       <?php } ?> > <!--else looping for not having session userid(login)-->

        <a href="post-delete.php?postid=<?php echo $post['id'] ?>" class="icn-close"> <i class="fa fa-times" aria-hidden="true"></i> </a>
        <a href="post-show.php?postid=<?php echo $post['id'] ?>" class="icn-edit"> <i class="fa fa-pencil" aria-hidden="true"></i> </a>
      </div>
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
    <?php 
        require('connect.php');
          if(isset($_POST['cmt-icn'.$postid])){
            echo $_POST['cmt-icn'.$postid];
            $postcomment= $_POST['cmt'];
            $uid=$_SESSION['userid'];
            echo $uid,",",$postcomment;
            // $insertcmt = "INSERT INTO comments (user_id, post_id, body) VALUES ('$uid', '$postid', '$postcomment')";
            // mysqli_query($db, $insertcmt); 
        }?> <!--comment insert end if-->
    <div class="card-comment p-3 bg-light">
      <span><h5>Comments</h5></span>
      <div class="input-group mb-3"
      <?php 
          if(!isset($_SESSION['userid'])) { ?>
          style="display: none;"
          <?php }
      ?> >
        <textarea name="cmt" id="comment" rows="1"></textarea>
        <button class="btn cmt-icn" name="cmt-icn<?php echo $postid ?>" type="submit"><i class="fa fa-paper-plane arrow-icn" aria-hidden="true" id="arrow-icn"></i></button>
      </div>
      <!--comment textbox-->
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
