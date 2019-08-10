<?php

class Results
{
    private $con;
    public function __construct($con)
    {
        $this->con = $con;
    }
    public function getResultsHtml($page, $pageSize, $term)
    {
        $query = $this->con->prepare("SELECT * 
										 FROM sites WHERE title LIKE :term 
										 OR url LIKE :term 
										 OR description LIKE :term");
        $searchTerm = "%" . $term . "%";
        $query->bindParam(":term", $searchTerm);
        $query->execute();
        $resultsHtml = "<div class='siteResults'>";
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $id = $row["id"];
            $url = $row["url"];
            $title = $row["title"];
            $description = $row["description"];
            $resultsHtml .= "<div class='results'>
								<h3 class='title'>
									<a class='result' href='$url' data-linkId='$id'>
										$title
									</a>
								</h3>
								<span class='url'>$url</span>
								<span class='description'>$description</span>

							</div>";
        }
        $resultsHtml .= "</div>";
        return $resultsHtml;
    }




}

?>