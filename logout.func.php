<!--
    logout of an account, redirect to home page
-->

<?php
    //start session
    session_start();

    unset($_SESSION["loggedInUser"]);

    header("location: home.php");

?>