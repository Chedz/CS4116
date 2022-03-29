<!DOCTYPE html>
 <html>
 <head>
   <title>Profile change</title>
 </head>
 <body>

   <?php
    require_once 'includes/dbh.inc.php';
    $conn = createConnection("sql100.epizy.com", "epiz_31242413", "WbIh2OaPZju", "epiz_31242413_project_database");
    session_start();

    //if(!empty($_SESSION['loggedin'])){ header("location: home.php");}  //check if user already logged in
    //$currUserID = $_SESSION['username'];
    $tempUserID = $_SESSION['username'];
                $sql1 = "SELECT UserID FROM user WHERE Handle = '$tempUserID'";
                $results1 = mysqli_query($conn,$sql1);
                $row1 = mysqli_fetch_array($results1);
                $UserID = $row1['UserID'];
    //echo $currUserID;
    $userEmail = $_SESSION['username'];
    //Profile Update Variables
    $age = $_POST['age'];
    $snapchat = $_POST['snapchat'];
    $instagram = $_POST['instagram'];
    $university = $_POST['university'];
    $course = $_POST['course'];
    $location = $_POST['location'];
    $occupation = $_POST['occupation'];
    $course = $_POST['course'];
    $location = $_POST['location'];
    $smoker = 0;
        if($_POST['smoker'] == 1){
            $smoker = 1;
        }
    $drinker = $_POST['drinker'];
    $gender = $_POST['gender'];
    $seeking = $_POST['seeking'];
    $description = $_POST['description'];
    
    //Upload file + path
    $targetDirectory = "userImages/";
    $targetFile = $targetDirectory . basename($_FILES["userImage"]["name"]);
    $uploadSuccess = 1;
    $fileTypesAllowed = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));

    
    if($fileTypesAllowed != "jpg" && $fileTypesAllowed != "png" && $fileTypesAllowed != "jpeg"){
        echo "File type not allowed";
        $uploadSuccess = 0;
    }
    if($uploadSuccess == 0){
        echo "File was not uploaded";
    } else {
        if(move_uploaded_file($_FILES["userImage"]["tmp_name"], $targetFile)){
            echo "File " . htmlspecialchars(basename($_FILES["userImage"]["name"])) . " has been uploaded.";
        } else {
            echo "There was an issue with uploading the file";
        }
    }


    if($conn->connect_error){
        die('Connection failed : '.$conn->connect_error);
    } else {
        $sql = "SELECT * FROM profile WHERE UserID = '$UserID'";
        $results = mysqli_query($conn, $sql);
        if($results){
            if(mysqli_num_rows($results)>0){ //IF UserID exists in profile table, update data in corresponding row
                $stmt = $conn->prepare("UPDATE profile SET Age='$age', Smoker='$smoker', Drinker='$drinker', Gender='$gender', Seeking='$seeking', Institution='$university', Course='$course', Location='$location', Instagram='$instagram',                   Snapchat='$snapchat', Occupation='$occupation', Description='$description', email='$userEmail', Photo='$targetFile' WHERE UserID='$UserID'");
                $stmt->execute();
                echo "Profile Updated";
                
                $stmt->close();
            } else { //ELSE username doesnt exist, insert new row
                $stmt = $conn->prepare("INSERT INTO profile (UserID, Age, Smoker, Drinker, Gender, Seeking, Institution, Course, Location, Instagram, Snapchat, Occupation, Description, email, Photo)
                    values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
                $stmt->bind_param('iiisssssssssbss',$UserID, $age, $smoker, $drinker, $gender, $seeking, $university, $course, $location, $instagram, $snapchat, $occupation, $description, $userEmail, $targetFile);
                $stmt->execute();
                echo "Profile Updated";
                $stmt->close();
            }
        }
        $conn->close();
    }
?>

 </body>
 </html>