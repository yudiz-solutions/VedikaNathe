<?php

include 'database.php';
if(isset($_GET['id']))
{

$id = $_GET['id'];
$sql = "DELETE FROM registration WHERE `registration`.`id` = $id";

$delete = mysqli_query($conn,$sql);
if($delete){
    echo 'Deleted successfully';
}else{
    echo 'error';
}

}

?>