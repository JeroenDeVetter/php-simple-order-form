
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="index.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" type="text/css"
          rel="stylesheet"/>
    <title>Order food & drinks</title>
</head>
<body>
<div class="container">
    <h1>Order food in restaurant "the Personal Ham Processors"</h1>

    <nav>
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link active"  name="foot0" href="?foot0">Order food</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" name = "foot1" href="?foot1">Order drinks</a>
            </li>
        </ul>
    </nav>
    <form method="post">
        <div class="form-row">
            <div class="form-group col-md-6">

                <label for="email">E-mail:</label>
                <label class="error">
                    <?php

                         if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                             if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {

                             }
                             else {
                                 echo 'Must provide valid email';
                                 $_SESSION['street'] = '';
                             }
                         }

                    ?>
                </label>
                <input type="text" id="email" name="email" class="form-control"/>
            </div>

            <div></div>
        </div>

        <fieldset>
            <legend>Address</legend>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="street">Street:</label>
                    <label class="error">
                        <?php
                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                            if (input($_POST['street']) == false && $_POST['street'] == "") {
                                echo 'Must give a street';
                                $_SESSION['street'] = '';
                            }
                        }
                        ?>
                    </label>
                    <input type="text" name="street" id="street" class="form-control">
                </div>
                <div class="form-group col-md-6">
                    <label for="streetnumber">Street number:</label>
                    <label class="error">
                        <?php
                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                            if (input($_POST['streetnumber']) == false && $_POST['streetnumber'] == "") {
                                echo 'Must give a streetnumber';
                                $_SESSION['streetnumber'] = '';
                            }
                        }
                        ?>
                    </label>
                    <input type="text" id="streetnumber" name="streetnumber" class="form-control">
                </div>


            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="city">City:</label>
                    <label class="error">
                        <?php
                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                            if (input($_POST['city']) == false && $_POST['city'] == "") {
                                echo 'Must give a City';
                                $_SESSION['city'] = '';
                            }
                        }
                        ?>
                    </label>
                    <input type="text" id="city" name="city" class="form-control">
                </div>

                <div class="form-group col-md-6">
                    <label for="zipcode">Zipcode</label>
                    <label class="error">
                        <?php
                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                            if (zip_validation($_POST['zipcode']) == false && $_POST['zipcode'] == "") {
                                echo 'Must give a valid ZipCode';
                                $_SESSION['zipcode'] = '';
                            }
                        }
                        ?>
                    </label>
                    <input type="text" id="zipcode" name="zipcode" class="form-control">
                </div>
            </div>
        </fieldset>

        <fieldset>
            <legend>Products</legend>
            <?php
            switch ($_SERVER['REQUEST_URI']) {
                case '/php-simple-order-form/index.php?foot0':
                    foreach ($Breath['products'] as $i => $product) {

                        echo '<label>';
                        echo "<input type='checkbox' value='1' name='products[$i]'/> ";
                        echo $product['name'];
                        echo '- &euro; ';
                        echo number_format($product['price'], 2) . '</label><br />';
                    }
                    $currentTotalValue = 0;
                    if($_SERVER['REQUEST_METHOD'] == 'POST') {
                        foreach ($_POST['products'] AS $i => $product) {
                            $currentTotalValue += $Breath['products'][$i]['price'];
                        }
                        if (isset($_COOKIE['totalValue'])){
                            $totalValue = (int)$_COOKIE['totalValue'];
                        }
                        $totalValue += $currentTotalValue;
                        setcookie('totalValue', (string)$totalValue , time()+5);

                    }
                    break;
                default :
                    foreach ($Drinks['products'] as $i => $product) {
                        echo '<label>';
                        echo "<input type='checkbox' $checkboxState value='1' name='products[$i]'/> ";
                        echo $product['name'];
                        echo '- &euro; ';
                        echo number_format($product['price'], 2) . '</label><br />';
                    }
                    $currentTotalValue = 0;
                    if($_SERVER['REQUEST_METHOD'] == 'POST') {
                        foreach ($_POST['products'] AS $i => $product) {
                            $currentTotalValue += $Drinks['products'][$i]['price'];

                        }
                        if (isset($_COOKIE['totalValue'])){
                            $totalValue = (int)$_COOKIE['totalValue'];
                            array_push($state , $_SESSION['clicked'] = 'clicked');
                        }
                        $totalValue += $currentTotalValue;
                        $checkboxState = $_SESSION['state'];
                        var_dump($state);
                        setcookie('totalValue', (string)$totalValue, time()+20);

                    }
                    break;
            }
            ?>
        </fieldset>

        <button type="submit" class="btn btn-primary">Order!
        <?php  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_SESSION['street'] = $_POST['email'];
            $_SESSION['street'] = $_POST['street'];
            $_SESSION['streednr'] = $_POST['streetnumber'];
            $_SESSION['city'] = $_POST['city'];
            $_SESSION['zipcode'] = $_POST['zipcode'];


        }?>
        </button>
    </form>

    <footer>You already ordered <strong>&euro; <?php echo $totalValue ?></strong> in food and drinks.</footer>

</div>

<style>
    footer {
        text-align: center;
    }
</style>
</body>
</html>