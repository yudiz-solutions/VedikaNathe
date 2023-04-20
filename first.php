<?php
// Function

// function message(){
//     echo"Hello,Good Morning";
// }
// message();

// Function Argument

// function userName($fname,$lname){
//     echo "$fname $lname \n";
// }

// userName("Avneet","Kaur");
// userName("Sidharth","Khan");

// without strict

// function multiplyNumber(int $a, int $b){
//     return $a * $b;
// }

// echo multiplyNumber(10, "2");
?>

<?php 
// declare(strict_types=1);  

// With Strict

// function substractNumber(int $a, int $b){
//     return $a - $b;
// }

// echo substractNumber(5, "2");
?>

<?php
// Function Default Argument

// function setWidth(int $maxWidth = 50){
//     echo "The width is: $maxWidth";
// }
// setWidth();

// Return type declaration
// function addNumbers(int $a, int $b) : float{
//     return $a + $b;
// }
// echo addNumbers(33,55);
?>

<?php
// Array
// $name = array("Divya","Anjali","Bhairavi","Pratiksha");
    // echo "Best Person:" . $name[0] . "," . $name[1] . "," . $name[2] .  "," . $name[3] . ",";

    // count length

    // echo count($name);

    // loop th' indexed array

    // $arrlength = count($name);
    // for($x = 0; $x < $arrlength; $x++) {
    //     echo $name[$x];

    // }

    // Multidimensitional Array

        // $girlWear = array (
        //     array("jeans",22,33),
        //     array("top",12,33)
        // );

        // echo $girlWear[0][0].": In stock:".$girlWear[0][1].",sold: ".$girlWear[0][2];

        // sort

    //     $numbers = array(5, 1, 88, 44, 2);
    //     sort($numbers);
    //    $arraylength = count($numbers);
    //    for($x = 0; $x < $arraylength; $x++){
    //     echo $numbers[$x];
    //    }

?>

<?php
// $x = 33;
// $y = 12;

// function substract() {
//     $GLOBALS['z'] = $GLOBALS['x'] - $GLOBALS['y'];
// }

// substract();
// echo $z;
?>
<!-- 
  <!-- PHP $_REQUEST   -->
<DOCTYPE>
<html>
<body>
<form method = "post" action = "<?php echo $_SERVER['PHP_SELF'];?>">
NAME : <input type = "text" name = "fname"><br><br><br>
LNAME : <input type = "text" name = "lname"><br><br><br>
<input type="submit" value ="submit">
</form> 

<?php
// if($_SERVER["REQUEST_METHOD"] == "POST") {
    
//     $name = $_REQUEST['fname'];
//     $lname = $_REQUEST['lname'];

//     if(empty($name)) {
//         echo "Name is empty";
//     }else {
//         echo $name ."<br>";
//         echo $lname;
//     }
// }
?>
</body>
</html> -->
<!--  -->

<!-- Regex -->
<?php
// $animal = "fox";
// $search = "/f/i";
// echo preg_match($search,$animal);
// echo preg_match_all($search,$animal);
// echo preg_replace($search,"h",$animal);

?>

<!-- <DOCTYPE>
<html>
    <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<style>
    .error {color: #FF0000;}
</style>
<body>
 <?php

$fnameErr = $lnameErr = $emailErr = $mobilenoErr  = $genderErr = $educationErr = "";

 $fname = $lname = $email = $mobileno =  $address = $gender = $education = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {

    if(empty($_POST["fname"])) {
        $fnameErr = "Name is required";
    }else{
        $fname = test_input($_POST["fname"]);

        if(!preg_match("/^[a-zA-Z-' ]*$/",$fname)){
            $fnameErr = "Only letters and white space allowed";
        }
    }

    if(empty($_POST["lname"])) {
        $lnameErr = "LName is required";
    }else{
        $lname = test_input($_POST["lname"]);

        if (!preg_match("/^[a-zA-Z-' ]*$/",$lname)) {
            $lnameErr = "Only letters and white space allowed";
          }
    }

    if(empty($_POST["email"])) {
        $emailErr = "Email is required";
    }else{
        $email = test_input($_POST["email"]);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
          }
    }

    if(empty($_POST["mobileno"])) {
        $mobilenoErr = "Name is required";
    }else{
        $mobileno = test_input($_POST["mobileno"]);

        if(!preg_match('/^[0-9]{10}+$/', $mobileno)){
            $mobilenoErr = "Invalid Mo No";
        }
    }

    $address = test_input($_POST["address"]);

    if(empty($_POST["gender"])) {
        $genderErr = "Name is required";
    }else{
        $gender = test_input($_POST["gender"]);
    }

    if(empty($_POST["education"])) {
        $educationErr = "Name is required";
    }else{
        $education = test_input($_POST["education"]);
    }

}

   
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    return $data;
}
?>
<div class  ="container">
<h2> Yudiz Registration Form</h2>
<form  method = "post" action = "<?php echo $_SERVER['PHP_SELF'];?>">
NAME : <input type = "text" name = "fname" value="<?php echo $fname;?>">
<span class="error">* <?php echo $fnameErr;?></span><br><br><br>

