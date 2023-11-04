<?php
	include("connection.php");
	
	$custName = $_POST["custName"];
	$custEmail = $_POST["custEmail"];
	$custUsername = $_POST["custUsername"];
	$custPW = $_POST["custPW"];
	$custNRIC = $_POST["custNRIC"];
	$custPhoneNum = $_POST["custPhoneNum"];
	$custGender = $_POST["custGender"];
	$custDOB = $_POST["custDOB"];
	$custRace = $_POST["custRace"];
	$custState = $_POST["custState"];
	$custAddress = $_POST["custAddress"];
	$custCity = $_POST["custCity"];
	$custPostcode = $_POST["custPostcode"];

	$query = "INSERT INTO members (custName, custEmail, custUsername, custPW, custNRIC, custPhoneNum, custGender, custDOB, custRace, custState, custAddress, custCity, custPostcode)
	VALUE ('".$custName."', '".$custEmail."', '".$custUsername."', '".$custPW."', '".$custNRIC."', '".$custPhoneNum."', '".$custGender."', '".$custDOB."', '".$custRace."', '".$custState."', '".$custAddress."', '".$custCity."', '".$custPostcode."')";
		
	if(mysqli_query($connect, $query)){
		echo '<script>alert("Registration successful! You can sign in your account now.")</script>';
		echo	"<meta http-equiv=\"refresh\" content=\"0;URL=index.php\"/>";
	}
	else{
		echo '<script>alert("Registration Failed. Please try again!")</script>
				<meta http-equiv=\"refresh\" content=\"0;URL=register.php#register\"/>';
	}

?>