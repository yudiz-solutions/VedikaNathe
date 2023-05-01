
<?php
session_start();
include('db_connection_crud.php');

// add student
if (isset($_POST['save_student'])) {

    // validate student name
    $name = $_POST['name'];
    if (!preg_match("/^[a-zA-Z ]+$/", $name)) {
        $_SESSION['message'] = "Invalid student name. Only letters and white space allowed.";
        $_SESSION['msg_type'] = "danger";
        header("location: crud.php");
        exit();
    }

    // validate email
    $email = $_POST['email'];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['message'] = "Invalid email format.";
        $_SESSION['msg_type'] = "danger";
        header("location: crud.php");
        exit();
    }

    // validate phone
    $phone = $_POST['phone'];
    if (!preg_match("/^\d{10}$/", $phone)) {
        $_SESSION['message'] = "Invalid phone number. Must be a 10-digit number.";
        $_SESSION['msg_type'] = "danger";
        header("location: crud.php");
        exit();
    }

    // validate course
    $course = $_POST['course'];
    if (!preg_match("/^[a-zA-Z ]+$/", $course)) {
        $_SESSION['message'] = "Invalid course name. Only letters and white space allowed.";
        $_SESSION['msg_type'] = "danger";
        header("location: crud.php");
        exit();
    }

    $sql = "INSERT INTO student (name, email, phone, course) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $name, $email, $phone, $course);
    $stmt->execute();

    $_SESSION['message'] = "Record has been saved!";
    $_SESSION['msg_type'] = "success";

    header("location: crud_table.php");
    exit();
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
        
        <title>Hello, world!</title>
    </head>
    
    <body>
        <div class="container mt-5">

            <?php include('message_crud.php') ?>
            
        <div class="row">
            <div class="col-md-12">
                <div class="card-header">
                    <h4>Student Add
                        <a href="crud_table.php" class="btn btn-danger float-end">BACK</a>
                    </h4>
                </div>
            </div class="card-body">
            <form action="crud.php" method="POST">

                <div class="mb-3">
                    <label>Student Name</label>
                    <input type="text" name="name" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Student Email</label>
                    <input type="email" name="email" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Student Phone</label>
                    <input type="text" name="phone" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Student Course</label>
                    <input type="text" name="course" class="form-control">
                </div>

                <div class="mb-3">
                    <button type="submit" name="save_student" class="btn btn-primary">Save Student</button>

                </div>

            </form>
        </div>
    </div>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>


</body>
<script type="text/javascript">
                setTimeout(function () {
          
                  // Closing the alert
                  $('#alert').alert('close');
                }, 3000);
              </script>

</html>