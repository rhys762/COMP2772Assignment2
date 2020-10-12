<!--
    this takes an object id as a parameter and a connection to the database (errors abound when the connection was made from the function \o/)
    returns the number of such items in the current users cart

    assumes there is actually a user logged in, UB if not probably
-->

<?php
    function getNumberOfItemsInCart($itemid, $conn)
    {
        //start session
        session_start();
        //connect to the database
        //require_once "dbconn.inc.php";

        //sql query returning quantity
        $sqlquery = "SELECT quantity FROM `Cart` where accountName = \"" .
        $_SESSION["loggedInUser"] . 
        "\" and id = " . 
        $itemid . 
        ";";

        //send it off to sql
        $result=mysqli_query($conn, $sqlquery);

        //value to be returned
        $returnVal = 0;

        if($row = mysqli_fetch_assoc($result))
        {
            $returnVal = $row["quantity"];
        }

        //close connection
        //mysqli_close($conn);
        //free up result
        mysqli_free_result($result);

        return $returnVal;
    }
?>