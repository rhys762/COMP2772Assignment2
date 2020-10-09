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
    <?php require_once "displayHeader.func.php"; ?>

    <form id="createNewAccountForm">
        <label for="username">Username:</label><br>
        <input type="text"><br>
        <label for="firstName">Given Name:</label><br>
        <input type="text"><br>
        <label for="lastName">Family Name:</label><br>
        <input type="text"><br>
        <label for="password">Password:</label><br>
        <input type="text"><br>
        <label for="confirmPassword">Confirm Password:</label><br>
        <input type="text"><br>
    </form>
</body>