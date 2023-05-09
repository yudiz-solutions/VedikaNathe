<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once 'db_post_form.php';

// if(isset($_GET['post_id'])){
    $id = $_GET['post_id'];

    $sql = "SELECT * FROM posts WHERE Id = $id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $post = $row['post'];
        $caption = $row['caption'];
        $hashtag = $row['hashtag'];

        if(isset($_POST['update'])) {
            $post = $_POST['post'];
            $caption = $_POST['caption'];
            $hashtag = $_POST['hashtag'];

            $sql = "UPDATE posts SET post='$post', caption='$caption', hashtag='$hashtag' WHERE Id=$id";
            mysqli_query($conn, $sql);

            header("Location: post_show.php?id=".$row['user_id']);
            exit();
        }

    } else {
        echo "No post found";
        exit();
    }
// }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Post</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="js/main.js"></script>
</head>
<body>
    <div class="container">
        
        <h1>Edit Post</h1>
        <form method="POST" >
            <div class="form-group">
                <label for="post">Post</label>
                <input type="file" class="form-control-file" id="post" name="post"/>

                <img src="<?= $post ?>" alt="post" height="100" width="200px"/>
                
            </div>
          
            <div class="form-group">
               <label for="caption">Caption</label>
               <input type="text" class="form-control" id="caption" name="caption" value="<?= $caption ?>" required/>
           </div>
           <div class="form-group">
               <label for="hashtag">Hashtag</label>
               <input type="text" class="form-control" id="hashtag" name="hashtag" value="<?= $hashtag ?>" required/>
           </div>
            <button type="submit" name="update" class="btn btn-primary">Update</button>
            <a href="post_show.php?id=<?= $row['user_id'] ?>" class="btn btn-danger">Cancel</a>
        </form>
    </div>
</body>
</html>
