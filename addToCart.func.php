<!--
    This should add something to the cart when called
    the something will be determined by the url, get etc whatever
-->

<?php
    //if the id was set:
    if(isset($_GET["id"]) && isset($_GET["quantity"]))
    {
        //start session (need user id)
        session_start();
        //connect to the database
        require_once "dbconn.inc.php";

        //then write a query to add it to the database
        //okay not as simple as initially thought, we should check if its already in the cart, ill fix that later

        //query used to insert
        $sqlquery = "INSERT INTO Cart (accountName, id, quantity) VALUES (?, ?, ?)";

        //voodoo shit copied from prac 3:
        $statement = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($statement, $sqlquery);
        mysqli_stmt_bind_param($statement, 'sii', htmlspecialchars($_SESSION["loggedInUser"]), htmlspecialchars($_GET["id"]), $_GET["quantity"]);
        
        if(mysqli_stmt_execute($statement))
        {
            //close connection
            mysqli_close($conn);
            header("location: checkout.php");
        }
        else
        {
            echo "execute error";
        }
        
    }
    else
    {
        echo "error";
    }

?>