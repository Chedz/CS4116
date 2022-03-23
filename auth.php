<!DOCTYPE html>
<html>
<head>
    <title>Auth</title>
    <!-- <meta http-equiv = "refresh" content = "3; url = http://14-cs4116.infinityfreeapp.com/profilePage.php" /> -->
</head>
<body>
<?php
    $email = $_POST['email'];
    $password = $_POST['password'];

    $servername = "sql100.epizy.com"; 
    $username = "epiz_31242413"; 
    $password1 = "WbIh2OaPZju"; 
    $dbname = "epiz_31242413_project_database"; 

    $conn = new mysqli($servername, $username, $password1, $dbname);

    if($conn->connect_error){
        die('Connection failed : '.$conn->connect_error);
    } else { 
        $stmt = $conn->prepare("select * from user where handle = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        if($stmt_result->num_rows > 0){
            $data = $stmt_result->fetch_assoc();
            if($data['Password'] === $password) {
                echo "<h1>Login Success</h1>";
            } else {
                echo "<h1>Incorrect email/password</h1>";
            }
        } else {
            echo "<h1>Incorrect email/password</h1>";
        }
    }
?>
</body>
</html>
