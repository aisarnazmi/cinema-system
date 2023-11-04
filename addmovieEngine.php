<?php

	include("connection.php");
		
	$mTitle = $_POST["mTitle"];
	$mSynopsis = $_POST["mSynopsis"];
	$mImage = addslashes(file_get_contents($_FILES["mImage"]["tmp_name"]));
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

	$query = "INSERT INTO movies (mTitle, mSynopsis, mImage, mTrailerLink, mReleaseDate, mLanguage, mSubtitle, mGenre, mRunTime, mDirector, mCast, mDistributor, mShowtime1, mShowtime2, mShowtime3) VALUES ('".$mTitle."', '".$mSynopsis."', '".$mImage."', '".$mTrailerLink."', '".$mReleaseDate."', '".$mLanguage."', '".$mSubtitle."', '".$mGenre."', '".$mRunTime."', '".$mDirector."', '".$mCast."', '".$mDistributor."', '".$mShowtime1."', '".$mShowtime2."', '".$mShowtime3."')";
		
	if(mysqli_query($connect, $query)){
		echo '<script>alert("Movie Had Been Added to Database!")</script>;';
		echo "<meta http-equiv=\"refresh\" content=\"0;URL=addmovie.php\"/>";
	}
	else{
		echo '<script>alert("Failed. Please try again!")</script>';
	}

?>