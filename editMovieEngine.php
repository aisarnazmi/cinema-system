<?php

	include("connection.php");
		
	$mTitle = $_POST["mTitle"];
	$mSynopsis = $_POST["mSynopsis"];
	$mTrailerLink = $_POST["mTrailerLink"];
	$mReleaseDate = $_POST["mReleaseDate"];
	$mLanguage = $_POST["mLanguage"];
	$mSubtitle = $_POST["mSubtitle"];
	$mGenre = $_POST["mGenre"];
	$mRunTime = $_POST["mRunTime"];
	$mDirector = $_POST["mDirector"];
	$mCast = $_POST["mCast"];
	$mDistributor = $_POST["mDistributor"];
	$mShowtime1 = $_POST["mShowtime1"];
	$mShowtime2 = $_POST["mShowtime2"];
	$mShowtime3 = $_POST["mShowtime3"];

	$query = "UPDATE movies SET mTitle = '".$mTitle."', mSynopsis = '".$mSynopsis."', mTrailerLink = '".$mTrailerLink."', mReleaseDate = '".$mReleaseDate."', mLanguage = '".$mLanguage."', mSubtitle = '".$mSubtitle."', mGenre = '".$mGenre."', mRunTime = '".$mRunTime."', mDirector = '".$mDirector."', mCast = '".$mCast."', mDistributor = '".$mDistributor."', mShowtime1 = '".$mShowtime1."', mShowtime2 = '".$mShowtime2."', mShowtime3 = '".$mShowtime3."' WHERE mID = '$_GET[mID]'  ";
		
	if(mysqli_query($connect, $query)){
		echo '<script>alert("Movie details has been updated successfully.")</script>';
		echo "<meta http-equiv=\"refresh\" content =\"0;URL=manageMovies.php\"/>";
	}
	else{
		echo '<script>alert("Failed. To update movie!")</script>';
	}

?>