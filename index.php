<?php
mysql_connect("severname","username","password") or die("could not connect")
mysql_select_db("database name")
$output = '';
//collect
if(isset($_POST['search'])){
	$searchq = $_POST['search'];
	
	$query = mysql_query("SELECT * FROM members WHERE firstname LIKE '%$searchq%' OR lastname LIKE '%$searchq%'")or die("could not connect");
	$count = mysql_num_rows($query);
	if($count == 0){
		$output = 'No result';
	}
	else{
		while($row = mysql_fetch_array($query)){
			$fname = $row['firstname'];
			$lname = $row['lastname'];
			$id = $row['ic'];
			$output .= '<div>'.$fname.''.$lname.'</div>';
		}
	}
}	
?>

<html>
<header><title>doubisearch</title></header>
<body>

<form action="index.php" method="post">
	<input type="text" name="search" placeholder="please enter here"/>
	<input type="submit" value="confirm"/>
</form>

<?php.print("$output");
?>

</body>
</html>