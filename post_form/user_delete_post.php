<?php
require_once 'db_post_form.php';

    // $id = isset($_GET['post_id']);
    $id = $_GET['post_id'];
    // $viewid=($_GET['viewid']);

    $sql = "DELETE FROM posts WHERE `posts`.`Id` = $id";

    $query_run = mysqli_query($conn, $sql);
    //  die($query_run);
    if ($query_run) {
        header("Location: post_show.php?id=".$id);
        // echo "hello";
        exit();
    } else {
        echo "Error deleting the post";
    }

?>
