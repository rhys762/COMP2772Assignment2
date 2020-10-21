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

    require_once "displayItem.dec.php";
    require_once "getNumberOfItemsInCart.dec.php";
    require_once "displayPrices.func.php";

    echo "<div class='checkoutWrapper'>";

    //connect to the database
    require_once "dbconn.inc.php";

    //need to get all items in the users cart:
    //use the following query
    $sqlquery = "SELECT * FROM `Products` where id in (SELECT id FROM `Cart` where accountName = \"" . $_SESSION["loggedInUser"] . "\");";

    //store the running total
    $runningTotal = 0;

    //send off the statement to sql
    if($result=mysqli_query($conn, $sqlquery))
    {
        echo "<div class='checkoutGrid'>";
        //iterate through the query result
        while($row = mysqli_fetch_assoc($result))
        {
            //this function is declared in itemDisplay.func.php
            displayItem($row, $conn);

            //active price is special price if it is set (ie the item is on special), otherwise its just price
            $activePrice = ($row["specialPrice"]) ? $row["specialPrice"] : $row["price"];

            //add to the total
            $runningTotal += ($activePrice * getNumberOfItemsInCart($row["id"],$conn));
        }
        //free up result
        echo "</div>";
    }
    else
    {
        echo "sql error";
    }

    mysqli_free_result($result);
    echo "<div class='orderSummary'>";
    echo "<h3>ORDER SUMMARY:</h3>";
    echo "<p> X Items ";
    echo "<p>Total ";
    echo displayPrice($runningTotal);
    echo "<p><br>";
    echo "<button id='checkoutbtn'>Checkout</button>";

    echo "</div>";

    //close connection
    mysqli_close($conn);
?>
</body>