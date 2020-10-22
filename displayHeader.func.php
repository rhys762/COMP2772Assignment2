
<div class="pageHeader">
    <h1><a href="home.php">Halloween Pet Costumes</a></h1>

    <div class="topnav">
        <ul id="links">
            <li><a href="shop.php">Shop</a></li
            ><li><a href="aboutUs.php">About Us</a></li
            <?php
            /*
                This should be called after opening the body for each page
                container at the top of page holding page title,
                search bar, navigation account login etc to be decided
            */

            //connect to db
            require_once "dbconn.inc.php";
            require_once "getTotalNumberInCart.dec.php";

            //start session
            session_start();

            //do the check for login
            if (isset($_SESSION["loggedInUser"])) {
                //golly gee, i seem to have missed a angled bracket here and there right?
                //no
                //its deliberate and its a hack because the buttons have to be flush and inline block is stupid
                //got it here https://stackoverflow.com/questions/19038799/why-is-there-an-unexplainable-gap-between-these-inline-block-div-elements
                echo "><li><a href=\"logout.func.php\">Log Out of Account \"" . $_SESSION["loggedInUser"] . "\"</a></li>";
                if(getTotalNumberInCart($conn))
                {
                    echo "<li><a href=\"checkout.php\">Cart (" . getTotalNumberInCart($conn) . ")</a></li>";
                }
                else
                {
                    echo "<li><a href=\"checkout.php\">Cart</a></li>";
                }
            } else {
                echo "><li><a href=\"createAccount.php\">Sign Up</a></li>";
                echo "<li><a href=\"login.php\">Log In</a></li>";
            }
            ?>
        </ul>
    </div>

    <div id="rightHeaderImage">
    <img id="spider2" src="images/header/SpiderString.png" alt="Black Spider" width="100" height="150">  
    </div>

    <div id="leftHeaderImage">
        <img id="spider" src="images/header/SpiderString.png" alt="Black Spider" width="100" height="150">
    </div>
</div>