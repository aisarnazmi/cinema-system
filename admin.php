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
								<li><a href="#">Home</a></li>
								<li><a href="addmovie.php">Add Movie</a></li>
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
									<h2 class="major">All Movies</h2>
									<section class="features">
									
									<?php

										$result = mysqli_query($connect, "SELECT * FROM movies ORDER BY mID desc") or die("Failed to Read Data From Database");
										
										$numRow = mysqli_num_rows($result);
										for ($i = 0; $i < $numRow; $i++)
										{
											$row = mysqli_fetch_array($result);
									?>
										<article>
											<a class="image"><?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row['mImage'] ).'" class="img-thumnail" alt="img">'; ?> </a>
											<h3 class="major"><?php echo $row["mTitle"]; ?></h3>
											<a href="infoAdmin.php?ID=<?php echo $row["mID"]; ?>" class="special">Get Info</a>
										</article>
										
									<?php
										}
									?>
									</section>
									<hr>
									<div class="6u$(medium)" align="center">
										<ul class="actions vertical">
											<li><a href="addmovie.php" class="button fit">Add New Movie</a></li>
										</ul>
									</div>

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