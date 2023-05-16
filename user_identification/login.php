<?php 
session_start();
include 'database.php';
error_reporting(0);

if (isset($_SESSION['username'])) {
	header("location:dashboard.php");
}
if(isset($_POST['submit'])){
    
    $email=$_POST['email'];
    $password=$_POST['password'];
   
     $sql="SELECT * FROM `registration` WHERE email='$email' ";

    $result = mysqli_query($conn, $sql);
    
    if($result->num_rows >0){
        $row = mysqli_fetch_assoc($result);
        // echo $_POST['password'];
        // die;
        if(password_verify($_POST['password'],$row['password'])){
            
            $_SESSION['username']=$row['username'];
            
            header("location:dashboard.php");
            // echo 'hello';
            // die;
        }else{
        echo"<script>alert('Invalid Useid or email or password')</script>";

        }

    }else{
        echo"<script>alert('Invalid Useid or email or password')</script>";
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Login Page</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript"></script>    
</head>

<body>
    <div class="container" style="border: 1px solid #ccc; padding: 20px; width:600px;">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h1 class="text-center mb-4">Login Page</h1>
                <form id="login_form" method="POST">
                    <div class="form-group">
                        <label>Email:</label>
                        <input type="email" id="email" name="email" class="form-control">
                        <span id="email-error" class="text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label>Password:</label>
                        <input type="password" id="password" name="password" class="form-control">
                        <span id="password-error" class="text-danger"></span>
                    </div>
                    <br>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block" name="submit">Login</button>
                    </div>
                    <span id="login_error" class="text-danger"></span>
                </form>
                <p>Don't have an account? <a href="register.php">Sign up</a></p>

            </div>
        </div>
    </div>


</body>

</html>