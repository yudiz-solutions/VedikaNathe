<?php

require 'db_post_form.php';

$id = $_GET['id'];
$sql = "DELETE FROM `userdata` WHERE `userdata`.`id` = $id";

$result = mysqli_query($conn,$sql);


if ($result) {
    header("Location: display_post.php?msg=Record delete successfully");

}else{
    echo "Failed:" . mysqli_error($conn);
}
?>