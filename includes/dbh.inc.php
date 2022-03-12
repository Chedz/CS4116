<?php


$servername = "sql100.epizy.com";
$username = "epiz_31242413";
$password = "WbIh2OaPZju";
//$dbname = "epiz_31242413_sampleDatabase2";
$dbname = "epiz_31242413_testDB";
$connection = mysqli_connect($servername, $username, $password, $dbname); //new mysqli     mysqli_connect
//$connection = new mysqli("sql100.epizy.com", "epiz_31242413", "WbIh2OaPZju", "epiz_31242413_testDB");

// Check connection
if ($connection -> connect_error) {
 die("Connection failed: " . $connection ->connect_errno);
 //echo "Failed to connect to MySQL: " . $connection -> connect_error;
 exit();
}else {
  echo "Connected successfully";
  //printf("Success... %s\n", mysqli_get_host_info($connection));
}

$sql = "select * from modules;";
//$result = $connection->query($sql);
$result = mysqli_query($connection, $sql);

 while($row = $result->fetch_assoc())
 {
 print "{$row["code"]}:{$row["name"]}\n";
 }
$connection->close();

 ?>
