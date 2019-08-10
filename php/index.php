<!DOCTYPE html>
<html>
<head>
    <title>Search Engine</title>

    <link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>


<b id="logout"><a href="login.php">Admin</a></b>

<div class="main">

    <div class="indexLogo">
        <img src="image/logo.png" title="logo" alt="logo">
    </div>

    <div class="searchContainer">

        <form action="search.php" method="GET">

            <input class="searchBox" type="text" name="word" autocomplete="off">
            <input class="searchButton" type="submit" value="Search">


        </form>

    </div>

</div>

</body>
</html>