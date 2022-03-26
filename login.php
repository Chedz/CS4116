<!DOCTYPE html>
 <html>
 <head>
   <title>Login</title>
 </head>
 <body>
    <?php
        session_start();
        if(!empty($_SESSION['loggedin'])){ header("location: home.php");}  //check if user already logged in
        echo "Test login page";
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

 </body>
 </html>
