<?php
include 'database.php';

$result = array();

$first_name = isset($_POST['first_name']) ? $_POST['first_name'] : '';

$last_name = isset($_POST['last_name']) ? $_POST['last_name'] : '';

$email = isset($_POST['email']) ? $_POST['email'] : '';

$msg = isset($_POST['message']) ? $_POST['message'] : '';

$file = isset($_FILES['file']['name']) ? $_FILES['file']['name'] : '';
$file_tmp = isset($_FILES['file']['tmp_name']) ? $_FILES['file']['tmp_name'] : '';
$folder = '';
if(!empty($file_tmp)){
    $folder = "uploads/". $file;
    move_uploaded_file($file_tmp,$folder);
}

$has_error = false;

if(empty($first_name)){
    $has_error = true;
    $result['first_name'][] = 'Please enter first name';
}

if(empty($last_name)){
    $has_error = true;
    $result['last_name'][] = 'Please enter last name';
}

if(empty($email)){
    $has_error = true;
    $result['email'][] = 'Please enter email name';
}

if(empty($msg)){
    $has_error = true;
    $result['msg'][] = 'Please enter msg name';
}

if(!$has_error){
    $sql = "INSERT INTO `post` (`id`, `first_name`, `last_name`, `email`, `msg`, `file`) VALUES (NULL, '$first_name', '$last_name', '$email', '$msg', '$folder')";

    $query_result = mysqli_query($conn,$sql);
    if($query_result){
        $result['status'] = 1;
    }else{
        $result[''][] = 'Error';
    }
    echo json_encode($result);
}
?>
