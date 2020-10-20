<!-- 
    This should be called after opening the body for each page
    container at the top of page holding page title,
    search bar, navigation account login etc to be decided
-->

<div class="pageHeader">
    <h1><a href="home.php">Halloween Monster Pets</a></h1>

    <div class="topnav">
        <ul id="links">
            <li><a href="shop.php">Shop</a></li
            ><li><a href="aboutUs.php">About Us</a></li
            <?php
            //start session
            session_start();
            //do the check for login
            if (isset($_SESSION["loggedInUser"])) {
                //golly gee, i seem to have missed a angled bracket here and there right?
                //no
                //its deliberate and its a hack because the buttons have to be flush and inline block is stupid
                //got it here https://stackoverflow.com/questions/19038799/why-is-there-an-unexplainable-gap-between-these-inline-block-div-elements
                echo "><li><a href=\"logout.func.php\">Log Out of Account \"" . $_SESSION["loggedInUser"] . "\"</a></li>";
                echo "<li><a href=\"checkout.php\">Checkout</a></li>";
            } else {
                echo "><li><a href=\"createAccount.php\">Sign Up</a></li>";
                echo "<li><a href=\"login.php\">Log In</a></li>";
            }
            ?>
        </ul>
    </div>

    <div id="rightHeaderImage">
        <img id="pumpkin" src="images/header/Pumpkin2.png" alt="Halloween Pumpkin" width="100" height="100">
    </div>

    <div id="leftHeaderImage">
        <img id="spider" src="images/header/SpiderString.png" alt="Black Spider" width="100" height="150">
    </div>
</div>