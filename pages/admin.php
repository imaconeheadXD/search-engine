<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/css?family=Creepster|Roboto:300&display=swap" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="styles.css">
	<title>Add Sites to Crawler</title>
</head>
<body class="admin-bg">

	<nav class="navbar navbar-expand-lg navbar-dark navbar-static-top">
        <div class="container-fluid" style="background-color: #130303;">
        <a class="navbar-brand" href="search.html">Sachi</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText"
          aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >Admin</a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          		<a class="dropdown-item" target="" href="#">Admin Home</a>
          		<a class="dropdown-item" target="" href="history.html">Search History</a>
           </li>
		        <li class="nav-item">
              <a class="nav-link" href="search.html">Search</a>
            </li>
          </ul>
        </div>
      </div>
      </nav>

      <div class="row justify-content-center">
      	<h1 class="welcome-heading">Welcome Admin</h1>
      	<hr>
      </div>

	<form action="admin.php" method="post" enctype="multipart/form-date">
		<div class="row justify-content-center" style="margin-left: 25%; margin-right: 25%; margin-top: 1%; text-align: center; top: 430px !important; position: relative;">
			      <h2>Insert Website to Crawl</h2>
		</div>
		<div class="row justify-content-center" style="margin-left: 25%; margin-right: 25%; margin-top: 1%; text-align: center; top: 420px !important; position: relative;">
			      <input type="text" name="webpage_url" placeholder="Insert Link Here:" style="text-align: center; border-color: #efefef">
		</div>
		<div class="row justify-content-center" style="padding-bottom: 2%;">
			<input style="top: 430px !important; position: relative; margin-bottom: 15%;" type="submit" name="submit" value="Add Site to Crawl">
		</div>
	</form>
<script type="text/javascript" src="index.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>

<?php

	// $servername = "149.4.211.180";
	// $username = "fuja3933";
	// $password = "23303933";

	$conn = new mysqli("localhost","root","","search");

	//Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 
	// echo "Connected successfully";
	// echo "<br>";

    
	date_default_timezone_set("America/New_York");
	

	// add url inserted by user into the database
	if(isset($_POST['submit'])) {
		$webpage_url = $_POST['webpage_url'];
		/****
		*
		* function to extract site title from metadata
		*/
		function get_title($url){
		  $str = file_get_contents($url);
		  if(strlen($str)>0){
		    $str = trim(preg_replace('/\s+/', ' ', $str)); // supports line breaks inside <title>
		    preg_match("/\<title\>(.*)\<\/title\>/i",$str,$title); // ignore case
		    return $title[1];
		  }
		}


		$tags = get_meta_tags($webpage_url); // gets all meta tags in webpage
		$desc = $tags['description']; // url description
		$web_title = get_title($webpage_url);
		$lastModified = date("Y/m/d"); // current data
		$lastIndexed = date("Y/m/d"); // needs to be changed,date last indexed
		$timeToIndex = .01; // needs to be changed, but time took to index
		// echo $webpage_title;

		if($webpage_url==''){
			echo "<script>alert('please fill all the fields!')</script>";
		
			exit();
		} else {

			if($web_title=='') $web_title = 'none';
			if($desc=='') $desc = 'none';
		
			$sql = "INSERT INTO page (url,title,description,lastModified,lastIndexed,timeToIndex) VALUES ('$webpage_url','$web_title','$desc','$lastModified','$lastIndexed','$timeToIndex')";

			// echo $sql;

			if($conn->query($sql) === TRUE){
				echo "<script>alert('Data inserted into table')</script>";
			} else {
				echo "<script>alert('Data not inserted into table')</script>";
				// echo "<script>alert('Data NOT inserted into table')</script>";
			    //echo "Error: " . $sql . "<br>" . $conn->error;
			}

		}
	}

	// get all websites in page table and display on screen

	$sites = mysqli_query($conn,"SELECT url FROM page");
	
	echo "<table class=\"table table-striped table-responsive-md crawl-table\" style=\"margin-top: 20%;  text-align: center; !important; width: 400px;\" border=\"0\"; align=\"center\">";
	echo "<thead>";
	echo "<tr>";
	echo "<th scope=\"col\">Sites to Search</th>";
	echo "</tr>";
	echo "</thead>";
	echo "<tbody>";

	while($row = mysqli_fetch_array($sites)) {
		echo "
			<tr>
			<td>" . $row[0] . "</td>
			</tr>
		";
	}
	echo "</tbody>";
	echo "</table>";

	$conn->close();

	

	// echo $doc;
?>