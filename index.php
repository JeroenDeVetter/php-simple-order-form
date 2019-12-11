<?php


//this line makes PHP behave in a more strict way
ini_set('display_errors', "1");
ini_set('display_startup_errors', "1");
error_reporting(E_ALL);

//we are going to use session variables so we need to enable sessions
session_start();



//function for input if valid
function input($string) {
    return (!preg_match("^([ ]*+[0-9A-Za-z]++[ ]*+)+^", $string))
        ? FALSE : TRUE;
}


//validation Number
function Number_Validation($strng3) {
    return (!preg_match(
        "^([0-9]{1,4})([A-Za-z]{1,2})?([0-9]{1,3})?$^", $strng3))
        ? FALSE : TRUE;
}

//validation for zip
function zip_validation($str1) {
        return (!preg_match(
            '/^(?:(?:[1-9])(?:\d{3}))$/', $str1))
            ? FALSE : TRUE;
}


//your products with their price.
$currentHour = date('H:i');
$deriveryTime = '';
$currentTotalValue = 0;
$totalValue = 0;
   $Breath = [
    'products' => [
        ['name' => 'Club Ham', 'price' => 3.20],
        ['name' => 'Club Cheese', 'price' => 3],
        ['name' => 'Club Cheese & Ham', 'price' => 4],
        ['name' => 'Club Chicken', 'price' => 4],
        ['name' => 'Club Salmon', 'price' => 5]
    ]
   ];

 $Drinks =[
    'products' => [
        ['name' => 'Cola', 'price' => 2],
        ['name' => 'Fanta', 'price' => 2],
        ['name' => 'Sprite', 'price' => 2],
        ['name' => 'Ice-tea', 'price' => 3]
      ]
    ];

 $checkboxState = '';
 $state = [];

function whatIsHappening() {
    echo '<h2>$_GET</h2>';
    echo '<h2>$_POST</h2>';
if(!isset($_POST['products[0]']) ) {
    unset($_SESSION['mycheckbox']);
}

    echo '<h2>$_COOKIE</h2>';
    var_dump($_COOKIE);

    echo '<h2>$_SESSION</h2>';

    var_dump($_SESSION);


}






include 'form-view.php';


whatIsHappening();
?>