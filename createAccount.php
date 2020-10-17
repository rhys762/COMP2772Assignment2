<!--
    used by new customers to create a new user account
-->

<head>
    <title>BuyThings.com Specials</title>
    <meta charset="UTF-8">
    <meta name="description" content="This is a place to buy things :)">
    <meta name="author" content="Galadriel Group">
    <link rel="stylesheet" href="styles/styles.css">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Creepster'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="scripts/script.js"></script>
</head>

<body>
    <!-- pull the header -->
    <?php 
        require_once "displayHeader.func.php";
        session_start();
        if(isset($_SESSION['unameTaken']))
        {
            if($_SESSION['unameTaken'] == 1)
            {
                echo "<p id =\"unameTaken\">Username is already taken</p>";
                //unset it so if the user navigate away and then comes back its not still there
                unset($_SESSION['unameTaken']);
            }
        }
    ?>

    <form id="createNewAccountForm" action="createAccount.func.php" method="POST">
        <label for="username">Username:</label><br>
        <input type="text" name="username" required><br>
        <label for="firstName">Given Name:</label><br>
        <input type="text" name="firstname" required><br>
        <label for="lastName">Family Name:</label><br>
        <input type="text" name="lastname" required><br>
        <label for="password">Password:</label><br>
        <input type="password" name="password" id= "password1" required><br>
        <label for="confirmPassword">Confirm Password:</label><br>
        <input type="password" oninput="checkPassword();" id="password2" required>
        <span id="PWerrorMsg" style="visibility: hidden;"> Passwords do not match!</span><br>
        <input type="submit" id="accountSubmit" value="Create">
    </form>
</body>