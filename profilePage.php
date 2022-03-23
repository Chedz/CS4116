<!DOCTYPE html>
<head>
</head>
<body>
    <form method="POST">
        <label>Search</label>
        <input type="text" name="search">
        <input type="submit" name="submit">
    </form>

    <?php
        $servername = "sql100.epizy.com"; 
        $username = "epiz_31242413"; 
        $password1 = "WbIh2OaPZju"; 
        $dbname = "epiz_31242413_project_database"; 

    $conn = new mysqli($servername, $username, $password1, $dbname);
    if(isset($_POST['submit'])){
        $str1 = $_POST['search'];
        $str2 = $conn->prepare("SELECT * FROM user WHERE Firstname = '$str'");
        //finish search function
    }
    ?>
</body>
</html>
