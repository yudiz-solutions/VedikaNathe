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

$caption = isset($_POST['caption']) ? $_POST['caption'] : '';
$hashtag = isset($_POST['hashtag']) ? $_POST['hashtag'] : '';


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

if(empty($caption)){
    $has_error = true;
    $result['caption'][] = 'Please enter caption name';
}

if(empty($hashtag)){
    $has_error = true;
    $result['hashtag'][] = 'Please enter msg name';
}


// echo "hello";
// die;

if(!$has_error){
    $sql = "INSERT INTO `post` (`id`, `first_name`, `last_name`, `email`, `msg`, `file`) VALUES (NULL, '$first_name', '$last_name', '$email', '$msg', '$folder')";

    // echo "hello";
    // echo $sql;
    // die();
    $query_result = mysqli_query($conn,$sql);
    if($query_result){
        $post_id = mysqli_insert_id($conn);

        // insert additional field into meta_post

        foreach($_POST as $key => $value) {
            if($key !== 'first_name' && $key !== 'last_name' && $key !== 'email' && $key !== 'message' && $key !== 'file') {
                $post_key = mysqli_real_escape_string($conn, $key);
                $post_value = mysqli_real_escape_string($conn, $value);
               $meta_sql = "INSERT INTO `meta_post` (`id`, `post_id`, `meta_key`, `meta_value`) VALUES (NULL, '$post_id', '$post_key', '$post_value')";
            //    echo $meta_sql;
            //    die;
                mysqli_query($conn,$meta_sql);
            }
        }

        $result['status'] = 1;
    }else{
        $result[''][] = 'Error';
    }
    echo json_encode($result);
}
?>