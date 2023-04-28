<?php
session_start();

require 'db_connection_crud.php';

if(isset($_POST['delete_student']))
{
    
    $student_id = mysqli_real_escape_string($connection,$_POST['delete_student']);


    $query = "DELETE FROM students WHERE id='$student_id' ";
    $query_run = mysqli_query($connection,$query);

    if($query_run)
    {
        $_SESSION['message'] =  "Student Deleted Successfully";
        header("Location: crud_table.php");
        
        exit(0);
    }
    else{
        $_SESSION['message']="Student Not Deleted";
        header("Location: crud_table.php");
        exit(0);
    }

}

if(isset($_POST['update_student'])){

    $student_id = mysqli_real_escape_string($connection,$_POST['student_id']);


    $name = mysqli_real_escape_string($connection, $_POST['name']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $phone = mysqli_real_escape_string($connection, $_POST['phone']);
    $course = mysqli_real_escape_string($connection, $_POST['course']);

    $query = "UPDATE students SET name='$name',email='$email',phone='$phone',course='$course'WHERE id='$student_id' ";
    $query_run = mysqli_query($connection,$query);

    if($query_run)
    {
        $_SESSION['message'] =  "Student Updated Successfully";
        header("Location: crud_table.php");
        exit(0);

    }
    else{
        $_SESSION['message']="Student Not Updated";
        header("Location: crud_table.php");
        exit(0);

    }

}

if(isset($_POST['save_student']))
{
    $name = mysqli_real_escape_string($connection, $_POST['name']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $phone = mysqli_real_escape_string($connection, $_POST['phone']);
    $course = mysqli_real_escape_string($connection, $_POST['course']);



    $query = "INSERT INTO `students` (`id`, `name`, `email`, `phone`, `course`) VALUES (NULL, '$name', '$email', '$phone ', '$course')";
    

    $query_run = mysqli_query($connection,$query);
    if($query_run)
    {
        $_SESSION['message'] =  "Student Created Successfully";
        header("Location: crud_student.php");
        exit(0);
    }
    else
    {
        $_SESSION['message']="Student Not Created";
        header("Location: crud_student.php");
        exit(0);
    }
}
?>