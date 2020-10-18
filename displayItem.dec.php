<!--
    This declares a function that should be used to display items
    paramater is a row from the Products table
    and also a connection to the database (see getNumberOfItemsInCart)
-->

<?php
    function displayItem($sqlProductsRow, $conn)
    {
        //start session
        session_start();
        //include func
        require_once "getNumberOfItemsInCart.dec.php";
        require_once "displayPrices.func.php";

        echo "<div class=\"searchResultItem\">";
                echo "<p class=\"itemName\">" . $sqlProductsRow["name"] . "</p>";
                //display prices for sale items differently:
                if($sqlProductsRow["specialPrice"])
                {
                    echo "<p class=\"worsePrice\">" . displayPrice($sqlProductsRow["price"]) . "</p>";
                    echo "<p class=\"betterPrice\">" . displayPrice($sqlProductsRow["specialPrice"]) . "</p>";
                }
                else
                {
                    echo "<p class=\"itemPrice\">" . displayPrice($sqlProductsRow["price"]) . "</p>";
                }
                
                echo "<img class=\"itemImage\" src=\"images/products/" . $sqlProductsRow["imgPath"] . "\">";

                //if logged in then display a add to cart button if its not in cart, otherwise display how many in cart
                if(isset($_SESSION["loggedInUser"]))
                {
                        $quantity = getNumberOfItemsInCart($sqlProductsRow["id"], $conn);
                        
                        echo "<form action=\"modifyCart.func.php\" method=\"get\">";
                        echo "<input type=\"number\" name=\"quantity\" value=\"" . $quantity . "\">";
                        echo "<input class=\"hidden\" name=\"id\" type=\"text\" value=\"" . $sqlProductsRow["id"] . "\">";
                        echo "<input type=\"submit\" value=\"Modify Cart\">";
                        echo "</form>";

                        if($quantity > 0)
                        {
                            echo "<p>";
                            echo $quantity;
                            echo " in cart</p>";
                        }
                }

                echo "</div>";
    }
?>