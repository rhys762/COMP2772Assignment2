<!--
    this document acts as a placeholder for the external payment gateway provider,
    and will return valid response codes
-->
<?php

    function processPayment($cardNo, $name, $cvc, $expiry){
        //Provide a DECLINED response
        if($cvc == "789"){ //If CVC is 789
            return "01";

        } else {
            //Otherwise, provide an APPROVED response
            return 0;
        }

       
    }

?>