LNAME : <input type = "text" name = "lname" value="<?php echo $lname;?>"> 
<span class="error">* <?php echo $lnameErr;?></span><br><br><br>

E-MAIL : <input type = "email" name = "email" value="<?php echo $email;?>">
<span class="error">* <?php echo $emailErr;?></span><br><br><br>

MOBILE-NO : <input type="number" name="mobileno">
<span class="error">* <?php echo $mobilenoErr;?></span><br><br><br>

ADDRESS : 
<span><textarea name = "address" rows="5" cols="40" > </textarea></span><br><br><br>

GENDER : <br><br><br>
<input type ="radio" name = "gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female"> Female
<input type ="radio" name = "gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value = "male">Male
<input type ="radio" name = "gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value = "other">Other
<span class="error">* <?php echo $genderErr;?></span><br><br><br>

EDUCATION : <br><br><br>
<input type ="radio" name = "education" value = "bca">BCA
<input type ="radio" name = "education" value = "bsc">BSC
<input type ="radio" name = "education" value = "engineering">ENGINEERING>
<span class="error">* <?php echo $educationErr;?></span><br><br><br>

<input type="submit" value ="SUBMIT">
</form>  
</div>

<?php
// echo "<H2> YOUR INPUT : </h2>";
// echo "FName : $fname";
// echo "<br>";
// echo "LName : $lname";
// echo "<br>";
// echo "Email : $email";
// echo "<br>";
// echo "MobileNo : $mobileno";
// echo "<br>";
// echo "Address : $address";
// echo "<br>";
// echo "Gender : $gender";
// echo "<br>";
// echo "Education : $education";
// echo "<br>";
?>
</body>
</html>


<!-- <!DOCTYPE html>
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

<?

// Start a new session or resume an existing one

// session_start();

// $_SESSION['username'] = 'veds';

// // Retrieve the value of the session variable
// if(isset($_SESSION['username'])) {

//     $username = $_SESSION['username'];
//     echo "Welcome back, " . $username;

// } else {

//     echo "Please log in";
// }
?>

<!-- filters -->
<?php
// $email = "veds.nathe@gmail.com";

// if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
//   echo "Email address is valid";
// } else {
//   echo "Email address is not valid";
// }

?>

<?php
// $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);

// echo "Hello, " . $name . "!";

?>

<?php
// $input = array(
//     'number1' => 123,
//     'number2' => "abc",
//     'number3' => 456,
//   );
  
//   $filters = array(
//     'number1' => FILTER_VALIDATE_INT,
//     'number2' => FILTER_VALIDATE_INT,
//     'number3' => FILTER_VALIDATE_INT,
//   );
  
//   $result = filter_input_array(INPUT_GET, $filters);
  
//   var_dump($result);
  
?>

<!-- CALLBACK -->
<?php
// function add($a, $b) {
//     return $a + $b;
// }

// function subtract($a, $b) {
//     return $a - $b;
// }

// function calculate($callback, $a, $b) {
//     return $callback($a, $b);
// }

// $result = calculate('add', 10, 5);
// echo $result; 

// $result = calculate('subtract', 10, 5);
// echo $result; 

?>

<!-- encoding a PHP array into JSON -->
<?php
// $data = array(
//     'name' => 'Divya Patil',
//     'age' => 30,
//     'email' => 'divya.patil@example.com'
// );

// $json = json_encode($data);

// echo $json;
// ?>

<!--  decoding a JSON-encoded string  -->
<?php
// $json = '{"name":"shreya zade","age":30,"email":"shreya.zade@example.com"}';

// $data = json_decode($json);

// echo $data->name;
// echo $data->age;
// echo $data->email;

?>

<!-- Exception(try,catch) -->
<?php
// function divide($a, $b) {
//     if ($b == 0) {
//         throw new Exception('Division by zero');
//     }

//     return $a / $b;
// }

// try {
//     echo divide(10, 0);
// } catch (Exception $e) {
//     echo 'Error: ' . $e->getMessage();
// }
// ?>

<!-- Exception(try,catch,finally) -->

<?php
// function divide($a, $b) {
//     if ($b == 0) {
//         throw new Exception('Division by zero');
//     }

//     return $a / $b;
// }

// try {
//     echo divide(10, 0);
// } catch (Exception $e) {
//     echo 'Error: ' . $e->getMessage();
// } finally {
//     echo 'Finally block executed';
// }
?>

