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
    $countquery = mysqli_query($conn, "SELECT COUNT(DISTINCT orderid) as count FROM orders;");
    $countrows = mysqli_fetch_assoc($countquery);
    $count = $countrows['count'];

    $nextID = $count + 100 + 1; //Add 100 to format, then increment by 1
    echo $nextID . "<br>";

    //Save each item from the cart to the order

    //need to get all items in the users cart:
    //use the following query
    $sqlquery = "SELECT * FROM `Cart` where id in (SELECT id FROM `Cart` where accountName = \"" . $_SESSION["loggedInUser"] . "\");";
    echo $_SESSION["loggedInUser"] . "<br>";
    //send off the statement to sql
    if($result=mysqli_query($conn, $sqlquery))
    {
        //iterate through the query result
        while($row = mysqli_fetch_assoc($result))
        {
            //add this item to the order

            //create the query
            //INSERT INTO orders (orderid, accountName, id, quantity, paymentID) VALUES (104,    "sam",  4,  7,  "1a2b3c4d");
            //                                                                           orderid, accountName, id, quantity, paymentID

            //Prepare the sql statement
            $addquery = "INSERT INTO orders (orderid, accountName, id, quantity, paymentID) VALUES (" . $nextID . ",\"" . $_SESSION['loggedInUser'] ."\"," . $row['id'] ."," . $row['quantity'] .",\"" . $_SESSION['payID'] ."\");";

             //Init sql connection
            $statement = mysqli_stmt_init($conn);

            echo $addquery;
           //Complete the statement
            mysqli_stmt_prepare($statement, $addquery);
            mysqli_stmt_execute($statement);

            echo "added " . $row['quantity'] . " * " . $row['id'] . "<br>";

        }
    }




    //Close the connection
    mysqli_close($conn);

   




?>