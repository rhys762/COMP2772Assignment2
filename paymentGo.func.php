<!--
    processes the payment for the user
-->

<?php

    //connect to the database
    require_once "dbconn.inc.php";

    //connect to the demo payment gateway
    require_once "paymentGateway.func.php";

    //Load the session variables
    session_start();

    //Get the payment details entered
    $type = $_POST["cardType"];
    $number=$_POST["cardNo"];
    $name = $_POST["cardName"];
    $cvv = $_POST["cvv"];
    $expiry = $_POST["expiry"];

    //Check the card number - using Luhn algo

    //Check its 8 - 19 digits
    if(strlen($number) != 16){ //Otherwise its invalid
        $_SESSION['cardWrong'] = 1; //Save in the browser
        header("location: checkout3.php"); //Send them back to try again
    }

    // Loop through each digit and do the maths
    $runningTotal=0; //Keep a running total
    for ($i = 0; $i < 16; $i++) {
        $j = $number[$i];
        // Multiply alternate digits by two
        if ($i % 2 == 0) {
        $j*=2;
        // If the sum is a two digit number, add them together (in effect)
        if ($j > 9) {
            $j-=9;
        }
        }
        // Total up the digits
        $runningTotal+=$j;
    }

    // If the total mod 10 is not 0, the number is invalid
    if($runningTotal % 10 !== 0){
        $_SESSION['cardWrong'] = 1; //Save in the browser
        header("location: checkout3.php"); //Send them back to try again
        exit();
    }

    //Since the card number looks to be valid:
    //Try and process payment
    $payment = processPayment($number, $name, $cvv, $expiry, $type);
    //If the payment was approved:
    if($payment == "00"){
        header("location: checkoutFinished.php"); //Send them to the final page
    } else { //Or, declined:
        $_SESSION['payWrong'] = $payment; //Save in the browser
        header("location: checkout3.php"); //Send them back to try again
        exit();
    }


?>