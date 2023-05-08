<?php

require 'db_post_form.php';

if (isset($_POST['update_account'])) {

    $user_id = mysqli_real_escape_string($conn, $_POST['id']);

    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);

    $country = mysqli_real_escape_string($conn, $_POST['country']);

    $state = mysqli_real_escape_string($conn, $_POST['state']);

    $city = mysqli_real_escape_string($conn, $_POST['city']);

    $bio = mysqli_real_escape_string($conn, $_POST['bio']);

    $profile = mysqli_real_escape_string($conn, $_POST['profile']);

    $social_media = mysqli_real_escape_string($conn, $_POST['social_media']);


    $query = "UPDATE `userdata` SET `first_name` = '$first_name', `last_name` = '$last_name', `username` = '$username', `email` = '$email', `password` = '$password', `gender` = '$gender', `country` = '$country', `state` = '$state', `city` = '$city', `bio` = '$bio', `profile` = '$profile', `social_media` = '$social_media' WHERE `userdata`.`id` = 1";


    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        echo "Student Updated Successfully";
        header("Location: display_post.php");
        exit(0);

    } else {
        echo "Student Not Updated";
        

    }

}

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>



    <title>Account Edit</title>
</head>

<body>
    <div class="container mt-5">

        <div class="row">
            <div class="col-md-12">
                <div class="card-header">
                    <h4>Account Edit
                        
                    </h4>
                </div>
            </div class="card-body">
            <?php
            if (isset($_GET['id'])) {

                $user_id = mysqli_real_escape_string($conn, $_GET['id']);

                $query = "SELECT * FROM userdata WHERE id='$user_id' ";

                $query_run = mysqli_query($conn, $query);

                if (mysqli_num_rows($query_run) > 0) {
                    $user = mysqli_fetch_array($query_run);
                    ?>
                    <form action="post.php" method="POST">
                        <input type="hidden" name="id" value="<?= $user['id']; ?>">

                        <div class="mb-3">
                            <label>First Name</label>
                            <input type="text" name="first_name" value="<?= $user['first_name']; ?>" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>Last Name</label>
                            <input type="text" name="last_name" value="<?= $user['last_name']; ?>" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>First Name</label>
                            <input type="text" name="first_name" value="<?= $user['first_name']; ?>" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>UserName</label>
                            <input type="text" name="username" value="<?= $user['username']; ?>" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>Email</label>
                            <input type="email" name="email" value="<?= $user['email']; ?>" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>Password</label>
                            <input type="password" name="password" value="<?= $user['password']; ?>" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>Gender</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" value="male">
                                <label class="form-check-label" for="male">
                                    Male
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" value="female">
                                <label class="form-check-label" for="female">
                                    Female
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" value="other">
                                <label class="form-check-label" for="other">
                                    Other
                                </label>
                            </div>
                        </div>


                        <div class="mb-3">
                            <label>Country</label>
                            <select class="form-select" name="country" id="country">
                                <option selected disabled>Select Country</option>
                                <option value="INDIA">INDIA</option>
                                <option value="USA">USA</option>
                                <option value="Canada">Canada</option>
                                <option value="UK">UK</option>
                                <option value="Australia">Australia</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="city" class="form-label">City</label>
                            <select class="form-select" name="city" id="city">
                                <option selected disabled>Select City</option>

                                <option value="Amravati">Amravati</option>
                                <option value="New York City">New York City</option>
                                <option value="Los Angeles">Los Angeles</option>
                                <option value="Houston">Houston</option>
                                <option value="Miami">Miami</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label>Bio</label>
                            <!-- <input type="text" name="first_name" value="<?= $user['first_name']; ?>" class="form-control"> -->
                            <textarea class="form-control" name="bio" id="bio" rows="4"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="profile" class="form-label">Profile Picture</label>
                            <input type="file" name="profile" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="active_social_media" class="form-label">Active Social Media</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="social_media[]" value="instagram"
                                    id="instagram">
                                <label class="form-check-label" for="instagram">
                                    Instagram
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="social_media[]" value="twitter"
                                    id="twitter">
                                <label class="form-check-label" for="twitter">
                                    Twitter
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="social_media[]" value="linkedin"
                                    id="linkedin">
                                <label class="form-check-label" for="linkedin">
                                    LinkedIn
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="social_media[]" value="facebook"
                                    id="facebook">
                                <label class="form-check-label" for="facebook">
                                    Facebook
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="social_media[]" value="whatsapp"
                                    id="whatsapp">
                                <label class="form-check-label" for="whatsapp">
                                    WhatsApp
                                </label>
                            </div>
                        </div>


                        <div class="mb-3">
                            <button type="submit" name="update_account" class="btn btn-primary"><a href="display_post.php" class="text-light" >Update Account</a></button>
                        </div>
                    </form>

                    <?php
                } else {

                    echo "<h4> No such Id found</h4>";
                }
            }
            ?>
        </div>
    </div>
    </div>
</body>
</html>