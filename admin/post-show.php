<?php 
require('../connect.php');
session_start();
$post_id=$_GET['postid'];
echo $post_id.$_SESSION['row'];
$postselect=mysqli_query($db,"SELECT * FROM posts WHERE id=$post_id");
$post=mysqli_fetch_assoc($postselect);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/light/all.min.css" />
  <link rel="stylesheet" href="../css/style.css">
  <title>Create Post</title>
</head>
<body id="post-show">
  <div class="container col-10 col-lg-8 col-sm-10 border">
    <form action="post-edit.php" method="POST" enctype="multipart/form-data">
        <h4 class="text-center mt-5 mb-5">Update post</h4>
        <div class="row">
        <div class="col-8">
            <div class="form-group">
                <input type="hidden" name="postid" value="<?php echo $post_id ?>">
                <input type="text" class="form-control" name="title" value="<?php echo $post['title'] ?>">
            </div>
            <textarea id="editor" name="body" cols="97" rows="5" class="mb-3"><?php echo $post['body'] ?></textarea>
            <div class="form-group">
                <input type="file" name="image">
            </div>
        </div>
        <div class="col-4">
          <img src="../img/<?php echo $post['image'] ?>" alt="post image" class="show-image">
        </div>
       
        <div class="form-group mt-4 mb-5 btn-list">
          <button class="btn btn-primary" type="submit">Update</button>
          <a href="user-list.php" type="cancel" class="btn btn-danger">Cancel</a>
        </div>
        </div>
    </form>
</div>

</body>

<script>
    $(function () {
        $("#editor").shieldEditor({
            height: 260
        });
    })
</script>
<script type="text/javascript" src="../js/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="http://www.shieldui.com/shared/components/latest/js/shieldui-all.min.js"></script>
</html>