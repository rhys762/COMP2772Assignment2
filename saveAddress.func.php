<!--
    adds a new account to the database if the username is unique
-->

<?php
    //connect to the database
    require_once "dbconn.inc.php";

    session_start();

    //the statement to sned to the database
    $sql = "UPDATE accounts SET address1 = ?, address2 = ?, suburb = ?, stat = ?, postcode = ? WHERE accountName = " . $_SESSION["loggedInUser"] . ";";

    //Init sql connection
    $statement = mysqli_stmt_init($conn);
 
    //Complete the statement
    mysqli_stmt_prepare($statement, $sql);

    mysqli_stmt_bind_param($statement, 'ssssi', htmlspecialchars($_POST["address1"]), htmlspecialchars($_POST["address2"]), htmlspecialchars($_POST["suburb"]), htmlspecialchars($_POST["stat"]), htmlspecialchars($_POST["postcode"]));
    mysqli_stmt_execute($statement);

    //close connection
    mysqli_close($conn);
    //header("location: checkout3.php");

?>