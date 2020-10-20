<!--
    Main shopping page
-->

<head>
    <title>Shop</title>
    <meta charset="UTF-8">
    <meta name="description" content="This is a place to buy things :)">
    <meta name="author" content="Galadriel Group">
    <link rel="stylesheet" href="styles/styles.css">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Creepster'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>

<body>

    <?php
        //pull the header
        require_once "displayHeader.func.php"; 
        
        //display all items in products:

        //connect to the database
        require_once "dbconn.inc.php";

        //include function
        require_once "displayItem.dec.php";

        $sqlquery = "SELECT * FROM `Products`" ;

        //send off the statement to sql
        if($result=mysqli_query($conn, $sqlquery))
        {
            echo "<div class='gridWrapper'>";
            //iterate through the query result
            while($row = mysqli_fetch_assoc($result))
            {
                //this function is declared in itemDisplay.func.php
                displayItem($row, $conn);
            }
            //free up result
            mysqli_free_result($result);
            echo "</div>";
        }
        else
        {
            echo "sql error";
        }

        //close connection
        mysqli_close($conn);
    ?>

</body>
