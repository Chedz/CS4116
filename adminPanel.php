<?php
  session_start();
  if(empty($_SESSION['adminloggedin'])){ header("location: adminLogin.php");}  //check if user not logged in, re-direct to login

  if(array_key_exists('buttonLogOut', $_POST)) {
      logUserOut();
  }
  function logUserOut() {
      //echo "This is Button1 that is selected";
      $_SESSION = array();
      session_destroy();
      header("location: adminLogin.php");
  }
 ?>

<!DOCTYPE html>
<html>
<head>
    <title>Auth</title>
    <link rel="icon" href="images/uniConnectLogo.png" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- <meta http-equiv = "refresh" content = "3; url = http://14-cs4116.infinityfreeapp.com/profilePage.php" /> -->
    <style>
      h1 {text-align: center;}
      h4 {text-align: center;}
      p {text-align: center;}

      .navbarHeading {
          position: absolute;
          left: 50%;
          top: 50%;
          transform: translate(-50%, -50%);
          border: 2rem solid #FFFFFF;
          padding: 4rem;
      }

      /* .button {
        margin:0 auto;
        display:block;
        font-size: 1rem;
      } */

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
         <a class="navbar-left"><img src="images/uniConnectLogo.png"></a>

         <!-- <ul class="navbarHeading">
           <li>Admin Panel</li>
         </ul> -->

         <h1 style="color: white; border-width: 1rem;"> Admin Panel </h1>
         <!-- <ul class="nav navbar-nav">
           <li><a href="search.php">Search</a></li>
         </ul> -->
         <ul class="nav navbar-nav navbar-right">
           <!-- <li><a href="profilePage.php"><span class="glyphicon glyphicon-user"></span> Profile</a></li> -->
           <!-- <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li> -->
           <form method="post">
               <input type="submit" name="buttonLogOut"
                       class="btn btn-primary" value="Log out" />
           </form>
         </ul>
       </div>
       </nav>

         <!--Search Feed Here-->
              <div class="container-fluid">
         			 <h2>Search</h2>


              </div>

</body>
</html>
