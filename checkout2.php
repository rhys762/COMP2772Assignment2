<!--
    Checkout page
-->

<head>
    <title>BuyThings.com Checkout</title>
    <meta charset="UTF-8">
    <meta name="description" content="This is a place to buy things :)">
    <meta name="author" content="Galadriel Group">
    <link rel="stylesheet" href="styles/styles.css">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Creepster'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<body>
<?php
    //start the session
    session_start();
    //display header
    require_once "displayHeader.func.php";

    require_once "displayPrices.func.php";

    //connect to the database
    require_once "dbconn.inc.php";

    //Has the user saved their details?
    $sql_prev = "SELECT * FROM `accounts` where accountName = \"" . $_SESSION["loggedInUser"] . "\";";
    $query_prev = mysqli_query($conn, $sql_prev);
    $rows_prev =  mysqli_fetch_assoc($query_prev);

    //Show saved details, if there are any
    if($rows_prev["address1"] != NULL){
        echo "<p><a href='checkout3.php'>Use saved address?</a></p>";
        echo $rows_prev["address1"] . "<br>";
        echo $rows_prev["address2"] . "<br>";
        echo $rows_prev["suburb"] . "<br>";
        echo $rows_prev["stat"] . "<br>";
        echo $rows_prev["postcode"] . "<br>";
    }

    //close connection
    mysqli_close($conn);

    //Or, user enters new details

    echo "<div class='addressWrapper'>";

    echo "<div class='finalPrice'>";
    echo "<h3>ORDER SUMMARY:</h3>";
    echo "<p>Total ";
    echo displayPrice($_SESSION["cart_total"]);
    echo "</p>";
    echo "</div>";
    
    echo "<div class='addressForm'>";
    echo "<div class='deliveryHeading'><h3>Delivery Address:</h3></div><br><br>";
    echo "<form action='saveAddress.func.php' method='POST'>";
    echo "<label for='address1'>Address Line 1:</label><br>";
    echo "<input type='text' name='address1' required><br>";
    echo "<label for='firstName'>Address Line 2:</label><br>";
    echo "<input type='text' name='address2'><br>";
    echo "<label for='suburb'>Suburb:</label><br>";
    echo "<input type='text' name='suburb' required><br>";
    echo "<label for='stat'>State:</label><br>";
    echo "<select name='stat'>";
    echo "<option value='ACT'>ACT</option>";
    echo "<option value='NSW'>NSW</option>";
    echo "<option value='NT'>NT</option>";
    echo "<option value='Qld'>Qld</option>";
    echo "<option value='SA'>SA</option>";
    echo "<option value='Tas'>Tas</option>";
    echo "<option value='Vic'>Vic</option>";
    echo "<option value='WA'>WA</option>";
    echo "</select><br>";
    echo "<label for='postcode'>Postcode:</label><br>";
    echo "<input type='text' name='postcode' pattern='[0-9]*' maxlength='4'><br>";
    echo "<input type='submit' id='accountSubmit' value='Save Address'>";
    echo "</form>";
    echo "</div>";

    echo "</div>";
    ?>
</body>