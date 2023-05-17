<?php
require 'database.php';

$result  = array();
if (isset($_POST['update_account'])) {

    $user_id = $_GET['id'];

    $firstname = isset($_POST['firstname']) ? $_POST['firstname'] : '';

    $username = isset($_POST['username']) ? $_POST['username'] :'';

    $lastname = isset($_POST['lastname']) ? $_POST['lastname'] : '';

    $password  = password_hash($_POST['password'], PASSWORD_DEFAULT);
    
    $email = isset($_POST['email']) ? $_POST['email'] : '';

    $dob = isset($_POST["dob"]) ? $_POST["dob"] : '';

    $hobby_temp = isset($_POST["hobby"]) ?implode(",", $_POST["hobby"]) : '';

    $gender = isset($_POST["gender"]) ? $_POST["gender"] : '';
    
    $country = isset($_POST["country"]) ? $_POST["country"] : '';
    $message = isset($_POST["message"]) ? $_POST["message"] : '';

    // $profile_image = mysqli_real_escape_string($conn, $_POST['$profile_image']);
    $profile_image = isset($_FILES["profile_image"]["name"]) ? $_FILES["profile_image"]["name"] : '';
    $image_tmp = isset($_FILES["profile_image"]["tmp_name"]) ? $_FILES["profile_image"]["tmp_name"] : '';
    $file = "./uploads/" . $profile_image;

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
    // if( empty($confirm_password)){
    //     $has_error = true;
    //     $result['confirm-password'][] = 'Please enter confirm password';
    // }

    // if( $_POST['password'] !=  $_POST['confirm_password']){
    //     $has_error = true; 
    //     $result['confirm_password'][] = 'Password and confirm password doesnt match';
    // }

    if(!empty($_FILES["profile_image"]["tmp_name"])){
        move_uploaded_file($image_tmp, $file);
    }else{
        $file = isset($_POST['hidden_file']) ? $_POST['hidden_file'] : '';
    }




    if(!$has_error){

    $query = "UPDATE `registration` SET `firstname` = '$firstname', `username` = '$username', `lastname` = '$lastname', `email` = '$email', `password` = '$password', `dob` = '$dob', `hobby` = '$hobby_temp', `gender` = '$gender', `country` = '$country', `message` = '$message', `profile_image` = '$file' WHERE `registration`.`id` = $user_id";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        $result['message'][] =  "Account Updated Successfully";
        header("Location: dashboard.php");
        exit(0);

    } else {
        // echo "Account Not Updated";
        $result['message'][] = 'Error';
    }

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
    <div class="container mt-5" style="border: 1px solid #ccc; padding: 20px;">

        <div class="row">
            <div class="col-md-12">
                <div class="card-header">
                    <h4>Account Edit
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
                            <span class="error text-danger"></span>

                        </div>

                        <div class="mb-3" class="form-group">
                            <label for="username">Username*</label>
                            <input type="text" class="form-control" id="username" name="username" value="<?= $user['username']; ?>">
                            <span class="error text-danger"></span>

                        </div>

                        <div class="mb-3">
                            <label for="lastname">Last Name*</label>
                            <input type="text" class="form-control" id="lastname" name="lastname" value="<?= $user['lastname']; ?>">
                            <span class="error text-danger"></span>

                        </div>

                        <div class="mb-3">
                            <label for="email">Email Address*</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?= $user['email']; ?>">
                            <span class="error text-danger"></span>

                            <!-- <div id="email-error"></div> -->
                        </div>

                        <div class="mb-3">
                            <label for="password">Password*</label>
                            <input type="password" class="form-control" id="password" name="password" value="<?= $user['password']; ?>">
                            <span class="error text-danger"></span>

                        </div>

                        
                        <div class="mb-3">
                            <label for="dob">Date of Birth</label>
                            <input type="date" class="form-control" id="dob" name="dob" value="<?= $user['dob']; ?>">
                            <span class="error text-danger"></span>

                        </div>
                        <?php

                        $hobby_arrr = explode(',',$user['hobby']);
                        // echo '<pre>';
                        //     print_r($hobby_arrr);
                        // echo '</pre>';
                         ?>
                        <div class="mb-3">
                            <label for="hobby">Hobby</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="reading" name="hobby[]" value="Reading" <?php echo in_array("Reading",$hobby_arrr) ? 'checked="checked"': ''?>>
                                <label class="form-check-label" for="reading">Reading</label>
                                <span class="error text-danger"></span>

                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="swimming" name="hobby[]" value="Swimming" <?php echo in_array("Swimming",$hobby_arrr) ? 'checked="checked"': ''?>>
                                <label class="form-check-label" for="swimming">Swimming</label>
                                <span class="error text-danger"></span>

                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="cooking" name="hobby[]" value="Cooking" <?php echo in_array("Cooking",$hobby_arrr) ? 'checked="checked"': ''?>> 
                                <label class="form-check-label" for="cooking">Cooking</label>
                                <span class="error text-danger"></span>

                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="coading" name="hobby[]" value="Coading" <?php echo in_array("Coading",$hobby_arrr) ? 'checked="checked"': ''?>>
                                <label class="form-check-label" for="coading">Coading</label>
                                <span class="error text-danger"></span>

                            </div>

                        </div>

                        <div class="mb-3">
                            <label>Gender</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="male" value="Male" <?php if($user['gender']=="male"){
                                    echo "checked";
                                }?>>
                                <label class="form-check-label" for="male">Male</label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="female" value="Female"  <?php if($user['gender']=="female"){
                                    echo "checked";
                                }?>>
                                <label class="form-check-label" for="female">Female</label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="other" value="Other" <?php if($user['gender']=="other"){
                                    echo "checked";
                                }?>>
                                <label class="form-check-label" for="female">Others</label>
                            </div>

                        </div>


                        <div class="mb-3">
                            <label for="country">Country</label>
                            <select class="form-control" id="country" name="country">
                                <option value="">Select Country</option>
                                <option value="india"<?php if($user['country']=="india"){echo"selected";}?>>India</option>
                                <option value="usa"><?php if($user['country']=="usa"){echo"selected";}?>>USA</option>
                                <option value="uk"><?php if($user['country']=="uk"){echo"selected";}?>>UK</option>
                                <option value="australia"><?php if($user['country']=="australia"){echo"selected";}?>>Australia</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="message">Message</label>
                            <textarea class="form-control" id="message" name="message" rows="3"><?= $user['message']; ?></textarea> 
                        </div>

                        <div class="mb-3">
                            <label for="profile-image">Profile Image:</label>
                            <input type="file" class="form-control-file" id="profile_image" name="profile_image">
                            <input type="hidden" name="hidden_file" value="<?php echo $user['profile_image']; ?>">
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