<?php 

$hostname = 'localhost';
$username = 'root';
$password = '';
$dbname = 'formdata';

$conn = mysqli_connect($hostname, $username, $password, $dbname);

if($conn)
{
	echo "Connected Databse";
}
else
{
	echo "Not Connected" . mysqli_error($conn);
}

?>