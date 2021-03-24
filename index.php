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
    <a href="post-create.php" class="btn btn-info search offset-1">Add Post</a>
  </div>
  <!---add post list--->
  <div class="card border">
    <div class="card-header bg-light"> 
      <img src="img/bnr-2.JPG" class="rounded-circle user-pic mr-3" alt="user-pic" style="width:50px; height: 50px;">
      <span class="blog-username"><a href="">USERNAME</a></span>
      <div class="icn-list clearFix">
        <a href="post-delete.php?postid=<?php echo $postrow['id'] ?>" class="icn-close"> <i class="fa fa-times" aria-hidden="true"></i> </a>
        <a href="post-show.php?postid=<?php echo $postrow['id'] ?>" class="icn-edit"> <i class="fa fa-pencil" aria-hidden="true"></i> </a>
      </div>
    </div>
    <!---title--->
    <div class="card-body bg-white">
      <div class="row">
        <img src="img/bnr-2.JPG"  class="col-lg-6 col-sm-12 col-12" alt="post-img" style="width:100%; height: auto;">
        <div class="blog-body col-lg-6 col-sm-12 col-12">
          <h3>TITLE</h3>
          <p>BODy</p>
        </div>
      </div>
    </div>
    <!--body--->
    <div class="card-comment p-3 bg-light">
      <span><h5>Comments</h5></span>
      <div class="input-group mb-3">
        <textarea name="cmt" id="comment" rows="1"></textarea>
        <button class="btn cmt-icn" name="cmt-icn<?php echo $postid ?>" type="submit"><i class="fa fa-paper-plane arrow-icn" aria-hidden="true" id="arrow-icn"></i></button>
      </div>
      <div class="overflow-auto">
        <div class="form-group border comment-session p-2">
          <img src="img/bnr-2.JPG" class="rounded-circle user-pic mr-1" alt="user-pic" style="width:30px; height: 30px;">
          <span><a href="#">Username</a></span>
          <p class="ml-5">Reply</p> 
        </div>
      </div>
    </div>
    <!--comment--->
  </div>
    <!--card--->
</div>
<!---container--->
</body>
<script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
</html>
