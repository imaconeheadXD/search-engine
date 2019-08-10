<?php
    
    $search = $_GET [ 'search' ]; 
    
    echo $search;
// include("db.php");
// include("pages/admin.html")
// include("Parser.php");

// if(isset($_POST['data'])){}
//     $searchTest = $_POST['data'];
//     echo '<script>console.log("Worked");</script>';
//     echo $searchTest;
// } else echo '<script>console.log("Didn\'t work");</script>';

// $crawled = array();
// $crawling = array();

// function linkExists($url)
// {
//     global $con;

//     $query = $con->prepare("SELECT * FROM sites WHERE url = :url");

//     $query->bindParam(":url", $url);
//     $query->execute();

//     return $query->rowCount() != 0;
// }

// function insertLink($url, $title, $description, $keywords)
// {
//     global $con;

//     $query = $con->prepare("INSERT INTO sites(url, title, description, keywords)
// 							VALUES(:url, :title, :description, :keywords)");

//     $query->bindParam(":url", $url);
//     $query->bindParam(":title", $title);
//     $query->bindParam(":description", $description);
//     $query->bindParam(":keywords", $keywords);

//     return $query->execute();
// }

// function createLink($src, $url)
// {

//     $scheme = parse_url($url)["scheme"];
//     $host = parse_url($url)["host"];

//     if (substr($src, 0, 2) == "//") {
//         $src = $scheme . ":" . $src;
//     } else if (substr($src, 0, 1) == "/") {
//         $src = $scheme . "://" . $host . $src;
//     } else if (substr($src, 0, 2) == "./") {
//         $src = $scheme . "://" . $host . dirname(parse_url($url)["path"]) . substr($src, 1);
//     } else if (substr($src, 0, 3) == "../") {
//         $src = $scheme . "://" . $host . "/" . $src;
//     } else if (substr($src, 0, 5) != "https" && substr($src, 0, 4) != "http") {
//         $src = $scheme . "://" . $host . "/" . $src;
//     }

//     return $src;
// }

// function getDetails($url)
// {

//     $parser = new Parser($url);

//     $titleArray = $parser->getTitleTags();

//     if (sizeof($titleArray) == 0 || $titleArray->item(0) == NULL) {
//         return;
//     }

//     $title = $titleArray->item(0)->nodeValue;
//     $title = str_replace("\n", "", $title);

//     if ($title == "") {
//         return;
//     }

//     $description = "";
//     $keywords = "";

//     $metasArray = $parser->getMetatags();

//     foreach ($metasArray as $meta) {

//         if ($meta->getAttribute("name") == "description") {
//             $description = $meta->getAttribute("content");
//         }

//         if ($meta->getAttribute("name") == "keywords") {
//             $keywords = $meta->getAttribute("content");
//         }
//     }

//     $description = str_replace("\n", "", $description);
//     $keywords = str_replace("\n", "", $keywords);


//     if (linkExists($url)) {
//         echo "$url already exists<br>";
//     } else if (insertLink($url, $title, $description, $keywords)) {
//         echo "SUCCESS: $url<br>";
//     } else {
//         echo "ERROR: Failed to insert $url<br>";
//     }

// }

// function followLinks($url)
// {

//     global $crawled;
//     global $crawling;

//     $parser = new Parser($url);

//     $linkList = $parser->getLinks();

//     foreach ($linkList as $link) {
//         $href = $link->getAttribute("href");

//         if (strpos($href, "#") !== false) {
//             continue;
//         } else if (substr($href, 0, 11) == "javascript:") {
//             continue;
//         }


//         $href = createLink($href, $url);


//         if (!in_array($href, $crawled)) {
//             $crawled[] = $href;
//             $crawling[] = $href;

//             getDetails($href);
//         }

//     }

//     array_shift($crawling);

//     foreach ($crawling as $site) {
//         followLinks($site);
//     }

// }

// $startUrl = "http://www.google.com";
// followLinks($startUrl);
?>