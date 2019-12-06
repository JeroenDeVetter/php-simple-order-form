<?php
//this line makes PHP behave in a more strict way



//include Chrome Log Exaction
include "/var/www/becode/ChromePhp.php";

//we are going to use session variables so we need to enable sessions
session_start();

ChromePhp::log($_SERVER['REQUEST_URI']);

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

//validation email
function email_validation($str) {
    return (!preg_match(
        "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", $str))
        ? FALSE : TRUE;
}

//validation for zip
function zip_validation($str1) {
        return (!preg_match(
            '/^(?:(?:[1-9])(?:\d{3}))$/', $str1))
            ? FALSE : TRUE;
}

//your products with their price.
$Breath = [
    ['name' => 'Club Ham', 'price' => 3.20],
    ['name' => 'Club Cheese', 'price' => 3],
    ['name' => 'Club Cheese & Ham', 'price' => 4],
    ['name' => 'Club Chicken', 'price' => 4],
    ['name' => 'Club Salmon', 'price' => 5]
];

ChromePhp::log($Breath[0]['price']);

$Drinks = [
    ['name' => 'Cola', 'price' => 2],
    ['name' => 'Fanta', 'price' => 2],
    ['name' => 'Sprite', 'price' => 2],
    ['name' => 'Ice-tea', 'price' => 3],
];

//email validation



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

$totalValue = 0;

include 'form-view.php';
whatIsHappening();