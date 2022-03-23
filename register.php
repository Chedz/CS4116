<!DOCTYPE html>
 <html>
 <head>
   <title>User Registration</title>
   <meta http-equiv = "refresh" content = "3; url = http://14-cs4116.infinityfreeapp.com/login.php" />
 </head>
 <body>

   <?php
    $email = $_POST['email'];
    $password = $_POST['password'];
    $Firstname = $_POST['Firstname'];
    $Surname = $_POST['Surname'];

    $servername = "sql100.epizy.com"; 
    $username = "epiz_31242413"; 
    $password1 = "WbIh2OaPZju"; 
    $dbname = "epiz_31242413_project_database"; 

    $conn = new mysqli($servername, $username, $password1, $dbname);

    if($conn->connect_error){
        die('Connection failed : '.$conn->connect_error);
    } else { 
            $stmt = $conn->prepare("insert into user(handle, Password, Firstname, Surname)
            values(?,?,?,?)");
            $stmt->bind_param("ssss",$email, $password, $Firstname, $Surname);
            $stmt->execute();
            echo "User registered, redirecting to login";
            $stmt->close();
            $conn->close();
    }
?>

 </body>
 </html>

