<!-- 
    This should be called after opening the body for each page
    container at the top of page holding page title,
    search bar, navigation account login etc to be decided
-->

<div class="pageHeader">
    <h1>BuyThings.com</h1>

    <form id="searchBar" action="performSearch.php" method="POST">
        <input type="text" name="searchValue" placeholder="Search for keywords..">
        <input type="submit" value="">
    </form>

    <ul id="links">
        <li><a href="home.php">Home</a></li>
        <li><a href="specials.php">Specials</a></li>
        <li><a href="">Contact</a></li>
    </ul>
</div>