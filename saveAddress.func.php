<!--
    adds a new account to the database if the username is unique
-->

<?php
    //connect to the database
    require_once "dbconn.inc.php";

    //Load the session variables
    session_start();

        //The query to send to the database
        $sql = "UPDATE Accounts SET address1 = ?, address2 = ?, suburb = ?, stat = ?, postcode = ? WHERE accountName=\"" . $_SESSION["loggedInUser"] . "\";";

        $statement = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($statement, $sql);

        //Get the values from the form, add to the query
        mysqli_stmt_bind_param($statement, 'sssss', htmlspecialchars($_POST["address1"]), htmlspecialchars($_POST["address2"]), htmlspecialchars($_POST["suburb"]), htmlspecialchars($_POST["stat"]), htmlspecialchars($_POST["postcode"]));

        //Execute
        if( mysqli_stmt_execute($statement) ){
            //If it worked, go back where we started
            header("location: checkout3.php");
        } else {
            //If it didnt, weve got an error
            echo($mysqli_error($conn));
        }

        //close connection
        mysqli_close($conn);
        
    

    //close connection
    //mysqli_close($conn);
?>