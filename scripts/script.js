/*
    Used to check whether the password combination matches
*/

function checkPassword(){
    //Get the password from each of the inputs
    var password1 = document.getElementById("password1").value;
    var password2 = document.getElementById("password2").value;

    if(password1 === password2){ //If the passwords match
        //Enable the submit button
        document.getElementById("accountSubmit").removeAttribute("disabled");
        //Hide the error message
        document.getElementById("PWerrorMsg").style.visibility = "hidden";
    } else { //If they don't
        //Disable the submit button
        document.getElementById("accountSubmit").setAttribute("disabled", "disabled");
        //Show the error mesage
        document.getElementById("PWerrorMsg").style.visibility = "visible";

    }
}