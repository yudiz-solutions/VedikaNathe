<?php
include 'database.php';
include 'submitForm.php';
// session_start();
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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


            <form id="registration-form" method="post" enctype="multipart/form-data">


                <div class="mb-3">
                    <label for="first-name">First Name*</label>
                    <input type="text" class="form-control" id="firstname" name="firstname">
                    <!-- <span class="text-danger" id="first-name-error">  </span> -->

                    <span class="error text-danger" id="first-name-error">
                        <?php if (isset($_SESSION["firstnameErr"])) {
                            echo $_SESSION["firstnameErr"];
                        } ?>
                    </span>
                </div>

                <div class="mb-3" class="form-group">
                    <label for="username">Username*</label>
                    <input type="text" class="form-control" id="username" name="username">
                    <?php if (isset($_SESSION["usernameErr"])) { ?>
                        <span class="error">
                            <?php echo $_SESSION["usernameErr"]; ?>
                        </span>
                    <?php } ?>
                </div>

                <div class="mb-3">
                    <label for="last-name">Last Name*</label>
                    <input type="text" class="form-control" id="lastname" name="lastname">
                    <?php if (isset($_SESSION["lastnameErr"])) { ?>
                        <span class="error">
                            <?php echo $_SESSION["lastnameErr"]; ?>
                        </span>
                    <?php } ?>
                </div>

                <div class="mb-3">
                    <label for="email">Email Address*</label>
                    <input type="email" class="form-control" id="email" name="email">
                    <div id="email-error"></div>
                    <?php if (isset($_SESSION["emailErr"])) { ?>
                        <span class="error">
                            <?php echo $_SESSION["emailErr"]; ?>
                        </span>
                    <?php } ?>
                </div>

                <div class="mb-3">
                    <label for="password">Password*</label>
                    <input type="password" class="form-control" id="password" name="password">
                    <?php if (isset($_SESSION["passwordErr"])) { ?>
                        <span class="error">
                            <?php echo $_SESSION["passwordErr"]; ?>
                        </span>
                    <?php } ?>
                </div>

                <div class="mb-3">
                    <label for="confirm-password">Confirm Password*</label>
                    <input type="password" class="form-control" id="confirm-password" name="confirm_password">
                    <?php if (isset($_SESSION["confirm_passwordErr"])) { ?>
                        <span class="error">
                            <?php echo $_SESSION["confirm_passwordErr"]; ?>
                        </span>
                    <?php } ?>
                </div>

                <div class="mb-3">
                    <label for="dob">Date of Birth</label>
                    <input type="date" class="form-control" id="dob" name="dob">
                </div>

                <div class="mb-3" id="hobby">
                    <label for="hobby">Hobby</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="reading" name="hobby[]" value="Reading">
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
                        <input class="form-check-input" type="radio" name="gender" id="male" value="Male">
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


                <div class="mb-3" id="country">
                    <label for="country">Country</label>
                    <select class="form-control" id="country" name="country">
                        <option value="">Select Country</option>
                        <option value="India">India</option>
                        <option value="USA">USA</option>
                        <option value="UK">UK</option>
                        <option value="Australia">Australia</option>
                    </select>
                </div>

                <div class="mb-3" id="message">
                    <label for="message">Message</label>
                    <textarea class="form-control" id="message" name="message" rows="3"></textarea>
                </div>

                <div class="mb-3">
                    <label for="profile-image">Profile Image:</label>
                    <input type="file" class="form-control-file" id="profile-image" name="profile_image">
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#registration-form").on("submit", function (event) {
                event.preventDefault();
                console.log('herer');

                // client-side validation

                var firstname = $("#firstname").val();
                var username = $("#username").val();
                var lastname = $("#lastname").val();
                var email = $("#email").val();
                var password = $("#password").val();
                var confirm_password = $("#confirm-password").val();
                var dob = $("#dob").val();
                var hobby = $("#hobby").val();
                var gender = $("input[name='gender']:checked").val();
                var country = $("#country").val();
                var message = $("#message").val();
                var profile_image = $("#profile-image")[0].files[0];

                // perform client-side validation

                if (firstname.trim() == "") {
                    $("#first-name-error").text("Please enter your first name.");
                    return false;
                } else {
                    $("#first-name-error").text("");
                }

                if (username.trim() == "") {
                    $("#user-name-error").text("Please enter a username.");
                    return false;
                } else {
                    $("#user-name-error").text("");
                }

                if (lastname.trim() == "") {
                    $("#last-name-error").text("Please enter your last name.");
                    return false;
                } else {
                    $("#last-name-error").text("");
                }


                if (email.trim() == "") {
                    $("#email-error").text("Please enter your email.");
                    return false;
                } else {
                    $("#email-error").text("");
                }

                if (!isValidEmail(email)) {
                    $("#email-error").text("Please enter a valid email address.");
                    return false;
                } else {
                    $("#email-error").text("");
                }

                if (password.trim() == "") {
                    $("#password-error").text("Please enter a password.");
                    return false;
                } else {
                    $("#password-error").text("");
                }

                if (confirm_password.trim() == "") {
                    $("#confirm-password-error").text("Please confirm your password.");
                    return false;
                } else {
                    $("#confirm-password-error").text("");
                }

                if (password != confirm_password) {
                    $("#confirm-password-error").text("Passwords do not match.");
                    return false;
                } else {
                    $("#confirm-password-error").text("");
                }

                if (dob.trim() == "") {
                    $("#dob-error").text("Please enter your date of birth.");
                    return false;
                } else {
                    $("#dob-error").text("");
                }

                if (gender == undefined) {
                    $("#gender-error").text("Please select your gender.");
                    return false;
                } else {
                    $("#gender-error").text("");
                }

                if (country == "") {
                    $("#country-error").text("Please select your country.");
                    return false;
                } else {
                    $("#country-error").text("");
                }

                function isValidEmail(email) {
                    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    return emailRegex.test(email);
                }

                // perform validation

                $.ajax({
                    url: "submitForm.php",
                    type: "POST",
                    data: {
                        firstname: firstname,
                        username: username,
                        lastname: lastname,
                        email: email,
                        password: password,
                        conform_password: conform - password,
                        dob: dob,
                        hobby: hobby,
                        gender: gender,
                        country: country,
                        message: message

                    },
                    success: function (response) {
                        console.log(response);
                        if (response == "username-error") {
                            $("#user-name-error").text("Username already taken.");
                        } else if (response == "email-error") {
                            $("#email-error").text("Email already registered.");
                        } else if (response == "success") {

                            // submit form data to the database without page reloading

                            var formData = new FormData();
                            formData.append("firstname", firstname);
                            formData.append("username", username);
                            formData.append("lastname", lastname);
                            formData.append("email", email);
                            formData.append("password", password);
                            formData.append("confirm_password", confirm - password);
                            formData.append("dob", dob);
                            formData.append("hobby", hobby);
                            formData.append("gender", gender);
                            formData.append("country", country);
                            formData.append("message", message);
                        }


                        $.ajax({
                            url: "database.php",
                            type: "POST",
                            data: formData,
                            contentType: false,
                            processData: false,
                            success: function (data) {
                                if (data == "success") {
                                    alert("Registration successful!");
                                    // window.location.href = "dashboard.php";
                                } else {
                                    alert("Registration failed. Please try again.");
                                }
                            }
                        });
                    }
                });
            });
        });


    </script>

</body>

</html>