<?php
include 'database.php';
session_start();

if (!isset($_SESSION['username'])) {
    header("Location:index.php");
    exit;
}


if (isset($_GET['delete_id'])) {
    $post_id = $_GET['delete_id'];
 
    // Delete the post
    $delete_post_sql = "DELETE FROM post WHERE id = $post_id";
    $delete_post_result = mysqli_query($conn, $delete_post_sql);

    // Delete the associated meta data
   

    if ($delete_post_result) {
        echo "Post deleted successfully.";
        header("location:post.php");
       
    } else {
        echo "Failed to delete post.";
    }
}

mysqli_close($conn);
?>
