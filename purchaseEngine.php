
<?php
	session_start();

	include("connection.php");

	mysqli_query($connect, "INSERT INTO reservation (p_mTitle, p_Date, p_mShowtime, p_mNumTicket) VALUES ('$_POST[p_mTitle]', '$_POST[p_Date]', '$_POST[p_mShowtime]', '$_POST[p_mNumTicket]')" ) or die("Failed to Store Data To Database");
	
	$cViewCount = mysqli_fetch_array(mysqli_query($connect, "SELECT viewCount FROM movies WHERE mTitle = '$_POST[p_mTitle]'"));
	
	$nViewCount = $_POST["p_mNumTicket"] + $cViewCount["viewCount"];

	mysqli_query($connect, "UPDATE movies SET viewCount = '".$nViewCount."' WHERE mTitle = '$_POST[p_mTitle]' ");

	$sql = mysqli_query($connect, "SELECT * FROM reservation ORDER BY p_receiptID desc");

	$data = mysqli_fetch_array($sql);

	$_SESSION["p_receiptID"] = $data["p_receiptID"];


	$N = count($_POST["p_Seat"]);

	$seat = $_POST["p_Seat"];

	for($i = 0; $i < $N; $i++){

		$temp = $seat[$i];

		mysqli_query($connect, "INSERT INTO seat (p_Seat, p_mTitle, p_Date, p_mShowtime, p_receiptID) VALUES ('$temp', '$_POST[p_mTitle]', '$_POST[p_Date]', '$_POST[p_mShowtime]', '$_SESSION[p_receiptID]')" ) or die("Failed to Store Data To Database");
	}

	echo "<script type='text/javascript'>alert('Booking submited! Redirecting...')</script>
					<meta http-equiv=\"refresh\" content=\"1;URL=purchaseSuccessful.php\"/>";

?>
