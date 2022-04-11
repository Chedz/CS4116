<!DOCTYPE html>
 <html>
 <head>
   <title>User Registration</title>
   <link rel="icon" href="images/uniConnectLogo.png" />
   <meta http-equiv = "refresh" content = "3; url = http://14-cs4116.infinityfreeapp.com/login.php" />
 </head>
 <body>

   <?php
   session_start();
   //if(!empty($_SESSION['loggedin'])){ header("location: home.php");}  //check if user already logged in


    $email = $_POST['email'];
    $password = $_POST['password'];
    $firstname = $_POST['firstname'];
    $surname = $_POST['surname'];

    echo $email;
    echo $password;
    echo $firstname;
    echo $surname;

    require_once 'includes/dbh.inc.php';
    $conn = createConnection("sql100.epizy.com", "epiz_31242413", "WbIh2OaPZju", "epiz_31242413_project_database");

    if($conn->connect_error){
        die('Connection failed : '.$conn->connect_error);
    } else {
        if (empty($email)) {
          // code...
          echo "email is empty";
        }
        if (empty($password)) {
          // code...
          echo "password is empty";
        }
        if (empty($firstname)) {
          // code...
          echo "firstname is empty";
        }
        if (empty($surname)) {
          // code...
          echo "surname is empty";
        }
        $stmt = $conn->prepare("insert into user(handle, Password, Firstname, Surname)
        values(?,?,?,?)");
        $stmt->bind_param("ssss",$email, $password, $firstname, $surname);
        $stmt->execute();
        echo "User registered, redirecting to login";
        $stmt->close();
        $conn->close();
    }
?>

 </body>
 </html>
