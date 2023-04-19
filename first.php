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

<!--  -->






