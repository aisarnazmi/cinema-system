<!DOCTYPE HTML>
<html>
	<head>
		<title></title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
		
		<?php
		
			include("connection.php");
		
		?>
	
	<body>
		<!-- Page Wrapper -->
			<div id="page-wrapper">

				<!-- Header -->
					<header id="header">
						<h1><a href="index.php" style="vertical-align: top;"><span><img style="padding-top: 15px;" src="images/paragon-logo.png" width="55" height="62" alt=""/>&nbsp;</span>PARAGON CINEMA</a></h1>
						<nav>
							<a href="#menu">Menu</a>
						</nav>
					</header>
					
				<!-- Menu -->
					<nav id="menu">
						<div class="inner">
							<h2>Menu</h2>
							<ul class="links">
								<li><a href="#">Home</a></li>
								<li><a href="#" onclick="document.getElementById('login').style.display='block'; document.getElementById('loginAdmin').style.display='none'">Buy Tickets</a></li>
								<li><a href="moviesarchive.php">Movies Archive</a></li>
								<li><a href="#" onclick="document.getElementById('login').style.display='block'; document.getElementById('loginAdmin').style.display='none'">Login</a></li>
								<li><a href="register.php">Sign Up</a></li>
								<hr>
								<li><a href="#" onclick="document.getElementById('loginAdmin').style.display='block'; document.getElementById('login').style.display='none'">Admin</a></li>
							</ul>
							<a href="#" class="close">Close</a>
						</div>
					</nav>
					
				<!-- SignIn -->
				<div id="login" class="modal">
					  <form class="modal-content animate" action="loginEngineMember.php" method="post">
						<div class="imgcontainer" align="right">
						  <span onclick="document.getElementById('login').style.display='none'" class="close" title="Close">&times;</span>
						</div>
						
						<div class="container">
				  	  	  <h2>Log In</h2>
					  	  <hr>
					  	  Username<input type="text" placeholder="Enter Username" name="custUsername" required>
						  <br><br>
						  Password<input type="password" placeholder="Enter Password" name="custPW" required>
						  <hr>
						  <div align="center">
						  	<button type="submit">Login</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>First time user? Please click <a href="#">Here</a> to sign Up.</span>
						  </div>
						</div>

					  </form>
				</div>
				
				<div id="loginAdmin" class="modal">
					  <form class="modal-content animate" action="loginEngineAdmin.php" method="post">
						<div class="imgcontainer" align="right">
						  <span onclick="document.getElementById('loginAdmin').style.display='none'" class="close" title="Close">&times;</span>
						</div>
						
						<div class="container">
				  	  	  <h2>Sign In Admin</h2>
					  	  <hr>
					  	  ID<input type="text" placeholder="Enter ID" name="adminID" required>
						  <br><br>
						  Password<input type="password" placeholder="Enter Password" name="adminPW" required>
						  <hr>
						  <div align="center">
						  	<button type="submit">Login</button>
						  </div>
						</div>

					  </form>
				</div>
				
				<!-- Banner -->
					<section id="banner">
						<div class="inner">
							<div class="logo"></div>
							<h2>Paragon Cinemas</h2>
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

						$result = mysqli_query($connect, "SELECT * FROM movies ORDER BY mID desc") or die("Failed to Read Data From Database");

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
											<a href="info.php?ID=<?php echo $row["mID"]; ?>" class="special">Get Info</a>
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
											<a href="info.php?ID=<?php echo $row["mID"]; ?>" class="special">Get Info</a>
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

										$result = mysqli_query($connect, "SELECT * FROM movies ORDER BY viewCount desc") or die("Failed to Read Data From Database");
										
										
										for ($i = 0; $i < 6; $i++)
										{
											$row = mysqli_fetch_array($result);
									?>
										<article>
											<a class="image"><?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row['mImage'] ).'" class="img-thumnail" alt="img">'; ?> </a>
											<h3 class="major"><?php echo $row["mTitle"]; ?></h3>
											<a href="info.php?ID=<?php echo $row["mID"]; ?>" class="special">Get Info</a>
										</article>
										
									<?php
										}
									?>
									</section>
									
									<ul class="actions">
										<li><a href="moviesarchive.php" class="button">Browse All</a></li>
									</ul>
									<hr>
									<div class="6u$(medium)" align="center">
										<ul class="actions vertical">
											<li><a onclick="document.getElementById('login').style.display='block'; document.getElementById('loginAdmin').style.display='none'" href="#" class="button fit">Buy Ticket Now!</a></li>
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

	</body>
</html>