<?php
	session_start();

	include("connection.php");
	
	$query = "SELECT * FROM admins WHERE adminID = '$_POST[adminID]' AND adminPW = '$_POST[adminPW]' ";
	
	$result = mysqli_query($connect, $query);

	if($row = mysqli_fetch_array($result))
	{	
		$_SESSION["startAdmin"] = 'start';
		echo "<meta http-equiv=\"refresh\" content =\"0;URL=admin.php\"/>";
	}		
	else
	{
		echo '<script type="text/javascript"> alert("INVALID ID OR PASSWORD!")</script>';
		echo "<meta http-equiv=\"refresh\" content =\"0;URL=index.php\"/>";
	}

?>