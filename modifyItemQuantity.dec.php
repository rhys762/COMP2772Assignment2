<!--
    Modifies the amount that is in the users cart of a particular item,
    if its zero, delete any existing from the database,
    if more than 0, modify the existing record or add one if it doesnt exist
-->

<?php
    function modifyItemQuantity($conn, $itemid, $quantity)
    {
        require_once "getNumberOfItemsInCart.dec.php";

        //start session
        session_start();

        if($quantity > 0)
        {
            //if an entry already exists modify it, otherwise insert new
            if(getNumberOfItemsInCart($itemid, $conn) > 0)
            {//entry exists, so we just need to update the quantity
                $sql = "UPDATE Cart SET quantity = ? WHERE accountName = ? and id = ?;";
                $statement = mysqli_stmt_init($conn);
                mysqli_stmt_prepare($statement, $sql);
                mysqli_stmt_bind_param($statement, 'isi', $quantity, htmlspecialchars($_SESSION["loggedInUser"]), $itemid);
                mysqli_stmt_execute($statement);
            }
            else
            {//does not exist, insert new row
                $sql = "INSERT INTO Cart (accountName, id, quantity) VALUES (?,?,?);";
                $statement = mysqli_stmt_init($conn);
                mysqli_stmt_prepare($statement, $sql);
                mysqli_stmt_bind_param($statement, 'sii', htmlspecialchars($_SESSION["loggedInUser"]), $itemid, $quantity);
                mysqli_stmt_execute($statement);
            }
        }
        else
        {
            //we are setting the quantity to 0, so just delete anything matching the id
            $sql = "DELETE FROM Cart where accountname = ? and id = ? ;";

            $statement = mysqli_stmt_init($conn);
            mysqli_stmt_prepare($statement, $sql);
            mysqli_stmt_bind_param($statement, 'si', htmlspecialchars($_SESSION["loggedInUser"]), $itemid);

            mysqli_stmt_execute($statement);
        }
    }

?>