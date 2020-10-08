<head>
    <title>BuyThings.com</title>
    <meta charset="UTF-8">
    <meta name="description" content="This is a place to buy things :)">
    <meta name="author" content="Galadriel Group">
    <link rel="stylesheet" href="styles/styles.css">
</head>

<body>
    <?php require_once "dbconn.inc.php"; ?>
    <!-- container at the top of page holding page title,
         search bar, navigation account login etc to be decided --> 
    <div class="pageHeader">

        <h1>BuyThings.com</h1>

        <form id="searchBar">
            <input type="text" placeholder="Search for keywords..">
            <input type="submit" value="">
        </form>
    </div>
</body>
