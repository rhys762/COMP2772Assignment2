<!--
    Checkout page
-->

<head>
    <title>Checkout</title>
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

    echo "<div class='paymentWrapper'>";
    echo "<div class='finalPrice'>";

    echo "<h3>Your total is ";
    echo displayPrice($_SESSION["cart_total"]);
    echo "</h3>";

    //Get the user's address
    $sql_prev = "SELECT * FROM `accounts` where accountName = \"" . $_SESSION["loggedInUser"] . "\";";
    $query_prev = mysqli_query($conn, $sql_prev);
    $rows_prev =  mysqli_fetch_assoc($query_prev);

    
    echo "<h3>Shipping to: ";
    echo $rows_prev["address1"] . ", ";
    if($rows_prev["address2"] != NULL){
        echo $rows_prev["address2"] . ", ";
    }
    echo $rows_prev["suburb"] . ", " . $rows_prev["stat"] . ", " . $rows_prev["postcode"];
    echo "</h3>";

    echo "</div>";

    if(isset($_SESSION['cardWrong']))
    {
        if($_SESSION['cardWrong'] == 1)
        {
            echo "<div class=errorMsg>" . "<p class =\"errorText\">Invalid card number. Please try again</p>" . "</div>";
            //unset it so if the user navigate away and then comes back its not still there
            unset($_SESSION['cardWrong']);
        }
    }

    if(isset($_SESSION['payWrong']))
    {
        if($_SESSION['payWrong'] != 0)
        {
            echo "<div class=errorMsg>" . "<p class =\"errorText\">Payment error. Please try again (" . $_SESSION['payWrong'] .")</p></div>";
            //unset it so if the user navigate away and then comes back its not still there
            unset($_SESSION['payWrong']);
        }
    }


?>

<div class="paymentForm">
    <div class="paymentHeading"><h3>Payment Details:</h3></div><br><br>
    <form action="paymentGo.func.php" method="POST">

    <div class="cardIcons">
        <input type="radio" class="cardType" id="visa" name="cardType" value="visa" required>
        <label for="visa"><img src="images/cards/visa.png" width="60"></label>
        <input type="radio" class="cardType" id="mastercard" name="cardType" value="mastercard">
        <label for="mastercard"><img src="images/cards/mastercard.png" width="60"></label>
        <input type="radio" class="cardType" id="amex" name="cardType" value="amex">
        <label for="amex"><img src="images/cards/amex.png" width="60"></label>
        <input type="radio" class="cardType" id="eftpos" name="cardType" value="eftpos">
        <label for="eftpos"><img src="images/cards/eftpos.png" width="60"></label><br>
</div>

        <label for="cardNo">Card Number:</label><br>
        <input type="text" name="cardNo" pattern="[0-9]*" maxlength="19" required><br>
        <label for="cardName">Name on Card:</label><br>
        <input type="text" name="cardName" required><br>
        <label for="cvv">CVV:</label><br>
        <input type="text" name="cvv" pattern="[0-9]*" maxlength="3" required><br>
        <label for="expDate">Expiry Date:</label><br>
        <input type="month" name="expDate" required><br>
        <input type="submit" id="accountSubmit" value="Checkout">
    </form>
</div>
</div>
</body>