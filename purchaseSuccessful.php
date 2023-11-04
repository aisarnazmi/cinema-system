<!DOCTYPE HTML>
<html>
	<head>
		<title></title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />

		<?php
		
			include("connection.php");
			session_start();
		?>
		
	</head>
	
	<body>
	
		<?php
		
			if(isset($_SESSION["startMember"])){
		
			$data = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM members WHERE custID = '$_SESSION[custID]' "));

		?>
			
		<!-- Page Wrapper -->
			<div id="page-wrapper">

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
								<li><a href="moviesarchiveMember.php">Movies Archive</a></li>
								<li><a href="memberProfile.php">Member's Profile</a></li>
								<li><a href="deleteAccount.php">Delete Account</a></li>
								<hr>
								<li><a href="logoutEngine.php">Logout</a></li>
							</ul>
							<a href="#" class="close">Close</a>
						</div>
					</nav>

				<!-- Wrapper -->
					<section id="wrapper">
						<header>
							<div class="inner">
								<h2>BOOKING SUCCESSFUL</h2>
								<p>Your booking has been submited</p>
							</div>
						</header>

						<!-- Content -->
							<div class="wrapper">
								<div class="inner" id="form">
									
									<div class="6u$(medium)" align="center">
												<ul class="actions vertical">
													<li><a onClick="window.open('ticket.php','mywin','left=20,top=20,width=780,height=500,toolbar=1,resizaable=0'); return false;" href="#" class="button fit">View Ticket Now!</a></li>
												</ul>
											</div>
											<br>
									<h4 class="major" align="center">Click above button to view ticket</h3>
										<br>
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
			<script src="assets/js/modal.js"></script>
			<script src="assets/js/formvalidation.js"></script>
			
			<?php
				
			}
			else{
				
				header("Location: index.php");
				
			}
	
	?>

	</body>
</html>