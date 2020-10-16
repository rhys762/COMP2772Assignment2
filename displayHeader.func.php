<!-- 
    This should be called after opening the body for each page
    container at the top of page holding page title,
    search bar, navigation account login etc to be decided
-->

<div class="pageHeader">
    <h1>Halloween Companion Monsters</h1>

    <div id="leftHeaderImage">
        <img id="pumpkin" src="images/Pumpkin.png" alt="Halloween Pumpkin" width="100" height="100">
    </div>

    <form id="searchBar" action="performSearch.php" method="POST">
        <input type="text" name="searchValue" placeholder="Search for keywords..">
        <input type="submit" value="">
    </form>

    <div class="centerList">
    <ul id="links">
        <li><a href="home.php">Home</a></li>
        <li><a href="specials.php">Specials</a></li>
        <!--
            if we are logged in display cart or something otherwise display login
        -->
        <?php
            //start session
            session_start();
            //do the check for login
            if(isset($_SESSION["loggedInUser"]))
            {

                echo "<li><a href=\"logout.func.php\">Log Out of Account \"" . $_SESSION["loggedInUser"] . "\"</a></li>";
                echo "<li><a href=\"checkout.php\">Checkout</a></li>";
            }
            else
            {
                echo "<li><a href=\"createAccount.php\">Create Account</a></li>";
                echo "<li><a href=\"login.php\">Log In</a></li>";
            }
        ?>
    </ul>
        </div>
</div>