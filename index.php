<?php
  require_once 'includes/dbh.inc.php';
  $mysqli = createConnection("sql100.epizy.com", "epiz_31242413", "WbIh2OaPZju", "epiz_31242413_project_database");
 ?>

 <!DOCTYPE html>
 <html>
 <head>
   <title>Home</title>
 </head>
 <body>

   <?php
   session_start();
   if(!empty($_SESSION['loggedin'])){ header("location: home.php");}  //check if user already logged in

   echo "_POST array";
   pre_r($_POST);
   echo "_GET array";
   pre_r($_GET);
   echo "_REQUEST array";
   pre_r($_REQUEST);

   if (isset($_POST['submit'])) { //the POST form has been submitted
     echo "First name:".$_POST['firstname'].'<br />';
     echo "Surname:".$_POST['surname'].'<br />';
   }

   //$mysqli->close();
   closeConnection($mysqli);
    ?>

   <form action = "register.php" method="POST">

    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" class="form-control" id="email" name="email"/>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password"/>
    </div>
    <div class="form-group">
        <label for="Firstname">First Name</label>
        <input type="text" class="form-control" id="Firstname" name="Firstname"/>
    </div>
    <div class="form-group">
        <label for="Surname">Last Name</label>
        <input type="text" class="form-control" id="Surname" name="Surname"/>
    </div>
    <input type="submit" class="btn btn-primary"/>
    </form>

 </body>
 </html>

<?php
function pre_r($array) {
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}
?>
