<!-- OOPs -->
<?php

// class Trannie{
//      public $id;
//     public $name;
//     public $technology;

//     function setId($id){
//         $this->id = $id;
//     }

//    function getId(){
//         return $this->id;
//     }

//     public function setName($name){
//         $this->name =$name;
//     }

//     public function getName(){
//         return $this->name;
//     }


//     public function setTechnology($technology){
//         $this->technology =$technology;
//     }

//     public function getTechnology(){
//         return $this->technology;
//     }

// }

// $office = new Trannie;

// $office->setId("2042");
// $office->setName("Divesh");
// $office->setTechnology("Web Game Development");

// echo "ID :" . $office->getId() ."<br>";
// echo "NAME :" . $office->getName() ."<br>";
// echo "TECHNOLOGY :" .$office->getTechnology() ."<br>";

?> 

<!-- Constructor -->
<?php
// class GirlsCloth {
//     public $jeans;
//     public $top;

//     function __construct($jeans, $top){
//         $this->jeans = $jeans;
//         $this->top = $top;
//     }

    // function get_jeans(){
    //     return $this->jeans;
    // }

    // function get_top(){
    //     return $this->top;
    // }

//     function __destruct(){
//         echo $this->jeans . "<br>" . $this->top;
//     } 

// }

// $shopping = new GirlsCloth("Mom's Jeans","Crop Top");
// echo $shopping->get_jeans();
// echo "<br>";
// echo $shopping->get_top();
?>

<?php
class Animal{
    public $name;
    public $color;

    public function __construct($name,$color){
        $this->name = $name;
        $this->color = $color;
    } 

    public function intro(){
        echo "My name is : {$this->name} <br> and the color is : {$this->color}.";

    }
}

class Cat extends Animal{
    public function message(){
        echo "I am pet animal <br>";
    }
}

$animal = new Cat("jerry","white");
$animal->message();
$animal->intro();
?>
