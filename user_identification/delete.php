<?php

include 'database.php';
if(isset($_GET['id']))
{
// $delete_id = $_GET['delete_id'];
$sql = "DELETE FROM registration WHERE `registration`.`id` = ".$_GET['id'];

$mysqli->query($sql);
	 echo 'Deleted successfully.';
}

// $result = mysqli_query($conn,$sql);

// if($result){
//     header("Location: dashboard.php.?msg=Record delete");

// }else{
//     echo "Failed:" . mysqli_error($conn);
// }




?>