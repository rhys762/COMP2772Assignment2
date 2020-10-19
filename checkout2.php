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

    echo "<h3>Your total is ";
    echo displayPrice($_SESSION["cart_total"]);
    echo "</h3>";

    echo "<a href='checkout2.php'>Checkout</a>";

    //close connection
    mysqli_close($conn);
?>
</body>