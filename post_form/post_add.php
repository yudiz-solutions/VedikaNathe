<?php
session_start();

include 'db_post_form.php';
// echo ($_GET['postid']);

try {
	if(empty($_GET['user_id'])){
		header('location:post_show.php');
	}
	if (isset($_POST['submit'])) {
// 		echo "dffg";
// exit;
		// echo ($_GET['postid']);
		$user_id = $_GET['user_id'];
		$profile = $_FILES['post']['name'];
		$image_tmp = $_FILES['post']['tmp_name'];    
		$file = "./uploads/" . $profile;

		$caption = $_POST['caption'];
		$hashtag = $_POST['hashtag'];
		// echo("hello");
		// exit;

		if (move_uploaded_file($image_tmp, $file)) {
			// echo "n";
			// exit;
			$sql = "INSERT INTO `posts` (`user_id`,`post`, `caption`, `hashtag`) VALUES ('$user_id','$file','$caption','$hashtag')";
			// echo $sql;
			// exit;
			$result = mysqli_query($conn, $sql);
			if($result){
				
				header('location:post_show.php');
			}
			
		}else{
			echo("failed");
			exit;
		}
	}
}catch(Exception $e){
	echo $e->getMessage();
	exit;
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Add Post</title>
	<!-- Include Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<h1>Add Post</h1>
		<form method="POST"  enctype="multipart/form-data">
			<div class="form-group">
				<label for="post">Post Image:</label>
				<input type="file" class="form-control" id="post" name="post" required>
			</div>
			<div class="form-group">
				<label for="caption">Caption:</label>
				<input type="text" class="form-control" id="caption" name="caption" required>
			</div>
			<div class="form-group">
				<label for="hashtags">Hashtags:</label>
				<textarea class="form-control" id="hashtags" name="hashtag" rows="3" required></textarea>
			</div>
			<button type="submit" class="btn btn-primary" name="submit">Post</button>
		</form>
	</div>
	<!-- Include Bootstrap JS -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>
