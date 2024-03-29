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

    //If they have a payment ID, the cart needs saving to an order
    if(isset($_SESSION['payID'])){
        //Redirect to the script
        header("location: saveOrder.func.php");
    }

    echo "<div class='shopSuccess'>";
    echo "<h1>Thanks for shopping with us!</h1>";

    echo "<h3><a href='home.php'> Click here to return to the home page </a></h3>";
    echo "</div>";

    

?>