<!--
    save a completed and paid order, ready for fulfilment
-->

<?php
    //connect to the database
    require_once "dbconn.inc.php";
    

    //Load the session variables
    session_start();

    //Get the next order ID    
 
    //How may ids are there
    $countquery = mysqli_query($conn, "SELECT COUNT(DISTINCT orderid) as count FROM 'orders';");
    $countrows = mysqli_fetch_assoc($countquery);
    $count = $countrows['count'];



    $nextID = $count + 100 + 1; //Add 100 to format, then increment by 1

    echo $nextID;




    //Close the connection
    mysqli_close($conn);

    //Save each item from the cart to the order




?>