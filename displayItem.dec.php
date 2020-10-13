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

        echo "<div class=\"searchResultItem\">";
                echo "<p class=\"itemName\">" . $sqlProductsRow["name"] . "</p>";
                //display prices for sale items differently:
                if($sqlProductsRow["specialPrice"])
                {
                    echo "<p class=\"worsePrice\">$" . $sqlProductsRow["price"] . "</p>";
                    echo "<p class=\"betterPrice\">$" . $sqlProductsRow["specialPrice"] . "</p>";
                }
                else
                {
                    echo "<p class=\"itemPrice\">$" . $sqlProductsRow["price"] . "</p>";
                }
                
                echo "<img class=\"itemImage\" src=\"images/" . $sqlProductsRow["imgPath"] . "\">";

                //if logged in then display a add to cart button if its not in cart, otherwise display how many in cart
                if(isset($_SESSION["loggedInUser"]))
                {
                        $quantity = getNumberOfItemsInCart($sqlProductsRow["id"], $conn);
                        
                        if($quantity > 0)
                        {
                            echo "<p>";
                            echo $quantity;
                            echo " in cart</p>";
                            echo "<a href=\"addToCart.func.php?id=" . $sqlProductsRow["id"] . "&quantity=" . "1" . "\">Add To Cart</a>";
                        }
                        else
                        {
                            echo "<a href=\"addToCart.func.php?id=" . $sqlProductsRow["id"] . "&quantity=" . "1" . "\">Add To Cart</a>";
                        }
                }

                echo "</div>";
    }
?>