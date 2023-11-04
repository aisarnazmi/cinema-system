<!DOCTYPE HTML>
<html>
	<head>
	
		<?php
			session_start();
			include("connection.php");
		?>
		
		<title></title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
	
	<body>
		
		<?php
		
			if(isset($_SESSION["startMember"])){
		
		?>
		<!-- Page Wrapper -->
			<div id="page-wrapper">
			
			<?php
				
				$data = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM members WHERE custID = '$_SESSION[custID]' "));
				
			?>
				<!-- Header -->
					<header id="header">
						<h1><a href="member.php" style="vertical-align: top;"><span><img style="padding-top: 15px;" src="images/paragon-logo.png" width="55" height="62" alt=""/>&nbsp;</span>PARAGON CINEMA</a></h1>
						<nav>
							<a style="font-weight: 100"><b>Welcome,</b> <?php echo $data["custUsername"]; ?></a>
							<a href="#menu">Menu</a>
						</nav>
					</header>
					
				<!-- Menu -->
					<nav id="menu">
						<div class="inner">
							<h2>Menu</h2>
							<ul class="links">
								<li><a href="#">Home</a></li>
								<li><a href="purchase.php">Buy Tickets</a></li>
								<li><a href="moviesarchiveMember.php">Movies Archive</a></li>
								<li><a href="memberProfile.php">Member's Profile</a></li>
								<li><a href="deleteAccount.php">Delete Account</a></li>
								<hr>
								<li><a href="logoutEngine.php">Logout</a></li>
							</ul>
							<a href="#" class="close">Close</a>
						</div>
					</nav>
				
				<!-- Banner -->
					<section id="banner">
						<div class="inner">
							<div class="logo"><!-- <span class="icon fa-diamond"></span>--></div>
							<h2>Paragon Cinema</h2>
							<p>The starting point for entertainment</p>
						</div>
					</section>

				<!-- Wrapper -->
					<section id="wrapper">
							<section class="wrapper spotlight style1">
									<h2 align="center">Latest Movies</h2>
									<br><br>
									<a href="#first"><div class="arrow bounce"></div></a>
							</section>
					
					<?php

						$result = mysqli_query($connect, "SELECT * FROM movies ORDER BY mID desc") or die("Query failed");

						$count = 1;
						for ($i = 1; $i <= 3; $i++)
						{
							$row = mysqli_fetch_array($result);
							
							if($count % 2 != 0)
							{
								
					?>			
								<section id="first" class="wrapper alt spotlight style<?php echo $count++ ?>">
								<br>
									<div class="inner">
										<a class="image"><?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row['mImage'] ).'" class="img-thumnail" alt="img">'; ?></a>
										<div class="content">
											<h2 class="major"><?php echo $row["mTitle"]; ?></h2>
											<p><?php echo $row["mSynopsis"]; ?></p>
											<a href="infoMember.php?ID=<?php echo $row["mID"]; ?>" class="special">Get Info</a>
										</div>
									</div>
								</section>
					<?php
							}
							elseif($count % 2 == 0){
					?>
								<section class="wrapper spotlight style<?php echo $count++ ?>">
								<br>
									<div class="inner">
										<a class="image"><?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row['mImage'] ).'" class="img-thumnail" alt="img">'; ?></a>
										<div class="content">
											<h2 class="major"><?php echo $row["mTitle"]; ?></h2>
											<p><?php echo $row["mSynopsis"]; ?></p>
											<a href="infoMember.php?ID=<?php echo $row["mID"]; ?>" class="special">Get Info</a>
										</div>
									</div>
								</section>
					<?php
							}
						}
					?>

						<!-- Top Movies -->
							<section id="topView" class="wrapper style1">
								<div class="inner">
									<h2 class="major">Top Viewed Movies</h2>
									
									<section class="features">
									
									<?php

										$result = mysqli_query($connect, "SELECT * FROM movies ORDER BY viewCount desc") or die("Query failed");
										
										
										for ($i = 0; $i < 6; $i++)
										{
											$row = mysqli_fetch_array($result);
									?>
										<article>
											<a class="image"><?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row['mImage'] ).'" class="img-thumnail" alt="img">'; ?> </a>
											<h3 class="major"><?php echo $row["mTitle"]; ?></h3>
											<a href="infoMember.php?ID=<?php echo $row["mID"]; ?>" class="special">Get Info</a>
										</article>
										
									<?php
										}
									?>
									</section>
									
									<ul class="actions">
										<li><a href="moviesarchiveMember.php" class="button">Browse All</a></li>
									</ul>
									<hr>
									<div class="6u$(medium)" align="center">
										<ul class="actions vertical">
											<li><a href="purchase.php" class="button fit">Buy Ticket Now!</a></li>
										</ul>
									</div>
								</div>
								
							</section>
							
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
			<script src="assets/js/modal.js"></script>
	<?php
				
			}
			else{
				
				header("Location: index.php");
				
			}
	
	?>
	</body>
</html>