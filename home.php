<?php
  require_once 'includes/dbh.inc.php';
  $mysqli = createConnection("sql100.epizy.com", "epiz_31242413", "WbIh2OaPZju", "epiz_31242413_project_database");

  session_start();
  if(empty($_SESSION['loggedin'])){ header("location: login.php");}  //check if user not logged in, re-direct to login
 ?>

 <!DOCTYPE html>
 <html>
 <head>
   <title>Home</title>
 </head>
 <body>
   <h1> Home Page! </h1>
    <!--Temp button -->
    <form action="profilePage.php">
        <input type="submit" value="Profile" />
    </form>
   <?php
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

    <form method="post">
        <input type="submit" name="buttonLogOut"
                class="button" value="Log out" />
    </form>

 </body>
 </html>
