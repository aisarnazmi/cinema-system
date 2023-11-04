<!DOCTYPE HTML>
<html>
	<head>
		<title></title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
		
	</head>
	<body>
		
		<?php
			include("connection.php");
			session_start();
		
			if(isset($_SESSION["startAdmin"])){
		
		?>

		<!-- Page Wrapper -->
			<div id="page-wrapper">

				<!-- Header -->
					<header id="header">
						<h1><a href="admin.php" style="vertical-align: top;"><span><img style="padding-top: 15px;" src="images/paragon-logo.png" width="55" height="62" alt=""/>&nbsp;</span>PARAGON CINEMA</a></h1>
						<nav>
							<a>ADMINISTRATOR</a>
							<a href="#menu">Menu</a>
						</nav>
					</header>

				<!-- Menu -->
					<nav id="menu">
						<div class="inner">
							<h2>Menu</h2>
							<ul class="links">
								<li><a href="admin.php">Index</a></li>
								<li><a href="#">Add Movie</a></li>
								<li><a href="manageMovies.php">Manage Movies</a></li>
								<hr>
								<li><a href="logoutEngine.php">Sign out</a></li>
							</ul>
							<a href="#" class="close">Close</a>
						</div>
					</nav>

				<!-- Wrapper -->
				
					<section id="wrapper">

						<!-- Content -->
							<div class="wrapper">
								<div class="inner" id="form">
									<h2 class="major">Add newly released movies details.</h2>
									<section>
										
										<form method="post" action="addmovieEngine.php" enctype="multipart/form-data">
											<div class="row uniform">
												<br>
												<div class="6u 12u$(xsmall)">
													<label for="mTitle">Movie Title</label>
													<input type="text" name="mTitle" id="mTitle" value="" />
												</div>
												<div class="6u 12u$(xsmall)">
													<label for="mTrailerLink">Trailer Link</label>
													<input type="text" name="mTrailerLink" id="mTrailerLink" value="" />
												</div>
												<div class="6u 12u$(xsmall)">
													<label for="mSynopsis">Synopsis</label>
													<textarea name="mSynopsis" id="mSynopsis" rows="6"></textarea>
												</div>
												<div class="6u 12u$(xsmall)">
													<label for="mReleaseDate">Release Date</label>
													<input type="date" name="mReleaseDate" id="mReleaseDate" value="" />
												</div>
												<div class="6u$ 12u$(xsmall)">
													<label for="mLanguage">Language</label>
													<input type="text" name="mLanguage" id="mLanguage" value="" />
												</div>
												<div class="6u 12u$(xsmall)">
													<label for="mSubtitle">Subtitle</label>
													<input type="text" name="mSubtitle" id="mSubtitle" value="" />
												</div>
												<div class="6u 12u$(xsmall)">
													<label for="mGenre">Genre</label>
													<input type="text" name="mGenre" id="mGenre" value="" />
												</div>
												<div class="6u 12u$(xsmall)">
													<label for="mRunTime">Run Time</label>
													<input type="number" name="mRunTime" id="mRunTime" min="0" value=""/>
												</div>
												<div class="6u 12u$(xsmall)">
													<label for="mDirector">Director</label>
													<input type="text" name="mDirector" id="mDirector" value="" />
												</div>
												<div class="6u 12u$(xsmall)">
													<label for="mCast">Cast</label>
													<input type="text" name="mCast" id="mCast" value="" />
												</div>
												<div class="6u 12u$(xsmall)">
													<label for="mDistributor">Distributor</label>
													<input type="text" name="mDistributor" id="mDistributor" value="" />
												</div>
												<div class="4u 12u$(small)">
													<label for="mShowtime1">Showtime 1</label>
													<input type="time" id="mShowtime1" name="mShowtime1">
												</div>
												<div class="4u 12u$(small)">
													<label for="mShowtime2">Showtime 2</label>
													<input type="time" id="mShowtime2" name="mShowtime2">
												</div>
												<div class="4u$ 12u$(small)">
													<label for="mShowtime3">Showtime 3</label>
													<input type="time" id="mShowtime3" name="mShowtime3">
												</div>
												<div class="6u 12u$(xsmall)">
													<label for="mImage">Movie Image</label>
													<input type="file" name="mImage" id="mImage" value="" />
												</div>
												
												<div class="12u$" align="center">
														<ul class="actions" >
															<hr>
															<li><input type="submit" name="addMovie" id="addMovie" value="Add" class="special" /></li>
															<li><input type="reset" value="Reset" /></li>
														</ul>
												</div>
											</div>
											
										</form>
									</section>

								</div>
							</div>

					</section>

				<!-- Footer -->
				<section id="footer">
					<div class="inner" align="right">
						<ul class="copyright">
							<li>Copyright &copy; of Paragon Cinemas Sdn Bhd (3609-M) 2017.</li>
							<li>All Rights Reserved</li>
						</ul>
					</div>
				</section>

			</div>

		<!-- Scripts -->
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
			<script src="assets/js/formvalidation.js"></script>
			
			<?php
				
			}
			else{
				
				header("Location: index.php");
				
			}
	
	?>
	</body>
</html>