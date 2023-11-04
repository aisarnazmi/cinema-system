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

	if (isset($_SESSION["startMember"])) {

		$data = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM members WHERE custID = '$_SESSION[custID]' "));

	?>

		<!-- Page Wrapper -->
		<div id="page-wrapper">

			<!-- Header -->
			<header id="header">
				<h1><a href="member.php" style="vertical-align: top;"><span><img style="padding-top: 15px;" src="images/paragon-logo.png" width="55" height="62" alt="" />&nbsp;</span>PARAGON CINEMA</a></h1>
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
						<li><a href="#">Buy Tickets</a></li>
						<li><a href="moviesarchiveMember.php">Movies Archive</a></li>
						<li><a href="memberProfile.php">Member's Profile</a></li>
						<li><a href="deleteAccount.php">Delete Account</a></li>
						<hr>
						<li><a href="logoutEngine.php">Logout</a></li>
					</ul>
					<a href="#" class="close">Close</a>
				</div>
			</nav>

			<!-- SignIn -->
			<div id="login" class="modal">
				<form class="modal-content animate" action="/action_page.php">
					<div class="imgcontainer" align="right">
						<span onclick="document.getElementById('login').style.display='none'" class="close" title="Close">&times;</span>
					</div>

					<div class="container">
						<h2>Log In</h2>
						<hr>
						Username<input type="text" placeholder="Enter Username" name="username" required>
						<br><br>
						Password<input type="password" placeholder="Enter Password" name="password" required>
						<hr>
						<div align="center">
							<button type="submit">Login</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>First time user? Please click <a href="register.php">Sign Up>Here</a> to sign Up.</span>
						</div>
					</div>
				</form>
			</div>

			<div id="loginAdmin" class="modal">
				<form class="modal-content animate" action="/action_page.php">
					<div class="imgcontainer" align="right">
						<span onclick="document.getElementById('loginAdmin').style.display='none'" class="close" title="Close">&times;</span>
					</div>

					<div class="container">
						<h2>Sign In Admin</h2>
						<hr>
						Username<input type="text" placeholder="Enter Username" name="username" required>
						<br><br>
						Password<input type="password" placeholder="Enter Password" name="password" required>
						<hr>
						<div align="center">
							<button type="submit">Login</button>
						</div>
					</div>

				</form>
			</div>

			<!-- Wrapper -->
			<section id="wrapper">
				<header>
					<div class="inner">
						<h2>PURCHASE TICKET NOW!</h2>
						<p>The starting point for entertainment</p>
					</div>
				</header>

				<!-- Content -->
				<div class="wrapper">
					<div class="inner" id="form">
						<br>
						<h3 class="major">Purchase Detail</h3>
						<section>

							<form method="post" action="purchaseEngine.php">
								<div class="row uniform">

									<?php
									$data = mysqli_fetch_array(mysqli_query($connect, "SELECT mID, mTitle FROM movies WHERE mID = '$_POST[p_mTitle]' "));

									$mTitle = $data['mTitle'];
									?>
									<div class="6u$ 12u$(xsmall)">
										<label for="p_mTitle">Movie</label>
										<input type="text" name="p_mTitle" id="p_mTitle" value="<?php echo $mTitle ?>" readonly />
									</div>
									<div class="4u 12u$(xsmall)">
										<label for="p_Date">Date</label>
										<input type="text" name="p_Date" id="p_Date" value="<?php echo $_POST['p_Date']; ?>" readonly />
									</div>
									<div class="4u$ 12u$(xsmall)">
										<label for="p_mShowtime">Showtime</label>
										<input type="text" name="p_mShowtime" id="p_mShowtime" value="<?php echo $_POST['p_mShowtime']; ?>" readonly />
									</div>
									<div class="4u 12u$(xsmall)">
										<label for="p_mNumTicket">Ticket Quantity</label>
										<input type="text" name="p_mNumTicket" id="p_mNumTicket" value="<?php echo $_POST['p_mNumTicket']; ?>" readonly />
									</div>

									<div class="12u$">
										<hr>
										<div class="plane">
											<div class="cockpit">
												<h1>Please select a seat</h1>
											</div>
											<div class="exit exit--front fuselage"></div>
											<ol class="cabin fuselage">

												<?php

												$sql = mysqli_query($connect, "SELECT p_Seat FROM seat WHERE p_mTitle = \"$mTitle\" AND p_Date = '$_POST[p_Date]' AND p_mShowtime = '$_POST[p_mShowtime]' ORDER BY p_Seat asc ") or die("Failed to Read Data From Database");


												$nmR = mysqli_num_rows($sql);

												$seat = array();

												if ($nmR != 0) {

													$rowSeat = mysqli_fetch_array($sql);

													for ($j = 1; $j <= 6; $j++) {

														$f = 1;

														for ($k = 'A'; $k <= 'K'; $k++) {

															if ($rowSeat['p_Seat'] == $j . $k) {
																$seat[$j][$f] = $rowSeat['p_Seat'];
																$rowSeat = mysqli_fetch_array($sql);
															} else {
																$seat[$j][$f] = '';
															}

															$f++;
														}
													}

													for ($i = 1; $i <= 6; $i++) {
														$rowSeat = mysqli_fetch_array($sql);
														$S = 1;

												?>

														<li class="row row--<?php echo $i ?>">
															<ol class="seats" type="A">

																<?php

																for ($char = 'A'; $char <= 'K'; $char++) {

																?>
																	<li class="seat">
																		<input type="checkbox" name="p_Seat[]" id="<?php echo $i ?><?php echo $char ?>" value="<?php echo $i ?><?php echo $char ?>" <?php if ($seat[$i][$S] == $i . $char) {
																																																		echo 'disabled';
																																																	} ?> />
																		<label for="<?php echo $i ?><?php echo $char ?>"><?php echo $i . $char ?></label>
																	</li>


																<?php
																	$S++;
																}
																?>

															</ol>
														</li>

													<?php

													}
												} else {
													for ($i = 1; $i <= 6; $i++) {

													?>

														<li class="row row--<?php echo $i ?>">
															<ol class="seats" type="A">

																<?php

																for ($char = 'A'; $char <= 'K'; $char++) {

																?>

																	<li class="seat">
																		<input type="checkbox" name="p_Seat[]" id="<?php echo $i ?><?php echo $char ?>" value="<?php echo $i ?><?php echo $char ?>" />
																		<label for="<?php echo $i ?><?php echo $char ?>"><?php echo $i . $char ?></label>
																	</li>


																<?php

																}
																?>
															</ol>
														</li>

												<?php

													}
												}
												?>

											</ol>
											<div class="exit exit--back fuselage"></div>
										</div>
									</div>

								</div>
								<br>
								<hr>
								<div class="12u$" align="center">
									<ul class="actions">
										<li><input type="reset" value="Back" onClick="window.location.href='purchase.php#form'" /></li>
										<li><input type="submit" value="Proceed" class="special" id="seatReserve" name="seatReserve" /></li>
									</ul>
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
		<script src="assets/js/modal.js"></script>
		<script src="assets/js/formvalidation.js"></script>

	<?php

	} else {

		header("Location: index.php");
	}

	?>

</body>

</html>