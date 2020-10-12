
<head>
    <title>BuyThings.com Search Results</title>
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

    require_once "itemDisplay.func.php";

    //check the search field was set
    if(isset($_POST["searchValue"]))
    {
        //for now just check against name
        //% is regex * because why the fuck
        $lowerCaseSearchValue = strtolower($_POST["searchValue"]);
        $sqlquery = "SELECT * FROM `products` where LOWER(name) like '%" . $lowerCaseSearchValue . "%'" ;


        //send off the statement to sql
        if($result=mysqli_query($conn, $sqlquery))
        {
            //now display, if any exist, matches to the regex
            echo "<p>Showing " . mysqli_num_rows($result) . " result(s) for\"" . $_POST["searchValue"] . "\"</p>";
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

    }
    else
    {
        echo "error, invalid form submission";
    }

    //close connection
    mysqli_close($conn);
?>

</body>