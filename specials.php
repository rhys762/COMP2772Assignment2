<!--
    Displays any specials on the site
-->

<head>
    <title>BuyThings.com Specials</title>
    <meta charset="UTF-8">
    <meta name="description" content="This is a place to buy things :)">
    <meta name="author" content="Galadriel Group">
    <link rel="stylesheet" href="styles/styles.css">
</head>

<body>
    <?php
        //display header
        require_once "displayHeader.func.php";
        //connect to the database
        require_once "dbconn.inc.php";

        require_once "displayItem.dec.php";

        $sqlquery = "SELECT * FROM `products` where specialPrice is not null";
        //send off the statement to sql
        if($result=mysqli_query($conn, $sqlquery))
        {
            //now display, if any exist, matches to the regex
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