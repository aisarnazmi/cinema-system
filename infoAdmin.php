<!DOCTYPE HTML>
<html>
	<head>
		<title></title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
		
		<?php
			session_start();
			include("connection.php");
		?>
		
	</head>
	
	<body>
	
		<?php
		
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
								<li><a href="admin.php">Home</a></li>
								<li><a href="addmovie.php">Add Movie</a></li>
								<li><a href="manageMovies.php">Manage Movies</a></li>
								<hr>
								<li><a href="logoutEngine.php">Sign out</a></li>
							</ul>
							<a href="#" class="close">Close</a>
						</div>
					</nav>
					
			
			<?php
				
				$sql = "SELECT * FROM movies WHERE mID = {$_GET["ID"]}";
				$query = mysqli_query($connect, $sql);
				
		
				while($row = mysqli_fetch_array($query))
				{
        
			?>
				<!-- Wrapper -->
					<section id="wrapper">
						<header>
							<div class="inner">
								<h2><?php echo $row["mTitle"]; ?></h2>
							</div>
						</header> 
						
						<!-- Content -->
							<div class="wrapper">
							
								<div class="inner">
									<div class="row uniform">
										
											<p align="center"><span class="tumb"><?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row["mImage"] ).'" alt="img" />'; ?> 
										</span><b>Synopsis:</b><br><br><?php echo $row["mSynopsis"]; ?><br><br><br><?php echo '<a href="'.$row["mTrailerLink"].'" target="_blank"><img src="images/movie_page_YouTubeCTA.png"></a>' ?></p>
										<table align="center">
											<tr>
												<td width="35%" style="padding-left: 100px" align="left">Release Date</td>
												<td width="5%">:</td>
												<td><?php  echo $row["mReleaseDate"]; ?></td>
											</tr>
											<tr>
												<td style="padding-left: 100px" align="left">Language</td>
												<td>:</td>
												<td><?php echo $row["mLanguage"]; ?></td>
											</tr>
											<tr>
												<td style="padding-left: 100px" align="left">Subtitle</td>
												<td>:</td>
												<td><?php echo $row["mSubtitle"]; ?></td>
											</tr>
											<tr>
												<td style="padding-left: 100px" align="left">Genre</td>
												<td>:</td>
												<td><?php echo $row["mGenre"]; ?></td>
											</tr>
											<tr>
												<td style="padding-left: 100px" align="left">Running Time</td>
												<td>:</td>
												<td><?php echo $row["mRunTime"]; ?> Minutes</td>
											</tr>
											<tr>
												<td style="padding-left: 100px" align="left">Director</td>
												<td>:</td>
												<td><?php echo $row["mDirector"]; ?></td>
											</tr>
											<tr>
												<td style="padding-left: 100px" align="left">Cast</td>
												<td>:</td>
												<td><?php echo $row["mCast"]; ?></td>
											</tr>
											<tr>
												<td style="padding-left: 100px" align="left">Distributor</td>
												<td>:</td>
												<td><?php echo $row["mDistributor"]; ?></td>
											</tr>
										</table>
									</div>
								</div>
							</div>
					</section>
					
			<?php
					
				}
			?>
					
				<section id="topView" class="wrapper alt style1">
								<div class="inner">
									<h2 class="major">Top Viewed Movies</h2>
									
									<section class="features">
									
									<?php

										$result = mysqli_query($connect, "SELECT * FROM movies ORDER BY viewCount desc") or die("Failed to Read Data From Database");
										
										
										for ($i = 0; $i < 6; $i++)
										{
											$row = mysqli_fetch_array($result);
									?>
										<article>
											<a class="image"><?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row['mImage'] ).'" class="img-thum" alt="img">'; ?> </a>
											<h3 class="major"><?php echo $row["mTitle"]; ?></h3>
											<a href="infoAdmin.php?ID=<?php echo $row["mID"]; ?>" class="special">Get Info</a>
										</article>
										
									<?php
										}
									?>
									
									</section>
									<ul class="actions">
										<li><a href="admin.php" class="button">Browse All</a></li>
									</ul>
									<hr>
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
			<script src="assets/js/modal.js"></script>
			<script src="assets/js/main.js"></script>
			
		<?php
				
			}
			else{
				
				header("Location: index.php");
				
			}
	
	?>

	</body>
</html>