<?php

	require_once 'includes/dbh.inc.php';
	$conn = createConnection("sql100.epizy.com", "epiz_31242413", "WbIh2OaPZju", "epiz_31242413_project_database");
$output = '';
if(isset($_POST['search']))  {
		$searchq = $_POST['search'];
		$searchq = preg_replace("#[^0-9a-z]#i","",$searchq );
		
		$query = mysql_query("SELECT * FROM users WHERE firstname LIKE '%$searchq%' OR lastname LIKE '%$searchq%'") or die("could not search");
		$count = mysql_num_rows($query);
		if($count == 0){
			$output = 'There was no search results!';
		}else{
			while($row = mysqp_fetch_array($query))  {
			$fname = $row['firstname'];
			$lname = $row['lname'];
			$id = $row['id'];
			
			$output .= '<div>'.$fname.' '.$lname.'</div>';
		}
		}
}
?>

<!Doctype html>
<html>
<head>

<title>Search</title>
<meta http-equiv = "refresh" content = "3; url = http://14-cs4116.infinityfreeapp.com/search.php" />

</head>



<body>

<form action="Search.php" method="post">
	<input type="text" name="search" placeholder="Search for members..."/>
	<input type="submit" value="Search" />

</form>

<?php print("$output");?>
</body>


</html>
