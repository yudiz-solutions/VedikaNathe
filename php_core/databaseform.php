<DOCTYPE>
<html>
<body>
<form action = "databaseform.php"  method = "post">

FNAME : <input type = "text" name = "fname"><br><br>

LNAME : <input type = "text" name = "lname"><br><br>

MobileNo: <input type ="number" name = "mobileno"><br><br>

<input type="submit">

</form>
<?php
$serverName = "localhost:8889";
$userName = "root";
$password = "";
$databaseCreate = "registration";

$connection= new mysqli($serverName,$userName,$password,$databaseCreate);

if($connection->connect_error){
    die("connection fail".$connection->connect_error);
}

$fName = $_POST['fname'];
$lName = $_POST['lname'];
$mobileno = $_POST['mobileno'];

// $insert = "INSERT INTO form (`Id`, `FName`, `LName`, `MobileNo`) VALUES (NULL, '$fName', '$lName', '$mobileno')";

$sql = "INSERT INTO form (FName, LName, MobileNo) VALUES ('$fName', '$lName', '$mobileno')";
if(mysqli_query($connection, $sql)){
    echo "Records inserted successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);
}


// if($connection->query($insert)===true){
//     echo " data added";
// }else{
//     echo "err".$insert."<br>".$connection->error;
// }
//  $connection -> close();
?>
</body>
</html>