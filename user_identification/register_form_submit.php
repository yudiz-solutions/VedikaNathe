<?php
include 'database.php';

include 'validation.php';

// ====form 

    $firstname = $_POST['firstname'];
    $username = $_POST['username'];
    $lastname = $_POST['lastname'];

    // $password = $_POST['password'];
    $password  = password_hash($_POST['password'], PASSWORD_DEFAULT);
    // $confirm_password = $_POST['confirm_password'];
    $email = $_POST['email'];
    $dob = $_POST["dob"];
    $hobby = $_POST["hobby"];
    $hobby_temp = implode(',', $hobby);
    $gender = $_POST["gender"];
    $country = $_POST["country"];
    $message = $_POST["message"];

    $profile_image = $_FILES['profile_image']['name'];
    $image_tmp = $_FILES['profile_image']['tmp_name'];
    $file = "uploads/" . $profile_image;

    move_uploaded_file($image_tmp, $file);

    $sql = "INSERT INTO `registration` (`id`, `firstname`, `username`, `lastname`, `email`, `password`, `dob`, `hobby`, `gender`, `country`, `message`, `profile_image`) 
        VALUES (NULL, '$firstname', '$username', '$lastname', '$email', '$password', '$dob', '$hobby_temp', '$gender', '$country', '$message', '$file')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo  "Data Added Successfully";
        // header('location : login.php');
    }else{
        echo 'error';
    }
?>