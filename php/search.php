<?php
include("db.php");
include("Results.php");
if (isset($_GET["word"])) {
    $word = $_GET["word"];
}
$page = isset($_GET["page"]) ? $_GET["page"] : 1;
?>
<!DOCTYPE html>
<html>
<head>
    <title>Search Engine</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="mainResultsSection">
        <?php
        $resultsProvider = new Results($con);
        $pageSize = 20;
        echo $resultsProvider->getResultsHtml($page, $pageSize, $word);
        ?>
    </div>
</div>
</body>
</html>