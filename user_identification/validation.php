<?php
session_start();

$firstnameErr = $usernameErr = $lastnameErr = $passwordErr = $confirm_passwordErr = $emailErr = "";
$firstname = $username = $lastname = $password = $confirm_password = $email = $dob = $hobby_temp = $gender = $country = $message = $file = "";

  function test_input($data)
  {
    if (is_array($data)) {
      foreach ($data as $key => $value) {
        $data[$key] = test_input($value);
      }
      return $data;
    } else {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
  }
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (empty($_POST["firstname"])) {
      $firstnameErr = "Firstname is required";
    } else {
      $firstname = test_input($_POST["firstname"]);
      if (!preg_match("/^[a-zA-Z ]*$/", $firstname)) {
        $firstnameErr = "Only letters and white space allowed";
      }
    }

    if (empty($_POST["username"])) {
      $usernameErr = "Username is required";
    } else {
      $username = test_input($_POST["username"]);
      if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $usernameErr = "Only letters and numbers allowed";
      }
    }


    if (empty($_POST["lastname"])) {
      $lastnameErr = "Lastname is required";
    } else {
      $lastname = test_input($_POST["lastname"]);
      if (!preg_match("/^[a-zA-Z ]*$/", $lastname)) {
       $lastnameErr = "Only letters and white space allowed";
      }
    }


    if (empty($_POST["password"])) {
      $passwordErr = "Password is required";
    } else {
      $password = test_input($_POST["password"]);
      if (!preg_match("/^(?=.[a-z])(?=.[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/", $password)) {
        $passwordErr = "Password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, and one number";
      }
    }

    
    if (empty($_POST["confirm_password"])) {
      $confirm_passwordErr = "Confirm Password is required";
    } else {
      $confirm_password = test_input($_POST["confirm_password"]);
      if ($confirm_password != $password) {
        $confirm_passwordErr = "Passwords do not match";
      }
    }

    
    if (empty($_POST["email"])) {
      $emailErr = "Email is required";
    } else {
      $email = test_input($_POST["email"]);
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
      }
    }

      
      $email_check_query = "SELECT * FROM registration WHERE email='$email' LIMIT 1";
      $result = mysqli_query($conn, $email_check_query);
      $user = mysqli_fetch_assoc($result);
     
      if ($user) {
        if ($user['email'] === $email) {
          $emailErr = "Email already exists";
        }
        if ($user['password'] === $password) {
          $passwordErr = "Password already exists";
        }
      } 
      // -------------------------validation complete-----------------------
    }
?>