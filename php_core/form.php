<DOCTYPE>
<html>
    <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>
<style>
    .error {color: #FF0000;}
    
    .container{
         padding-left: 400px; 
        border: 1px solid black;
        border-width:600px;
        margin: auto;
    }
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
<div class  ="container  border border-secondary"> 
<h2> Yudiz Registration Form</h2>
<form  method = "post" action = "<?php echo $_SERVER['PHP_SELF'];?>">
NAME : <input type = "text" name = "fname" value="<?php echo $fname;?>">
<span class="error">* <?php echo $fnameErr;?></span><br><br>

LNAME : <input type = "text" name = "lname" value="<?php echo $lname;?>"> 
<span class="error">* <?php echo $lnameErr;?></span><br><br>

E-MAIL : <input type = "email" name = "email" value="<?php echo $email;?>">
<span class="error">* <?php echo $emailErr;?></span><br><br>

MOBILE-NO : <input type="number" name="mobileno">
<span class="error">* <?php echo $mobilenoErr;?></span><br><br>

ADDRESS : 
<span><textarea name = "address" rows="3" cols="30" > </textarea></span><br><br>

GENDER : <br>
<input type ="radio" name = "gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female"> Female
<input type ="radio" name = "gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value = "male">Male
<input type ="radio" name = "gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value = "other">Other
<span class="error">* <?php echo $genderErr;?></span><br>

EDUCATION : <br>
<input type ="radio" name = "education" value = "bca">BCA
<input type ="radio" name = "education" value = "bsc">BSC
<input type ="radio" name = "education" value = "engineering">ENGINEERING>
<span class="error">* <?php echo $educationErr;?></span><br><br>

<input type="submit" class="btn btn-primary" value ="SUBMIT">
</form>  
</div>

<?php
echo "<H2> YOUR INPUT : </h2>";
echo "FName : $fname";
echo "<br>";
echo "LName : $lname";
echo "<br>";
echo "Email : $email";
echo "<br>";
echo "MobileNo : $mobileno";
echo "<br>";
echo "Address : $address";
echo "<br>";
echo "Gender : $gender";
echo "<br>";
echo "Education : $education";
echo "<br>";
?>
</body>
</html>