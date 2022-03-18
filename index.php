<?php
  include_once 'includes/dbh.inc.php';
 ?>

 <!DOCTYPE html>
 <html>
 <head>
   <title></title>
 </head>
 <body>

   <?php
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
    ?>

   <form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
    <p> First name:  <input type="text" name="firstname" value=""> </p>
    <p> Surname:  <input type="text" name="surname" value=""> </p>
     <input type="submit" name="submit" value="Submit">
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
