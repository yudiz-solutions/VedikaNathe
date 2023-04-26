<?php


$connection = mysqli_connect("localhost:8889","root","","db_crud");

if(!$connection){
    die('connection failed'.mysqli_connect_error());
    // echo "hwllo";
    
}
?>