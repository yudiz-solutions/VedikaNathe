<!DOCTYPE html>
<html>
<head>
	<title>File Upload</title>
</head>
<body>

	<h2>Upload a File</h2>

	<form action="uploads.php" method="post" enctype="multipart/form-data">

		<label for="fileToUpload">Select file:</label>

		<input type="file" name="fileToUpload" id="fileToUpload"><br><br>

		<input type="submit" value="Upload File" name="submit">

	</form>

</body>
</html>
<?php

// directory where the uploaded file will be stored
$target_dir = "uploads/";

// full path to the uploaded file
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]); 

 // flag to indicate whether the file should be uploaded
$uploadOk = 1;  

// get the file extension
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));  

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Check file size (500KB maximum)
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats (only JPG, JPEG, PNG, and GIF)
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
    
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>