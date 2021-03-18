<?php 
require('../connect.php');
$post_id=$_GET['postid'];
echo $post_id;
$postselect=mysqli_query($db,"SELECT * FROM posts WHERE id=$post_id");
$row=mysqli_fetch_assoc($postselect);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/light/all.min.css" />
  <link rel="stylesheet" href="../css/style.css">
  <title>Edit Post</title>
</head>
<body id="addpost">
  <div class="container col-10 col-lg-8 col-sm-10 border">
    <form action="post-edit.php" method="POST">
        <h4 class="text-center">Edit Post</h4>
        <div class="col-10 offset-1">
            <div class="form-group">
                <input type="text" class="form-control" name="title" value="<?php echo $row['title'] ?>">
                <input type="hidden" name="postid" value="<?php echo $post_id ?>">
            </div>
            <textarea id="editor" name="body" cols="97" rows="5" class="mb-3"><?php echo $row['body'] ?></textarea>
            <br>
            <div class="form-group row text-center">
            <button class="btn btn-primary offset-3" type="submit">Update</button>
              <a href="post-list.php" type="cancel" class="btn btn-danger offset-3">Cancel</a>
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
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script type="text/javascript" src="http://www.shieldui.com/shared/components/latest/js/shieldui-all.min.js"></script>
</html>