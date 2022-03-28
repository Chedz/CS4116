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

   // echo "_POST array";
   // pre_r($_POST);
   // echo "_GET array";
   // pre_r($_GET);
   // echo "_REQUEST array";
   // pre_r($_REQUEST);

   if (isset($_POST['submit'])) { //the POST form has been submitted
     echo "First name:".$_POST['firstname'].'<br />';
     echo "Surname:".$_POST['surname'].'<br />';
   }

   //$mysqli->close();
   closeConnection($mysqli);
    ?>

    <h1> Registration </h1>

   <form action = "register.php" method="POST">

    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" class="form-control" id="email" name="email" required/>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password" required/>
    </div>
    <div class="form-group">
        <label for="Firstname">First Name</label>
        <input type="text" class="form-control" id="Firstname" name="Firstname" required/>
    </div>
    <div class="form-group">
        <label for="Surname">Last Name</label>
        <input type="text" class="form-control" id="Surname" name="Surname" required/>
    </div>
    <input type="submit" class="btn btn-primary"/>
    </form>

    <h4> Already a User? Login here </h4>
    <form method="post">
        <input type="submit" name="buttonSignIn"
                class="button" value="Sign In" />
    </form>
    <?php
     if(array_key_exists('buttonSignIn', $_POST)) {
         header("location: login.php");
     }
     ?>

 </body>
 </html>

<?php
function pre_r($array) {
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}
?>
