<!--
    adds a new account to the database if the username is unique
-->

<?php
    //connect to the database
    require_once "dbconn.inc.php";

    //this returns true if the username is already in the database, or if we cant connect to the database
    function usernameAlreadyExists($conn, $username)
    {
        $sqlquery = "SELECT * FROM `Accounts` where accountName = '" . $username . "';";
        //echo $sqlquery;
        if($result=mysqli_query($conn, $sqlquery))
        {
            return (mysqli_num_rows($result) > 0);
        }
        else
        {
            echo mysqli_error($conn);
        }
        //if we had an error we wont be able to create an account anyway, so just return true
        return true;
    }


    session_start();
    if(usernameAlreadyExists($conn, $_POST["username"]))
    {//if the username already exists
        $_SESSION['unameTaken'] = 1;//glob for indicating taken uname
        header("location: createAccount.php");
    }
    else
    {
        $_SESSION['unameTaken'] = 0;//placeholder logic for now
        //the statement to sned to the database
        $sql = "INSERT INTO Accounts (accountName, firstname, lastname, password) VALUES(?, ?, ?, ?);";

        //voodoo shit copied from prac 3:
        $statement = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($statement, $sql);
        mysqli_stmt_bind_param($statement, 'ssss', htmlspecialchars($_POST["username"]), htmlspecialchars($_POST["firstname"]), htmlspecialchars($_POST["lastname"]), htmlspecialchars($_POST["password"]));
        mysqli_stmt_execute($statement);

        header("location: login.php");
    }

    //close connection
    mysqli_close($conn);
?>