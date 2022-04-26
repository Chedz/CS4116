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

  if(array_key_exists('buttonSwipeRight', $_POST)) {
      swipeRight();
  }

  function swipeRight(){
    // $_POST['connectProfile'] = $currentFeedProfile;
    //$_SESSION['username'] = $currentProfile1;
    //check for existing entry in connection table
    require_once 'includes/dbh.inc.php';
    $conn = createConnection("sql100.epizy.com", "epiz_31242413", "WbIh2OaPZju", "epiz_31242413_project_database");

    if($conn->connect_error){
        die('Connection failed : '.$conn->connect_error);
    } else {

    $tempUserID = $_SESSION['username'];
                $sql1 = "SELECT UserID FROM user WHERE Handle = '$tempUserID'";
                $results1 = mysqli_query($conn,$sql1);
                $row1 = mysqli_fetch_array($results1);
                $User1ID = $row1['UserID']; //initiated connection
                //echo $User1ID;

                //$currentFeedProfile = $_POST['connectProfile'];
                $currentFeedProfile = $_SESSION['currentFeedProfile'];
                $sql1 = "SELECT UserID FROM user WHERE Handle = '$currentFeedProfile'";
                $results1 = mysqli_query($conn,$sql1);
                $row1 = mysqli_fetch_array($results1);
                $User2ID = $row1['UserID']; //received connection
                //echo $User2ID;


                $sql = "SELECT * FROM Connections WHERE userID1  = '$User2ID' AND userID2  = '$User1ID'"; //check if user2 has already attempted to connect with user1 previously
                $results = mysqli_query($conn, $sql);
                // echo "connecting to db";
                if($results){ //alter incomplete connection to be complete
                  // echo "found results";
                  if(mysqli_num_rows($results)>0){ //IF UserID exists in profile table, update data in corresponding row
                    echo "found already existing connection". "<br>";
                    //INSERT INTO Connections (ConnectionID, userID1, userID2, ConnectionDate, isAccepted)

                      //$stmt = $conn->prepare("");
                      $date = date("Y-m-d");
                      $sql = "UPDATE Connections SET ConnectionDate='$date', isAccepted=1 WHERE userID1='$User2ID' AND userID2  = '$User1ID'";

                      if (mysqli_query($conn, $sql)) {
                        echo "Connection Updated";
                      } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                      }
                      // $stmt->execute();
                      // echo "Connection Updated";
                      // $stmt->close();

                  } else { //ELSE no previous connection attempt, insert new row
                    echo "inserting new connection". "<br>";
                      // $stmt = $conn->prepare("INSERT INTO Connections (userID1, userID2, isAccepted) values(?,?,?)");
                      // $stmt->bind_param('iii', $User1ID, $User2ID, 0);
                      // $stmt->execute();
                      // echo "Connections Updated";
                      // $stmt->close();

                      $sql = "INSERT INTO Connections (userID1, userID2, isAccepted) VALUES (".$User1ID.",".$User2ID.",0)";

                        if (mysqli_query($conn, $sql)) {
                          echo "New Connection Added";
                        } else {
                          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                        }
                  }

                }
                $conn->close();
              }
  }

 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="icon" href="images/uniConnectLogo.png" />
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
       <!-- Add feed functionality here, show user random or specific profiles that the user has not connected with -->
       <?php
          require_once 'profilePreview.php';
          $currentFeedProfile = 'elfbar@email.com';
          //$_POST['connectProfile'] = $currentFeedProfile;
          $_SESSION['currentFeedProfile'] = $currentFeedProfile;
          getProfilePreview($currentFeedProfile);
          getSwipeBar($currentFeedProfile);
        ?>
         <!-- Also need to add buttons so a user can swipe on profiles -->
     </div>
   
   <hr>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm">
                <h4> Suggested Users </h4>
                <!--Suggested users bar/box -->
                <?php
                require_once 'includes/dbh.inc.php';
                $conn = createConnection("sql100.epizy.com", "epiz_31242413", "WbIh2OaPZju", "epiz_31242413_project_database");

                $tempUserID = $_SESSION['username'];
                $sql1 = "SELECT UserID FROM user WHERE Handle = '$tempUserID'";
                $results1 = mysqli_query($conn,$sql1);
                $row1 = mysqli_fetch_array($results1);
                $UserID = $row1['UserID'];
                $sql2 = "SELECT * FROM profile WHERE UserID = '$UserID'";
                $results2 = mysqli_query($conn,$sql2);
                $row2 = mysqli_fetch_array($results2);
                $currUserAge = $row2['Age'];
                
                //Suggested users based on age
                $sqlSugg1 = "SELECT * FROM profile WHERE Age <= ('$currUserAge'+3) AND Age >= ('$currUserAge'-3)";
                $sqlSugg1Result = mysqli_query($conn,$sqlSugg1);
                
                foreach($sqlSugg1Result as $userResults){
                    $userDisplay = $userResults['email'];
                    getProfilePreview($userDisplay);
                    getSwipeBar($userDisplay);
                }
                
                //Suggested users based on interest
                
                ?>
            </div>
            <div class="col-sm">
                <h4> Random Users </h4>
            </div>
        </div>
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
