<!DOCTYPE html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Profile Page</title>
</head>
<body>
    <?php
        require_once 'includes/dbh.inc.php';
        $conn = createConnection("sql100.epizy.com", "epiz_31242413", "WbIh2OaPZju", "epiz_31242413_project_database");
        session_start();
        if(empty($_SESSION['loggedin'])){ header("location: login.php");} //if user not logged in, send to login
    ?>
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="#">About Us</a></li>
        <li><a href="index.php">Sign Up</a></li>
        <li><a href="login.php">Log In</a></li>
    </ul>
    
    <div class="container-fluid">
        <div class="row">
        <div class="col" id="div1" style="border-radius: 25px; border: 2px solid purple;">
            <h5>Update User Profile</h5>
            <form action="editProfile.php" method="POST" enctype="multipart/form-data">

            <?php
                $currUser = $_SESSION['username'];
                
                $sql = "SELECT * FROM profile WHERE email = '$currUser'";

                $results = mysqli_query($conn,$sql);

                if($results){
                    if(mysqli_num_rows($results)>0){ //IF user has previously set up profile, this form shows with current profile values
                        while($row = mysqli_fetch_array($results)){
                            //print_r($row);
                            ?>
                                <div class="form-group">
                        <input type="text" class="form-control" id="email" name="email" placeholder="email" value="<?php echo $_SESSION['username'];?>" readonly="true" style="color:#808080"/>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="age" name="age" placeholder="Age" value="<?php echo $row['Age'];?>"/>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="snapchat" name="snapchat" placeholder="Snapchat" value="<?php echo $row['Snapchat'];?>"/>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="instagram" name="instagram" placeholder="Instagram" value="<?php echo $row['Instagram'];?>"/>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="university" name="university" placeholder="University" value="<?php echo $row['Institution'];?>"/>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="course" name="course" placeholder="Course" value="<?php echo $row['Course'];?>"/>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="location" name="location" placeholder="Location" value="<?php echo $row['Location'];?>"/>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="occupation" name="occupation" placeholder="Occupation" value="<?php echo $row['Occupation'];?>"/>
                    </div>
                    <div class="form-group">
                    <label>Smoker</label>
                        <input type="checkbox" class="form-control" id="smoker" name="smoker" value="1"/>
                    </div>
                    <div class="form-group">
                    <label>Drinker</label>
                        <select name="drinker">
                            <option value="" selected disabled hidden>Select</option>
                            <option value="Constantly">Always</option>
                            <option value="Social Drinker">Sometimes</option>
                            <option value="No">Never</option>
                        </select>
                    </div>
                    <div class="form-group">
                    <label>Gender</label>
                        <select name="gender">
                            <option value="" selected disabled hidden>Select</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div class="form-group">
                    <label>Seeking</label>
                        <select name="seeking">
                            <option value="" selected disabled hidden>Select</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <!-- Description -->
                        <input type="text" name="description" class="form-control" id="description" placeholder="Describe yourself" value="<?php echo $row['Description'];?>"/>
                    </div>
                    <div class="form-group">
                        <input type="file" name="userImage" id="userImage" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="buttonSubmitProfile" class="button" value="Save Details"/>
                    </div>
                            <?php
                        }
                    } else { //IF user hasnt set up profile, this form shows
                        ?>
                        <div class="form-group">
                        <input type="text" class="form-control" id="email" name="email" placeholder="email" value="<?php echo $_SESSION['username'];?>" readonly="true" style="color:#808080"/>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="age" name="age" placeholder="Age" value="<?php echo $row['Age'];?>"/>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="snapchat" name="snapchat" placeholder="Snapchat" value="<?php echo $row['Snapchat'];?>"/>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="instagram" name="instagram" placeholder="Instagram" value="<?php echo $row['Instagram'];?>"/>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="university" name="university" placeholder="University" value="<?php echo $row['Institution'];?>"/>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="course" name="course" placeholder="Course" value="<?php echo $row['Course'];?>"/>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="location" name="location" placeholder="Location" value="<?php echo $row['Location'];?>"/>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="occupation" name="occupation" placeholder="Occupation" value="<?php echo $row['Occupation'];?>"/>
                    </div>
                    <div class="form-group">
                    <label>Smoker</label>
                        <input type="checkbox" class="form-control" id="smoker" name="smoker" value="1"/>
                    </div>
                    <div class="form-group">
                    <label>Drinker</label>
                        <select name="drinker">
                            <option value="" selected disabled hidden>Select</option>
                            <option value="Constantly">Always</option>
                            <option value="Social Drinker">Sometimes</option>
                            <option value="No">Never</option>
                        </select>
                    </div>
                    <div class="form-group">
                    <label>Gender</label>
                        <select name="gender">
                            <option value="" selected disabled hidden>Select</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div class="form-group">
                    <label>Seeking</label>
                        <select name="seeking">
                            <option value="" selected disabled hidden>Select</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <!-- Description -->
                        <input type="text" name="description" class="form-control" id="description" placeholder="Describe yourself" value="<?php echo $row['Description'];?>"/>
                    </div>
                    <div class="form-group">
                        <input type="file" name="userImage" id="userImage" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="buttonSubmitProfile" class="button" value="Save Details"/>
                    </div>
                        <?php
                    }
                }
            ?>
                    
                </div>
                </form>
                <div class="col" id="div2" style="border-radius: 25px; border: 2px solid purple;">
                    <h5>Profile Preview</h5>
                    <?php
                        $currUser = $_SESSION['username'];
                        $sql = "SELECT * FROM profile WHERE email = '$currUser'";
                        $results = mysqli_query($conn,$sql);
                        if($results){
                            if(mysqli_num_rows($results)>0){ //IF user has profile, shows details
                                while($row = mysqli_fetch_array($results)){
                                //print_r($row);
                            
                    ?>

                    <!-- Profile Pic preview -->

                    <?php 
                        echo '<img src="'.$row['Photo'].'" alt="Profile Image" style="width: 250px; height: 250px; border: 1px solid black;">';
                    ?>

                    
                    <br>
                    <!-- Name+surname -->
                    
                    <!-- Age -->
                    <div style="width: 250px; background: rgba(0,0,255,0.3); border: 1px solid purple; border-radius: 2px; padding: 5px; margin-top: 20px;">
                    <?php echo $row['Age'] . "<br>";?>
                    </div>
                    <!-- University -->
                    <div style="width: 250px; background: rgba(0,0,255,0.3); border: 1px solid purple; border-radius: 2px; padding: 5px; margin-top: 5px;">
                    <?php echo $row['Institution'] . "<br>";?>
                    </div>
                    <!-- Course -->
                    <div style="width: 250px; background: rgba(0,0,255,0.3); border: 1px solid purple; border-radius: 2px; padding: 5px; margin-top: 5px;">
                    <?php echo $row['Course'] . "<br>";?>
                    </div>
                    <!-- Description -->
                    <div style="width: 250px; background: rgba(0,0,255,0.3); border: 1px solid purple; border-radius: 2px; padding: 5px; margin-top: 5px;">
                    <?php echo $row['Description'] . "<br>";?>
                    </div>
                    <?php
                                }
                            }
                        }
                    ?>
                </div>

        </div>
        </div>
</body>
</html>
