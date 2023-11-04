<!doctype html>
<html>

<head>
	<meta charset="utf-8">
</head>

<body>
	<h1>Find People</h1>
	<form method="get">
		<input type="text" name="lname" placeholder="Enter last name"/>
		<input type="submit" name="search" value="Search" />
	</form>
	<br>
	<?php 
	
		if(isset($_GET["lname"])) {
			
			echo "<h1>Search Result</h1>";
			include("connection.php");
			
			$query = "SELECT * FROM ex WHERE lastname = '$_GET[lname]' ";
			
			$result = mysqli_query($connect, $query);
			
			if($result){
				if(mysqli_num_rows($result) == 0) {
					echo "No data found...!";
				}
				else {
					foreach($result as $data) {

						echo $data["firstname"]. " " .$data["lastname"];
					}
				}
			}
			else {
				echo "Error fetching database data!";
			}
		}
	?>
</body>

</html>