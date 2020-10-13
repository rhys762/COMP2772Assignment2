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
        //include func
        require_once "modifyItemQuantity.dec.php";

        modifyItemQuantity($conn, $_GET["id"], $_GET["quantity"]);

        
        //close connection
        mysqli_close($conn);

        //redirect to checkout
        header("location: checkout.php");
    }
    else
    {
        echo "error, get values not set";
    }

?>