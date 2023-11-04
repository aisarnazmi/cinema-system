<?php

	include("connection.php");
	session_start();
	
	$custName = $_POST["custName"];
	$custEmail = $_POST["custEmail"];
	$custUsername = $_POST["custUsername"];
	$custPassword = $_POST["custPW"];
	$custNRIC = $_POST["custNRIC"];
	$custPhoneNum = $_POST["custPhoneNum"];
	$custGender = $_POST["custGender"];
	$custDOB = $_POST["custDOB"];
	$custRace = $_POST["custRace"];
	$custState = $_POST["custState"];
	$custAddress = $_POST["custAddress"];
	$custCity = $_POST["custCity"];
	$custPostcode = $_POST["custPostcode"];

	
	
	$sql = "UPDATE members SET custName='".$custName."', custEmail='".$custEmail."', custUsername='".$custUsername."', custPW='".$custPassword."', custNRIC='".$custNRIC."', custPhoneNum='".$custPhoneNum."', custGender='".$custGender."', custDOB='".$custDOB."', custRace='".$custRace."', custState='".$custState."', custAddress='".$custAddress."', custCity='".$custCity."', custPostcode='".$custPostcode."' WHERE custID='$_SESSION[custID]'";
	
	if(mysqli_query($connect, $sql))
	{
		echo '<script type="text/javascript">alert("Your profile has been updated successfully!")</script>';
		echo "<meta http-equiv=\"refresh\" content =\"0;URL=member.php\"/>";
	}
	else
		echo '<script type="text/javascript">alert("Failed to update profile!")</script>';
		
	?>
