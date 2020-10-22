<!--
    this document acts as a placeholder for the external payment gateway provider,
    and will return valid response codes
-->
<?php

    function processPayment($cardNo, $name, $cvc, $expiry, $type){
        //Provide a DECLINED response
        if($cvc == "789"){ //If CVC is 789
            return "01";

        } else {
            //Otherwise
            //Store the payment ID
            $_SESSION['payID'] = "a1b2c3d4";            
            //provide an APPROVED response
            return 0;
        }

       
    }

?>