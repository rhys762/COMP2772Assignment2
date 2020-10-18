<!--
    Home page for the site
-->

<head>
    <title>BuyThings.com</title>
    <meta charset="UTF-8">
    <meta name="description" content="This is a place to buy things :)">
    <meta name="author" content="Galadriel Group">
    <link rel="stylesheet" href="styles/styles.css">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Creepster'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>

<body>
    <!-- pull the header -->
    <?php require_once "displayHeader.func.php"; ?>
    <!-- display hot items or something? -->

    <div class="search">
    <form action="performSearch.php" method="POST">
        <input type="text" name="searchValue" placeholder="Search...">
        <button type="submit" value="submit"><i class="material-icons">search</i></button>
    </form>
    </div>

</body>