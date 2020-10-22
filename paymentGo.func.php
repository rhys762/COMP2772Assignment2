<!--
    processes the payment for the user
-->

<?php

    //connect to the database
    require_once "dbconn.inc.php";

    //Load the session variables
    session_start();

    //Check the card number - using Luhn algo
    // Get the card no entered
    $number=$_POST["cardNo"];

    //Check its 16 digits
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
    }

?>