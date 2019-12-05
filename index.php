<?php
//this line makes PHP behave in a more strict way
declare(strict_types=1);

//we are going to use session variables so we need to enable sessions
session_start();



//your products with their price.
$products = [
    ['name' => 'Club Ham', 'price' => 3.20],
    ['name' => 'Club Cheese', 'price' => 3],
    ['name' => 'Club Cheese & Ham', 'price' => 4],
    ['name' => 'Club Chicken', 'price' => 4],
    ['name' => 'Club Salmon', 'price' => 5]
];


$products = [
    ['name' => 'Cola', 'price' => 2],
    ['name' => 'Fanta', 'price' => 2],
    ['name' => 'Sprite', 'price' => 2],
    ['name' => 'Ice-tea', 'price' => 3],
];

//email validation


function whatIsHappening() {


    echo '<h2>$_GET</h2>';


    echo '<h2>$_POST</h2>';
    var_dump(email_validation($_POST['email']));
    var_dump($_POST['street']);
    var_dump($_POST['streetnumber']);
    var_dump($_POST['city']);
    var_dump($_POST['zipcode']);

    $var = $_GET['products[1]'];
    if(isset($var)){
        var_dump($var);
    }


    echo '<h2>$_COOKIE</h2>';
    var_dump($_COOKIE);

    echo '<h2>$_SESSION</h2>';
    var_dump($_SESSION);
}

$totalValue = 0;

require 'form-view.php';
whatIsHappening();