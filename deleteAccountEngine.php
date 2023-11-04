<?php
	include("connection.php");

	session_start();


	
	$sql = "DELETE FROM members WHERE custID = '$_SESSION[custID]'";

	$query = mysqli_query ($connect, $sql);

	if($query)
	{
		echo '<script type="text/javascript">alert("Your account has been deleted.")</script>';
		echo"<meta http-equiv=\"refresh\" content =\"0;URL=logoutEngine.php\"/>";
	}
	else 
	{
		echo '<script type="text/javascript">alert("Failed to delete account. Please Try Again.")</script>';
	}
?>
