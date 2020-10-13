<?php

function displayPrice($priceIn){
    //Take a number and convert it to 2dp with dollar sign $xx.xx
    return "$" . number_format($priceIn, 2);
}

?>