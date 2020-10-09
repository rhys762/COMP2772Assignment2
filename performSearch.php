
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
                echo "<div class=\"searchResultItem\">";
                echo "<p class=\"itemName\">" . $row["name"] . "</p>";
                //display prices for sale items differently:
                if($row["specialPrice"])
                {
                    echo "<p class=\"worsePrice\">$" . $row["price"] . "</p>";
                    echo "<p class=\"betterPrice\">$" . $row["specialPrice"] . "</p>";
                }
                else
                {
                    echo "<p class=\"itemPrice\">$" . $row["price"] . "</p>";
                }
                
                echo "<img class=\"itemImage\" src=\"images/" . $row["imgPath"] . "\">";
                echo "</div>";
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