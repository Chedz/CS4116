<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
 <title>Document</title>
</head>
<body>
 <?php
   session_start();
   if(!empty($_SESSION['loggedin'])){ header("location: home.php");}  //check if user already logged in
   // $email= $_POST['email'];
   // $name= $_POST['user'];
   // $password = $_POST['password'];

   if(isset($_POST['register'])) {
       echo "First name:".$_POST['firstname'].'<br />';
       echo "Surname:".$_POST['surname'].'<br />';
       echo "Password:".$_POST['password'].'<br />';
       echo "Email:".$_POST['email'].'<br />';
     // Check if name has been entered
     if(empty($_POST['Firtsname'])) {
       $errName= 'Please enter your first name';
     }
     if(empty($_POST['Surname'])) {
       $errName= 'Please enter your surname';
     }
     // Check if email has been entered and is valid
     else if(empty($_POST['email'])) {
       $errEmail = 'Please enter a valid email address';
     }
     // check if a password has been entered and if it is a valid password
     else if(empty($_POST['password']) || (preg_match("/^.*(?=.{8,})(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).*$/", $_POST["password"]) === 0)) {
       $errPass = '<p class="errText">Password must be at least 8 characters and must contain at least one lower case letter, one upper case letter and one digit</p>';
     } else {
       echo "The form has been submitted";
     }
   }

    // if (isset($_POST['submit'])) { //the POST form has been submitted
    //   echo "First name:".$_POST['firstname'].'<br />';
    //   echo "Surname:".$_POST['surname'].'<br />';
    // }

    if(array_key_exists('buttonSignIn', $_POST)) { //go to sign in
        header("location: login.php");
    }

 ?>
 <div class="container">
   <div class="row" style="min-width:800">
      <div class="col-sm-1"><img src="images/uniConnectLogo.png" alt="Logo" ></div>
      <!-- <div class="col-sm-11 text-end text-uppercase">
         <h1>Header1</H1><H3>This is Header3</h3></div> -->
     </div>
   <form role="form" method="post" action = "register.php" method="POST">
     <div class="form-group row">
       <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
       <div class="col-sm-10">
         <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email" required>
         <?php echo $errEmail; ?>
       </div>
     </div>
     <div class="form-group row">
      <label for="inputFirst" class="col-sm-2 col-form-label">First Name</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="inputFirst" name="firstname" placeholder="First Name" required>
        <?php echo $errName; ?>
      </div>
    </div>
    <div class="form-group row">
      <label for="inputSurname" class="col-sm-2 col-form-label">Surname</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="inputSurname" name="surname" placeholder="Surname" required>
        <?php echo $errName; ?>
    </div>
    </div>
     <div class="form-group row">
       <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
       <div class="col-sm-10">
         <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password" required>
         <?php echo $errPass; ?>
       </div>
     </div>
     <div class="form-group row">
       <div class="offset-sm-2 col-sm-10">
         <input type="submit" value="Register" name="register" class="btn btn-primary"/>
       </div>
     </div>
   </form>

   <h4> Already a User? Login here </h4>
<form method="post">
    <input type="submit" name="buttonSignIn"
            class="button" value="Sign In" />
</form> -->
 </div>
 <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
