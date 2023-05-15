<?php

include 'database.php';

$delete_id = $_GET['delete_id'];
$sql = "DELETE FROM registration WHERE `registration`.`id` = $delete_id";

$result = mysqli_query($conn,$sql);

if($result){
    header("Location: dashboard.php.?msg=Record delete");

}else{
    echo "Failed:" . mysqli_error($conn);
}




?>