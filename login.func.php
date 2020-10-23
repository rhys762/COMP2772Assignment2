<!-- 
    this performs the login probably
-->

<head>
    <title>Log In</title>
    <meta charset="UTF-8">
    <meta name="description" content="This is a place to buy things :)">
    <meta name="author" content="Galadriel Group">
    <link rel="stylesheet" href="styles/styles.css">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Creepster'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>

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
            mysqli_close($conn);
            header("location: home.php");
        }
        else
        {
            require_once "displayHeader.func.php";
            echo "<div id='loginError'><p>The information you have entered is either invalid or incorrect. Please try again.</p></div>";
        }
    }
    else
    {
        echo "im sorry, we appeared to have an error on our end, our code monkeys are working very hard to fix this";
    }

    //close connection
    mysqli_close($conn);
?>