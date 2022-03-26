<?php

define("DB_HOST", "sql100.epizy.com");
define("DB_NAME", "epiz_31242413_project_database");
define("DB_CHARSET", "utf8");
define("DB_USER", "epiz_31242413");
define("DB_PASSWORD", "WbIh2OaPZju");
   
  $pdo = new PDO(
    "mysql:host=".DB_HOST.";charset=".DB_CHARSET.";dbname=".DB_NAME,
    DB_USER, DB_PASSWORD, [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]
  );
	//include_once 'includes/dbh.inc.php';
    //$conn = createConnection("sql100.epizy.com", "epiz_31242413", "WbIh2OaPZju", "epiz_31242413_project_database");

	$stmt=$pdo->prepare("SELECT * FROM user WHERE Firstname LIKE ? OR Surname LIKE ?");
	$stmt->execute(["%".$_POST['search'] . "%" , "%".$_POST['search'] . "%"]);

	$results = $stmt->fetchAll();		
			 


?>
