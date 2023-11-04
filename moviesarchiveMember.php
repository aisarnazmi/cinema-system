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
		
			if(isset($_SESSION["startMember"])){
		
		?>
		
		<!-- Page Wrapper -->
			<div id="page-wrapper">
				
			<?php
							
				$data = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM members where custID = '$_SESSION[custID]' "));

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
								<li><a href="member.php">Home</a></li>
								<li><a href="purchase.php">Buy Tickets</a></li>
								<li><a href="#">Movies Archive</a></li>
								<li><a href="memberProfile.php">Member's Profile</a></li>
								<li><a href="deleteAccount.php">Delete Account</a></li>
								<hr>
								<li><a href="logoutEngine.php">Logout</a></li>
							</ul>
							<a href="#" class="close">Close</a>
						</div>
					</nav>

				<!-- Wrapper -->
					<section id="banner">
						<div class="inner">
							<div class="logo"><!-- <span class="icon fa-diamond"></span>--></div>
							<h2>Paragon Cinemas</h2>
							<p>The starting point for entertainment</p>
						</div>
					</section>
					
				<section id="mArchive" class="wrapper alt style1">
								<div class="inner">
								<br>
									<h3 class="major">Movies Archive</h3>
										<br>
										<form action="moviesarchiveMember.php#mArchive" method="post" name="formSearch">
											<input type="search" name="mTitle" placeholder="Search..">
										</form>
									
									<?php

									if(isset($_POST["mTitle"])) {

										$mName = $_POST["mTitle"];
										
										$query = mysqli_query($connect, "SELECT * FROM movies WHERE mTitle LIKE '%{$mName}%' ");
										
										
										if(mysqli_fetch_assoc($query))
										{
											$result = mysqli_query($connect, "SELECT * FROM movies WHERE mTitle LIKE '%{$mName}%' ");
									?>
										
									<section class="features">
										
									<?php	
											while($row = mysqli_fetch_array($result))
											{
									?>
									
									
										<article>
											<a class="image"><?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row['mImage'] ).'" class="img-thumnail" alt="img">'; ?> </a>
											<h3 class="major"><?php echo $row["mTitle"]; ?></h3>
											<a href="infoMember.php?ID=<?php echo $row["mID"]; ?>" class="special">Get Info</a>
										</article>
										
									
										
									<?php
											
											}
										}
										else{
											echo "No result found ...";
										}
									
									?>
								
									</section>
									<hr>
									<ul class="actions">
										<li><a href="moviesarchive.php" class="button">View All</a></li>
									</ul>
										
									<?php	
									}
									else{
										
										$result = mysqli_query($connect, "SELECT * FROM movies ORDER BY mTitle asc") or die("Failed to Read Data From Database");
									?>
									
									<section class="features">
									
									<?php
										while($row = mysqli_fetch_array($result))
										{
									?>
									
									
										<article>
											<a class="image"><?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row['mImage'] ).'" class="img-thumnail" alt="img">'; ?> </a>
											<h3 class="major"><?php echo $row["mTitle"]; ?></h3>
											<a href="infoMember.php?ID=<?php echo $row["mID"]; ?>" class="special">Get Info</a>
										</article>
										
										
									<?php
										}
									}
									?>
									</section>
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
			<script src="assets/js/keycode.js"></script>
			
			<?php
				
			}
			else{
				
				header("Location: index.php");
				
			}
	
	?>

	</body>
</html>