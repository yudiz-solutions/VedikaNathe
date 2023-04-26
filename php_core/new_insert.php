<?php require('connection.php');

if(isset($_POST['submit']))
{
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$gender = $_POST['gender'];
	$email = $_POST['email'];

	// $iname = $_FILES['file']['name'];	
	// $file_store = "upload/" . $iname;

	$sql = "INSERT INTO users(fname, lname, gender, email, img) VALUES('$fname', '$lname' ,'$gender' ,'$email')";

	$result = mysqli_query($conn, $sql);

	if($result)
	{
		header('location: insert.php');
	}
	mysqli_error($result);
    
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Registration Page</title>
</head>
<body>
	<form action="" method="POST" enctype="multipart/form-data">
		<table>
			<tr>
				<td>Firstname :</td>
				<td>
					<input type="text" name="fname" placeholder="Firstname">
				</td>
			</tr>
			<tr>
				<td>Lastname :</td>
				<td>
					<input type="text" name="lname" placeholder="Lastname">	
				</td>
			</tr>
			<tr>
				<td>Gender :</td>
				<td><input type="radio" name="gender" value="Male">Male
					<input type="radio" name="gender" value="Female">Female
					<input type="radio" name="gender" value="Other">Other
				</td>
			</tr>
			<tr>
				<td>Email :</td>
				<td>
					<input type="email" name="email" placeholder="Email">
				</td>
			</tr>
			<!-- <tr>
				<td>
					<input type="file" name="file">
				</td>
			</tr> -->
			<tr>
				<td>
					<input type="submit" name="submit" value="Submit">
				</td>
			</tr>
		</table>
	</form>
</body>
</html>

<?php 
	
	$sql = "SELECT * FROM users";
	$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
 	<table border="1">
 		<tr>
 			<th style="background-color: #4848a9;">ID</th>
 			<th style="background-color: #4848a9;">Firstname</th>
 			<th style="background-color: #4848a9;">Lastname</th>
 			<th style="background-color: #4848a9;">Gender</th>
 			<th style="background-color: #4848a9;">Email</th>
 			<th style="background-color: #4848a9;">Image</th>
 			<th style="background-color: #4848a9;">Update</th>
 			<th style="background-color: #4848a9;">Delete</th>
 		</tr>
 		<tr>
 			<?php while($row = mysqli_fetch_array($result)) { ?>
 				<td><?php echo $row["id"];?></td>
 				<td><?php echo $row["fname"];?></td>
 				<td><?php echo $row["lname"];?></td>
 				<td><?php echo $row["gender"];?></td>
 				<td><?php echo $row["email"];?></td>
 				<td><img src="upload/<?php echo $row['img'];?>" width="150px"></td>
 				<td><a href="edit.php?did=<?php echo $row["id"]; ?>">Edit</td>
 				<td><a href="delete.php?did=<?php echo $row["id"]; ?>">Delete</td>
 		</tr>

 		<?php } ?>
 	</table>
</body>
</html>