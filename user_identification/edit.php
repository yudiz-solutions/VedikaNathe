<?php

require 'database.php';

if (isset($_POST['update_account'])) {

    $user_id = $_GET['id'];

    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    // $confirm_password = mysqli_real_escape_string($conn, $_POST['conform_password']);

    $dob = mysqli_real_escape_string($conn, $_POST['dob']);

    $hobby_temp = mysqli_real_escape_string($conn, $_POST['hobby']);

    $gender = mysqli_real_escape_string($conn, $_POST['gender']);

    $country = mysqli_real_escape_string($conn, $_POST['country']);

    $message = mysqli_real_escape_string($conn, $_POST['message']);

    // $profile_image = mysqli_real_escape_string($conn, $_POST['$profile_image']);
    $profile_image = $_FILES['profile_image']['name'];
    $image_tmp = $_FILES['profile_image']['tmp_name'];
    $file = "uploads/" . $profile_image;
    move_uploaded_file($image_tmp, $file);



    $query = "UPDATE `registration` SET `firstname` = '$firstname', `username` = '$username', `lastname` = '$lastname', `email` = '$email', `password` = '$password', `dob` = '$dob', `hobby` = '$hobby_temp', `gender` = '$gender', `country` = '$country', `message` = '$message', `profile_image` = '$file' WHERE `registration`.`id` = $user_id";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        echo "Account Updated Successfully";
        header("Location: dashboard.php");
        exit(0);

    } else {
        echo "Account Not Updated";


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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>




    <title>Account Edit</title>
</head>

<body>
    <div class="container mt-5">

        <div class="row">
            <div class="col-md-12">
                <div class="card-header">
                    <h4>Account Ediit
                    </h4>
                </div>
            </div class="card-body">
            <?php
            if (isset($_GET['id'])) {

                $user_id = $_GET['id'];

                $query = "SELECT * FROM registration WHERE id='$user_id' ";

                $query_run = mysqli_query($conn, $query);

                if (mysqli_num_rows($query_run) > 0) {
                    $user = mysqli_fetch_array($query_run);
                    ?>
                    <form method="POST" enctype="multipart/form-data">


                        <div class="mb-3">
                            <label for="firstname">First Name*</label>
                            <input type="text" class="form-control" id="firstname" name="firstname" value="<?= $user['firstname']; ?>">
                        </div>

                        <div class="mb-3" class="form-group">
                            <label for="username">Username*</label>
                            <input type="text" class="form-control" id="username" name="username" value="<?= $user['username']; ?>">
                        </div>

                        <div class="mb-3">
                            <label for="lastname">Last Name*</label>
                            <input type="text" class="form-control" id="lastname" name="lastname" value="<?= $user['lastname']; ?>">
                        </div>

                        <div class="mb-3">
                            <label for="email">Email Address*</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?= $user['email']; ?>">
                            <div id="email-error"></div>
                        </div>

                        <div class="mb-3">
                            <label for="password">Password*</label>
                            <input type="password" class="form-control" id="password" name="password" value="<?= $user['password']; ?>">
                        </div>

                        
                        <div class="mb-3">
                            <label for="dob">Date of Birth</label>
                            <input type="date" class="form-control" id="dob" name="dob" value="<?= $user['dob']; ?>">
                        </div>

                        <div class="mb-3">
                            <label for="hobby">Hobby</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="reading" name="hobby[]" value="Reading"<?php if (in_array("Reading",$user))?>>
                                <label class="form-check-label" for="reading">Reading</label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="swimming" name="hobby[]" value="Swimming">
                                <label class="form-check-label" for="swimming">Swimming</label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="cooking" name="hobby[]" value="Cooking">
                                <label class="form-check-label" for="cooking">Cooking</label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="cooking" name="hobby[]" value="Cooking">
                                <label class="form-check-label" for="cooking">Coading</label>
                            </div>

                        </div>

                        <div class="mb-3">
                            <label>Gender</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="male" value="Male" <?php if($user['gender']=="Male"){
                                    echo "checked";
                                }?>>
                                <label class="form-check-label" for="male">Male</label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="female" value="Female">
                                <label class="form-check-label" for="female">Female</label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="female" value="Female">
                                <label class="form-check-label" for="female">Others</label>
                            </div>

                        </div>


                        <div class="mb-3">
                            <label for="country">Country</label>
                            <select class="form-control" id="country" name="country" value="<?= $user['country']; ?>">
                                <option value="">Select Country</option>
                                <option value="India">India</option>
                                <option value="USA">USA</option>
                                <option value="UK">UK</option>
                                <option value="Australia">Australia</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="message">Message</label>
                            <textarea class="form-control" id="message" name="message" rows="3" value="<?= $user['message']; ?>"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="profile-image">Profile Image:</label>
                            <input type="file" class="form-control-file" id="profile_image" name="profile_image" value="<?= $user['profile_image']; ?>">
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary" name="update_account">update</button>
                        </div>
                    </form>
                </div>
            </div>
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