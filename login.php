<!DOCTYPE html>
 <html>
 <head>
   <title>Login</title>
 </head>
 <body>
    <?php
        session_start();
        if(!empty($_SESSION['loggedin'])){ header("location: home.php");}  //check if user already logged in
        //echo "Test login page";
    ?>

    <h2>Login</h2>
    <form action="auth.php" method="POST">
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" class="form-control" name="email"/>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" class="form-control" name="password"/>
    </div>
        <input type="submit" class="btn btn-primary" value="Login" name="">
    </form>

    <?php
     if(array_key_exists('buttonRegister', $_POST)) {
         header("location: index.php"); //re-direct to register page
     }
     ?>

     <form method="post">
       <label for="buttonRegister">New User?</label>
         <input type="submit" name="buttonRegister"
                 class="button" value="Register" />
     </form>

 </body>
 </html>
