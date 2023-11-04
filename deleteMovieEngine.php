<?php 

	include("connection.php");
	
	$query = mysqli_query($connect, "DELETE FROM movies WHERE mID = '$_GET[mID]' ");

	if($query){
		
		echo"<meta http-equiv=\"refresh\" content =\"0;URL=manageMovies.php\"/>";
		echo '<script type="text/javascript">alert("Movie has been deleted.")</script>';
		
	}
	else{
		echo '<script type="text/javascript">alert("Failed to delete movie.")</script>';
		
	}
?>