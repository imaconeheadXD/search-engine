<!DOCTYPE html> 
<html> 
	<head>
		 <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
     <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.7/css/mdb.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/css?family=Creepster|Roboto:300&display=swap" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="styles.css">
	<title>Sachi Search Home</title>
	</head> 
	
<body class=""> 

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
                <a class="dropdown-item" target="" href="admin.php">Admin Home</a>
                <a class="dropdown-item" target="" href="history.html">Search History</a>
                  </li>
                <li class="nav-item">
              <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Search</a>
            </li>
          </ul>
        </div>
      </div>
      </nav>

    <div class="row justify-content-center search-form">
      <form class="form-inline active-cyan-4" action="search_results.php" method="get">
        <input class="form-control form-control-sm mr-3" style="width: 500px; height: 40px; border-radius: 25px;" type="text" placeholder="Search" name="user_query" aria-label="Searched Item">
        <button style="border-color: transparent;" type="submit" name="search"><i class="fas fa-search" aria-hidden="true"></i></button>
      </form>
    </div>
    <div class="row justify-content-center">
            <!-- <input type="submit" name="result" value="Search Now"> -->
            <button type="" onclick="selectAll()" name="result" class="btn btn-blue-grey" style="text-transform: none;">Select All</button>
            <button type="" onclick="deselectAll()" name="result" class="btn btn-blue-grey" style="text-transform: none;">Deselect All</button>
    </div>

<script type="text/javascript" src="index.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>

<?php

  
  $conn = new mysqli("localhost","root","","search");

        if(isset($_GET['search'])) {

          $item_searched = $_GET['user_query'];

          // split up search query & place words in word table

          // count number of terms in search query

          // count how many results were found

          // calculated time of search


          if($item_searched==''){
  
            echo "<center><b>Please go back, and write something in the search box!</b></center>";
            exit();
          }


          $result_query = "SELECT * FROM page WHERE description like '%$item_searched%'";

          $result_query2 = "SELECT * FROM page WHERE title like '%$item_searched%'";

          $run_result = mysqli_query($conn,$result_query);
          $run_result2 = mysqli_query($conn,$result_query2);

          if(mysqli_num_rows($run_result)<1){
          
              echo "<center><strong>Nothing matched in the database!</strong></center>";
              exit();
          
          }



          while($row_result=mysqli_fetch_array($run_result2)){
              // print_r($row_result);
              $web_title=$row_result['title'];
              $webpage_url=$row_result['url'];
              $desc=$row_result['description'];
            
            echo "<div class=\"justify-content-left\" id=\"results\" style=\"margin: 8% 20%;\"> 
              
              <h4><input name=\"checkThis\" type=\"checkbox\" id=\"scales\">  $web_title</h4>
              <a href='$webpage_url' target='_blank' style=\"margin-left:3%;\">$webpage_url</a>
              <p style=\"margin-left:3%;\" align='justify'>$desc</p> 
              
              </div>";

            }
          
          // echo "<div class=\"justify-content-center\" id=\"results\" style=\"margin: 8% 20%;\"> ";
          // echo  $item_searched;
          // echo "</div>";
        }

        echo "<div class=\"row justify-content-center\">
                <h5>Download As:</h5>
              </div>";

        echo "<div class=\"row justify-content-center\" style=\"padding-bottom:3%;\">
                <button style=\"padding:1% 4%; background-color:#49b0e3;\" type=\"button\" class=\"btn btn-primary\">CSV</button>
                <button style=\"padding:1% 4%; background-color:#49b0e3;\" type=\"button\" class=\"btn btn-primary\">JSON</button>
                <button style=\"padding:1% 4%; background-color:#49b0e3;\" type=\"button\" class=\"btn btn-primary\">XML</button>
            </div>";


      ?>