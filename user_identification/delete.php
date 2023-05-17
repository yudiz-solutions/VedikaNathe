<?php

include 'database.php';
if(isset($_GET['id']))
{
// $delete_id = $_GET['delete_id'];
$id = $_GET['id'];
$sql = "DELETE FROM registration WHERE `registration`.`id` = $id";

$delete = mysqli_query($conn,$sql);
if($delete){
    echo 'Deleted successfully';
}else{
    echo 'error';
}

// $mysqli->query($sql);
// if($mysqli){
// echo 'Deleted Successfully';
// }else{
//         echo 'error';
// }
// if($result){
//     header("Location: dashboard.php.?msg=Record delete");

// }else{
//     echo "Failed:" . mysqli_error($conn);
// }
}




?>