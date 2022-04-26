<?php
    require_once 'includes/dbh.inc.php';
    $tempUserID = $_SESSION['username'];
    $conn = createConnection("sql100.epizy.com", "epiz_31242413", "WbIh2OaPZju", "epiz_31242413_project_database");
    $sqlBanned = "SELECT * FROM profile WHERE email = '$tempUserID'";
    $sqlBannedRes = mysqli_query($conn,$sqlBanned);
    $rowBan = mysqli_fetch_array($sqlBannedRes);
    $isBanned = $rowBan['Banned'];
    if($isBanned == NULL || $isBanned == 0){
        //Redirect, user is not banned
        header("location: home.php");
    } else if($isBanned == 1){
        //User is banned, redirect
        echo "User Banned, please sign out";
    }
    $conn->close();
?>
