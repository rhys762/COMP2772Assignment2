<!--
    Checkout page
-->

<head>
    <title>BuyThings.com Checkout</title>
    <meta charset="UTF-8">
    <meta name="description" content="This is a place to buy things :)">
    <meta name="author" content="Galadriel Group">
    <link rel="stylesheet" href="styles/styles.css">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Creepster'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<body>

<?php
    //start the session
    session_start();
    //display header
    require_once "displayHeader.func.php";

    require_once "displayPrices.func.php";

    //connect to the database
    require_once "dbconn.inc.php";

    echo "<h3>Your total is ";
    echo displayPrice($_SESSION["cart_total"]);
    echo "</h3>";

?>
    <!-- Sorry I used a table... they probably suck, but it's so damn easy :/ -->
    <table id="addressTable">
        <tr>
            <td id="prevAddress">
                <?php
                    //Has the user saved their details?
                    $sql_prev = "SELECT * FROM `accounts` where accountName = \"" . $_SESSION["loggedInUser"] . "\";";
                    $query_prev = mysqli_query($conn, $sql_prev);
                    $rows_prev =  mysqli_fetch_assoc($query_prev);

                    //Show saved details, if there are any
                    if($rows_prev["address1"] != NULL){
                        echo "<p><a href='checkout3.php'>Use saved address?</a></p>";
                        echo $rows_prev["address1"] . "<br>";
                        echo $rows_prev["address2"] . "<br>";
                        echo $rows_prev["suburb"] . "<br>";
                        echo $rows_prev["stat"] . "<br>";
                        echo $rows_prev["postcode"] . "<br>";
                    }

    //Has the user saved their details?
    $sql_prev = "SELECT * FROM `accounts` where accountName = \"" . $_SESSION["loggedInUser"] . "\";";
    $query_prev = mysqli_query($conn, $sql_prev);
    $rows_prev =  mysqli_fetch_assoc($query_prev);

                    //close connection
                    mysqli_close($conn);

                    //Or, user enters new details
                ?>
            </td>


            <td id="newAddress">
                <p>Enter New Address:</p>
                <div class="addressForm">
                    <form action="saveAddress.func.php" method="POST">
                        <label for="address1">Address Line 1:</label><br>
                        <input type="text" name="address1" required><br>
                        <label for="address2">Address Line 2:</label><br>
                        <input type="text" name="address2"><br>
                        <label for="suburb">Suburb:</label><br>
                        <input type="text" name="suburb" required><br>
                        <label for="stat">State:</label><br>
                        <select name="stat">
                            <option value="ACT">ACT</option>
                            <option value="NSW">NSW</option>
                            <option value="NT">NT</option>
                            <option value="Qld">Qld</option>
                            <option value="SA">SA</option>
                            <option value="Tas">Tas</option>
                            <option value="Vic">Vic</option>
                            <option value="WA">WA</option>
                        </select><br>
                        <label for="postcode">Postcode:</label><br>
                        <input type="text" name="postcode" pattern="[0-9]*" maxlength="4"><br>
                        <input type="submit" id="accountSubmit" value="Save Address">
                    </form>
                </div>
            </td>
        </tr>
    </table>

    //Or, user enters new details

    echo "<div class='addressWrapper'>";

    echo "<div class='finalPrice'>";
    echo "<h3>ORDER SUMMARY:</h3>";
    echo "<p>Total ";
    echo displayPrice($_SESSION["cart_total"]);
    echo "</p>";
    echo "</div>";
    
    echo "<div class='addressForm'>";
    echo "<div class='deliveryHeading'><p>Delivery Address:</p></div><br><br>";
    echo "<form action='saveAddress.func.php' method='POST'>";
    echo "<label for='address1'>Address Line 1:</label><br>";
    echo "<input type='text' name='address1' required><br>";
    echo "<label for='firstName'>Address Line 2:</label><br>";
    echo "<input type='text' name='address2'><br>";
    echo "<label for='suburb'>Suburb:</label><br>";
    echo "<input type='text' name='suburb' required><br>";
    echo "<label for='stat'>State:</label><br>";
    echo "<select name='stat'>";
    echo "<option value='ACT'>ACT</option>";
    echo "<option value='NSW'>NSW</option>";
    echo "<option value='NT'>NT</option>";
    echo "<option value='Qld'>Qld</option>";
    echo "<option value='SA'>SA</option>";
    echo "<option value='Tas'>Tas</option>";
    echo "<option value='Vic'>Vic</option>";
    echo "<option value='WA'>WA</option>";
    echo "</select><br>";
    echo "<label for='postcode'>Postcode:</label><br>";
    echo "<input type='text' name='postcode' pattern='[0-9]*' maxlength='4'><br>";
    echo "<input type='submit' id='accountSubmit' value='Save Address'>";
    echo "</form>";
    echo "</div>";

    echo "</div>";
    ?>

</body>