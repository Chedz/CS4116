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
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <title>Home</title>
  <style>
    /* h1 {text-align: center;}
    h4 {text-align: center;} */
    p {text-align: center;}
    /* div {text-align: center;} */
  </style>
 </head>
 <body>
<!-- Navbar-->
     <nav class="navbar navbar-dark bg-dark">
       <div class="container">
       <!-- <div class="navbar-header">
         <a class="navbar-brand" href="#">WebSiteName</a>
       </div> -->
       <a href="home.php" class="navbar-left"><img src="images/uniConnectLogo.png"></a>
       <ul class="nav navbar-nav">
         <li class="active"><a href="home.php">Home</a></li>
       </ul>
       <ul class="nav navbar-nav">
         <li><a href="connections.php">Matches</a></li>
       </ul>
       <ul class="nav navbar-nav">
         <li><a href="search.php">Search</a></li>
       </ul>
       <ul class="nav navbar-nav navbar-right">
         <li><a href="profilePage.php"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
         <!-- <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li> -->
         <form method="post">
             <input type="submit" name="buttonLogOut"
                     class="btn btn-primary" value="Log out" />
         </form>
       </ul>
     </div>
     </nav>


<!--User Feed Here-->
     <div class="container-fluid">
       <p>User Feed here</p>
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
