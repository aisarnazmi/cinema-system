<?php
	session_start();

	include("connection.php");

	$query = "SELECT * FROM members WHERE custUsername = '$_POST[custUsername]' AND custPW = '$_POST[custPW]'";

	$result = mysqli_query($connect, $query);

	if($row = mysqli_fetch_array($result))
	{	

		$_SESSION["custID"] = $row["custID"];
		$_SESSION["startMember"] = 'start';

		echo "<meta http-equiv=\"refresh\" content =\"0;URL=member.php\"/>";

	}		
	else
	{
		echo "<script type='text/javascript'> alert('Invalid Username Or Password. Please Try Again!'); </script>";
		echo "<meta http-equiv=\"refresh\" content =\"0;URL=index.php\"/>";
	}

?>