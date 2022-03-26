<!DOCTYPE html>
 <html>
 
 <head>
   <title>Search</title>
   <link rel="stylesheet" href="css/style.css" type="text/css">
 </head>

<body>
<h1>Search</h1>
				<form action="search.php" method="POST">
					<input type="text" name="search" placeholder="Search for members..."/>
					<button type="submit" name="Search">Search</button>
	
				</form>

<?php

if (isset($_POST["search"])) {
  require "searchPage.php";


  if (count($results) > 0) { 
      foreach ($results as $r) {
        printf("<div>%s - %s</div>", $r["Firstname"], $r["Surname"]);
  }} else { echo "No results found"; }
}
?>

</body>
</html>
