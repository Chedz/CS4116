<!DOCTYPE html>
 <html>
 <head>
  <link rel="icon" href="images/uniConnectLogo.png" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
   <title>Login</title>
 </head>
 <body>
    <?php
        session_start();
        if(!empty($_SESSION['loggedin'])){ header("location: home.php");}  //check if user already logged in
        //echo "Test login page";
    ?>
    <div class="container">
    <div class="row" style="min-width:800">
      <div class="col-sm-1"><img src="images/uniConnectLogo.png" alt="Logo" ></div>
      
     </div>
    <h2>Login</h2>
    <form action="auth.php" method="POST">
    <div class="form-group">
        <div class="col-sm-3 control-label">
            <label for="email" class="col-sm-2 col-form-label">Email</label> 
            
        <!--    </div>
        <div class="col-sm-10"> -->
        <input type="email" id="email" class="form-control" name="email"/> 
        </div>
    </div>
    <div class="form-group">
    <div class="col-sm-3 control-label">
            <label for="password" class="col-sm-2 col-form-label">Password</label>
            
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
