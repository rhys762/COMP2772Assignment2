<!-- 
    This should be called after opening the body for each page
    container at the top of page holding page title,
    search bar, navigation account login etc to be decided
-->

<div class="pageHeader">
    <h1>Halloween Monster Pets</h1>

    <div id="rightHeaderImage">
        <img id="pumpkin" src="images/header/Pumpkin2.png" alt="Halloween Pumpkin" width="100" height="100">
    </div>

    <div id="leftHeaderImage">
        <img id="spider" src="images/header/SpiderString.png" alt="Black Spider" width="100" height="150">
    </div>

    <div class="topnav">
        <ul id="links">
            <li><a href="home.php">Home</a></li>
            <li><a href="shop.php">Shop</a></li>
            <li><a href="specials.php">Sale</a></li>
            
            <!--
            if we are logged in display cart or something otherwise display login
        -->
            <?php
            //start session
            session_start();
            //do the check for login
            if (isset($_SESSION["loggedInUser"])) {

                echo "<li><a href=\"logout.func.php\">Log Out of Account \"" . $_SESSION["loggedInUser"] . "\"</a></li>";
                echo "<li><a href=\"checkout.php\">Checkout</a></li>";
            } else {
                echo "<li><a href=\"createAccount.php\">Create Account</a></li>";
                echo "<li><a href=\"login.php\">Log In</a></li>";
            }
            ?>
            <li>
                <form id="searchBar" action="performSearch.php" method="POST">
                    <input type="text" name="searchValue" placeholder="Search...">
                    <button type="submit" value="submit"><i class="material-icons">search</i></button>
                    </form>
            </li>
        </ul>
    </div>
</div>
</div>