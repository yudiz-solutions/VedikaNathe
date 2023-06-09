<?php
include("db_post_form.php");

if (isset($_POST['submit'])) {
    $first_name = $_POST['first_name'];

    $last_name = $_POST['last_name'];

    $username = $_POST['username'];

    $email = $_POST['email'];

    $password = $_POST['password'];

    $gender = isset($_POST['gender']) ? $_POST['gender'] : '';

    $country = isset($_POST['country']) ? $_POST['country'] : '';

    $state = isset($_POST['state']) ? $_POST['state'] : '';

    $city = isset($_POST['city']) ? $_POST['city'] : '';

    $bio = isset($_POST['bio']) ? $_POST['bio'] : '';

    $profile = $_FILES['profile']['name'];
    $image_tmp = $_FILES['profile']['tmp_name'];
    $file = "uploads/" . $profile;
    echo "$profile";

    $social_temp = isset($_POST['social_media']) ? $_POST['social_media'] : '';
    $social_media = "";
    foreach ($social_temp as $curr) {
        $social_media .= $curr . ',';

    }

    $sql = "INSERT INTO `userdata` (`id`, `first_name`, `last_name`, `username`, `email`, `password`, `gender`, `country`, `state`, `city`, `bio`, `profile`, `social_media`) VALUES 
    (NULL, '$first_name', '$last_name', ' $username', '$email', '$password', '$gender', '$country',  '$state', '$city', '$bio', '$file', '$social_media')";

    mysqli_query($conn, $sql);

    if (move_uploaded_file($image_tmp, $file)) {

        header("Location: display_post.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // mysqli_close($conn);
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

    <title>USER REGISTRATION FORM</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>

<html>

<body class="container mt-5" style="border: 1px solid #ccc; padding: 20px;">

    <div class="row">
        <div class="col-md-12">
            <div class="card-header">
                <h4>USER REGISTRATION FORM</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">

            <form method="post" action="" enctype="multipart/form-data">

                <div class="mb-3">
                    <label for="first-name" class="form-label">First Name</label>
                    <input type="text" name="first_name" class="form-control" id="first-name">
                </div>

                <div class="mb-3">
                    <label for="last-name" class="form-label">Last Name</label>
                    <input type="text" name="last_name" class="form-control" id="last-name">
                </div>

                <div class="mb-3">
                    <label for="username" class="form-label">UserName</label>
                    <input type="text" name="username" class="form-control" id="username">
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="email">
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password">
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
                <?php
                $query = "SELECT * FROM country Order by country_name";
                $result = $conn->query($query);
                ?>


                <div class="mb-3">

                    <label for="country" class="form-label">Country</label>

                    <select class="form-control" name="country" id="country" onchange="FetchState(this.value)" required>
                        <option value="">Select Country</option>
                        <?php
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo '<option value=' . $row['id'] . '>' . $row['country_name'] . '</option>';
                            }
                        }
                        ?>
                    </select>
                </div>

                <div class="mb-3">

                    <label for="state" class="form-label">State</label>

                    <select class="form-control" name="state" id="state" onchange="FetchCity(this.value)" required>
                        <option>Select State</option>
                    </select>

                </div>

                <div class="mb-3">
                    <label for="city" class="form-label">City</label>

                    <select class="form-control" name="city" id="city">
                        <option>Select City</option>
                    </select>

                </div>

                <div class="mb-3">

                    <label for="bio" class="form-label">Bio</label>

                    <textarea class="form-control" name="bio" id="bio" rows="4"></textarea>

                </div>

                <div class="mb-3">
                    <label for="profile" class="form-label">Profile Picture</label>
                    <input type="file" name="profile" class="form-control" value="">
                </div>

                <div class="mb-3">
                    <label for="active_social_media" class="form-label">Active Social Media</label>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="social_media[]" value="instagram"
                            id="instagram">
                        <label class="form-check-label" for="instagram"> Instagram</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="social_media[]" value="twitter"
                            id="twitter">
                        <label class="form-check-label" for="twitter">Twitter</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="social_media[]" value="linkedin"
                            id="linkedin">
                        <label class="form-check-label" for="linkedin">LinkedIn</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="social_media[]" value="facebook"
                            id="facebook">
                        <label class="form-check-label" for="facebook">Facebook</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="social_media[]" value="whatsapp"
                            id="whatsapp">
                        <label class="form-check-label" for="whatsapp">WhatsApp</label>
                    </div>

                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </div>

            </form>

        </div>

    </div>

    </div>
    <script type="text/javascript">
        function FetchState(id) {
            $('#state').html('');
            $('#city').html('<option>Select City</option>');
            $.ajax({
                type: 'post',
                url: 'ajaxdata.php',
                data: { country_id: id },
                success: function (data) {
                    $('#state').html(data);
                }

            })
        }

        function FetchCity(id) {
            $('#city').html('');
            $.ajax({
                type: 'post',
                url: 'ajaxdata.php',
                data: { state_id: id },
                success: function (data) {
                    $('#city').html(data);
                }

            })
        }


    </script>
</body>

</html>