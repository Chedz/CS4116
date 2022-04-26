<?php
  // require_once 'includes/dbh.inc.php';
  // $mysqli = createConnection("sql100.epizy.com", "epiz_31242413", "WbIh2OaPZju", "epiz_31242413_project_database");

  session_start();
  if(empty($_SESSION['loggedin'])){ header("location: login.php");}  //check if user not logged in, re-direct to login

  if(array_key_exists('buttonLogOut', $_POST)) {
      logUserOut();
  }
  function logUserOut() {
      //echo "This is Button1 that is selected";
      $_SESSION = array();
      session_destroy();
      header("location: login.php");
  }

 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="icon" href="images/uniConnectLogo.png" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<!-- <link rel="stylesheet" href="css/style.css" type="text/css"> -->
	<title>Search</title>
  <style>
    /* h1 {text-align: center;}
    h4 {text-align: center;} */
    p {text-align: center;}
    /* div {text-align: center;} */
  </style>
 </head>
 <body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark sticky-top">
   <div class="container-fluid">
   <a class= "navbar-brand" href="index.php"><img src="images/uniConnectLogo.png"></a>
   <button class="navbar-toggler" type="button" data-toggle="collapse"
   data-target="#navbarResponsive">
        <span class="navbar=toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="profilePage.php"><span class="glyphicon glyphicon-user"></span> Profile</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="search.php"><span class="glyphicon glyphicon-user"></span> Search</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="connections.php"><span class="glyphicon glyphicon-user"></span> Matches</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="aboutUs.php">About Us</a>
            </li>

            <form method="post">
             <input type="submit" name="buttonLogOut"
                     class="btn btn-primary" value="Logout" />
         </form>
 </div>
 </nav>


<!--Search Feed Here-->
     <div class="container-fluid">
			 <h1>Search</h1>
			 <form action="search.php" method="POST">
			 	<input type="text" name="search" placeholder="Search for members..."/>
			 	<button type="submit" name="Search">Search</button><br>
                                <input type="number" name="age" min="18" placeholder="Max age.." value="22" required/>
                                <label for="age">Max Age (18+)</label><br>
                                <label>Smoker?</label><br>
                                <input type="radio" name="smoker" value="0"/>
                                <label for="smoker">No</label>
                                <input type="radio" name="smoker" value="1"/>
                                <label for="smoker">Yes</label><br>
                                <label>Gender..</label><br>
                                <input type="radio" name="gender" value="Male"/>
                                <label for="gender">Male</label>
                                <input type="radio" name="gender" value="Female"/>
                                <label for="gender">Female</label>
                                <select name="interestsSearch">
                                    <option value="" selected disabled hidden>Select Interest</option>
                                    <option value="0">Reading</option>
                                    <option value="1">Working Out</option>
                                    <option value="2">Gaming</option>
                                    <option value="3">Walking</option>
                                    <option value="4">Cooking</option>
                                    <option value="5">Dancing</option>
                                    <option value="6">Netflix</option>
				    <option value="7">Fishing</option>
                                    <option value="8">Dogs</option>
                                    <option value="9">Cats</option>
                                    <option value="10">Music</option>
                                    <option value="11">Art</option>
                                    <option value="12">Coffee</option>
                                    <option value="13">Soccer</option>
				    <option value="14">Movies</option>
                                    <option value="15">Travel</option>
                                    <option value="16">Beer</option>
                                    <option value="17">Wine</option>
                                    <option value="18">Politics</option>
                                    <option value="19">Baking</option>
                                    <option value="20">Photography</option>
                                </select>
                                <hr>
			</form>

			<?php 	if (isset($_POST["search"])) {
				require "searchPage.php";
				require_once 'profilePreview.php';

				//This displays the profile tile for each result based on name
                                    if (count($resultsFiltered) > 0) {

                                        if(isset($interests)){ //If interest has been selected for search, do this modified search with filters and interests
                                            $finalSearchIDs = array_intersect($tempFilterIDArray,$tempFilterInterestsArray); //Find UserIDs that have the searched interest and match the search filters by comparing the two arrays from                                                                                                                                       earlier
                                            foreach($finalSearchIDs as $r){ //Here we iterate through each matching UserID and display the results
                                                $tempUserID = $r;
                                                $sql2 = "SELECT * FROM profile WHERE UserID = '$tempUserID'";
                                                $results2 = mysqli_query($conn,$sql2);
                                                $row2 = mysqli_fetch_array($results2);
                                                    $tempMail = $row2['email'];
                                                    getProfilePreview($tempMail);
                                                    printf("<br>");
                                            }
                                        } else { //If interest has not been selected, do the standard search with filters
                                            foreach($resultsFiltered as $r) {
                                                $tempUserID = $r['UserID'];
                                                $sql2 = "SELECT * FROM profile WHERE UserID = '$tempUserID'";
                                                $results2 = mysqli_query($conn,$sql2);
                                                $row2 = mysqli_fetch_array($results2);
                                                    $tempMail = $row2['email'];
                                                    getProfilePreview($tempMail);
                                                    printf("<br>");
					    }
                                        }

                                    } else {
                                        echo "No results found";
                                    }
				 //}

				}
			?>
     </div>

     <!-- <form action="profilePage.php">
         <input type="submit" value="Profile" />
     </form>

     <form method="post">
         <input type="submit" name="buttonLogOut"
                 class="button" value="Log out" />
     </form> -->
<!-- Footer and spacing -->
     <br>
     <footer class="bg-light text-center text-lg-start">
    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
      © 2022 Copyright:
      <a class="text-dark" href="https://github.com/Chedz/CS4116">Group-14 Git Repo</a>
    </div>
    <!-- Copyright -->
  </footer>

 </body>
 </html>
