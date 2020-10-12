<!--
    Checkout page
-->

<head>
    <title>BuyThings.com Checkout</title>
    <meta charset="UTF-8">
    <meta name="description" content="This is a place to buy things :)">
    <meta name="author" content="Galadriel Group">
    <link rel="stylesheet" href="styles/styles.css">
</head>

<body>
<?php
    //start the session
    session_start();
    //display header
    require_once "displayHeader.func.php";

    require_once "itemDisplay.func.php";

    echo "<h3>Your Cart:</h3>";
    //connect to the database
    require_once "dbconn.inc.php";

    //need to get all items in the users cart:
    //use the following query
    $sqlquery = "SELECT * FROM `Products` where id in (SELECT id FROM `Cart` where accountName = \"" . $_SESSION["loggedInUser"] . "\");";

    //send off the statement to sql
    if($result=mysqli_query($conn, $sqlquery))
    {
        //iterate through the query result
        while($row = mysqli_fetch_assoc($result))
        {
            //this function is declared in itemDisplay.func.php
            displayItem($row, $conn);
        }
        //free up result
        mysqli_free_result($result);
    }
    else
    {
        echo "sql error";
    }

    //close connection
    mysqli_close($conn);
?>
</body>