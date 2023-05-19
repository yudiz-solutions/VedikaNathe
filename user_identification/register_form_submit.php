<?php
include 'database.php';

// include 'validation.php';


$result  = array();

    $firstname = isset($_POST['firstname']) ? $_POST['firstname'] : '';

    $username = isset($_POST['username']) ? $_POST['username'] :'';

    $lastname = isset($_POST['lastname']) ? $_POST['lastname'] : '';

    $password  = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $confirm_password = $_POST['confirm_password'];

    $email = isset($_POST['email']) ? $_POST['email'] : '';

    $dob = isset($_POST["dob"]) ? $_POST["dob"] : '';

    $hobby_temp = isset($_POST["hobby"]) ?rtrim( $_POST["hobby"],',') : '';
    //$hobby_temp = implode(',', $hobby);

    $gender = isset($_POST["gender"]) ? $_POST["gender"] : '';

    $country = isset($_POST["country"]) ? $_POST["country"] : '';

    $message = isset($_POST["message"]) ? $_POST["message"] : '';

    $profile_image = isset($_FILES['profile_image']['name']) ? $_FILES['profile_image']['name'] : '';
    $image_tmp = isset($_FILES['profile_image']['tmp_name']) ? $_FILES['profile_image']['tmp_name'] :'';
    $file = '';
    if( !empty($image_tmp)){
        $file = "uploads/" . $profile_image;
        move_uploaded_file($image_tmp, $file);        
    }

    $has_error = false;

    if( empty($firstname)){
        $has_error = true;
        $result['firstname'][] = 'Please enter first name';
    }

    if( empty($lastname)){
        $has_error = true;
        $result['lastname'][] = 'Please enter last name';
    }
    if( empty($email)){
        $has_error = true;
        $result['email'][] = 'Please enter email';
    }
    if( empty($username)){
        $has_error = true;
        $result['username'][] = 'Please enter username';
    }
    if( empty($_POST['password'])){
        $has_error = true;
        $result['password'][] = 'Please enter password';
    }
    if( empty($confirm_password)){
        $has_error = true;
        $result['confirm-password'][] = 'Please enter confirm password';
    }

    if( $_POST['password'] !=  $_POST['confirm_password']){
        $has_error = true; 
        $result['confirm_password'][] = 'Password and confirm password doesnt match';
    }

    if( !$has_error){

        $sql = "INSERT INTO `registration` (`id`, `firstname`, `username`, `lastname`, `email`, `password`, `dob`, `hobby`, `gender`, `country`, `message`, `profile_image`) 
        VALUES (NULL, '$firstname', '$username', '$lastname', '$email', '$password', '$dob', '$hobby_temp', '$gender', '$country', '$message', '$file')";

        $query_result = mysqli_query($conn, $sql);
        if ($query_result) {
            $result['status'] = 1;
            // $result['message'][] = 'Data Added Successfully';
            // header('location : login.php');
        }else{

            $result[''][] = 'Error';           
        }
    }
    echo json_encode($result);

?>