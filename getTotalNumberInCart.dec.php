<?php
    /*
        takes a connection to db, returns the total number of items in the users cart
    */
    function getTotalNumberInCart($conn)
    {
        //start session
        session_start();
        //connect to the database
        //require_once "dbconn.inc.php";

        //sql query returning quantity
        $sqlquery = "SELECT sum(quantity) as `amt` FROM `Cart` where accountName = \"" .
        $_SESSION["loggedInUser"] . 
        "\";";

        //send it off to sql
        $result = mysqli_query($conn, $sqlquery);

        //value to be returned
        $returnVal = 0;

        if($row = mysqli_fetch_assoc($result))
        {
            $returnVal = $row["amt"];
        }

        //close connection
        //mysqli_close($conn);
        //free up result
        mysqli_free_result($result);

        return $returnVal;
    }
?>