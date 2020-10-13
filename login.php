<!--
    used by new customers to create a new user account
-->

<head>
    <title>BuyThings.com Specials</title>
    <meta charset="UTF-8">
    <meta name="description" content="This is a place to buy things :)">
    <meta name="author" content="Galadriel Group">
    <link rel="stylesheet" href="styles/styles.css">
</head>

<body>
    <!-- pull the header -->
    <?php 
        require_once "displayHeader.func.php";
        session_start();
        if(isset($_SESSION['unameTaken']))
        {
            if($_SESSION['unameTaken'] == 0)
            {
                echo "<p id =\"accountMade\">Success, please login below</p>";
            }
        }
    ?>

    <form id="loginForm" action="login.func.php" method="POST">
        <label for="username">Username:</label><br>
        <input type="text" name="username" required><br>
        <label for="password">Password:</label><br>
        <input type="password" name="password" required><br>
        <input type="submit" value="Login">
    </form>
</body>