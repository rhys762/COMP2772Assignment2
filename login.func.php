<!-- 
    this performs the login probably
-->

<?php
    //start the session
    session_start();

    //connect to the database
    require_once "dbconn.inc.php";

    //send a query to the db asking if there is a username and password matching,
    //if there is the result will be the username we queried for, otherwise no result
    //the query being:
    $sqlquery = "SELECT accountName FROM `Accounts` where accountName = \"" . $_POST["username"] . "\" and password = \"" . $_POST["password"] . "\";";
    
    //if we can succesfully perform the query
    if($result=mysqli_query($conn, $sqlquery))
    {
        //if the query returns something and that something is a maching username
        if(($row = mysqli_fetch_assoc($result)) and $row["accountName"] == $_POST["username"])
        {
            //succesful log in, which we will store in the session
            $_SESSION["loggedInUser"] = $_POST["username"];
            header("location: home.php");
        }
    }
    else
    {
        echo "db error";
    }

    //close connection
    mysqli_close($conn);
?>