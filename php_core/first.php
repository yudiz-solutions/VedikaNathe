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

<!-- PHP $_REQUEST  -->
<!-- <DOCTYPE>
<html>
<body>
<form method = "post" action = "<?php echo $_SERVER['PHP_SELF'];?>">
NAME : <input type = "text" name = "fname"><br><br><br>

LNAME : <input type = "text" name = "lname"><br><br><br>

E-MAIL : <input type = "text" name = "email"><br><br><br>

ADDRESS : <textarea name = "address" rows="5" cols="40" > </textarea><br><br><br>

GENDER : 
<input type ="radio" name = "gender" value = "female">female
<input type ="radio" name = "gender" value = "male">Male
<input type ="radio" name = "gender" value = "other">other



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
<?

// Set a cookie 
// setcookie("mycookie", "Hello, world!", time() + 3600, "/");

// // Retrieve the value of the cookie

// if(isset($_COOKIE['mycookie'])) {

//     $cookieValue = $_COOKIE['mycookie'];
//     echo "The value of the cookie is: " . $cookieValue;
// } else {

//     echo "Cookie not set";
// }
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

<!-- OOPs -->
<?php

class Trannie{
    public $id;
    // public $name;
    // public $technology;

    function setId($id){
        $this->id = $id;
    }

   function getId($id){
        echo $this->id;
    }

    // public function setName($name){
    //     $this->name =$name;
    // }

    // public function getName($name){
    //     return $this->name;
    // }


    // public function setTechnology($technology){
    //     $this->technology =$technology;
    // }

    // public function getTechnology($technology){
    //     return $this->technology;
    // }

    }
$obj = new Trannie();
$obj->setId("102");
 $obj->getId();
?>
