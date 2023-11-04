<!DOCTYPE HTML>
<html>
	<head>
		<title></title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	
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
								<li><a href="index.php">Home</a></li>
								<li><a href="#" onclick="document.getElementById('login').style.display='block'; document.getElementById('loginAdmin').style.display='none'">Buy Tickets</a></li>
								<li><a href="moviesarchive.php">Movies Archive</a></li>
								<li><a href="#" onclick="document.getElementById('login').style.display='block'; document.getElementById('loginAdmin').style.display='none'">Login</a></li>
								<li><a href="#">Sign Up</a></li>
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

				<!-- Wrapper -->
					<section id="wrapper">
						<header>
							<div class="inner">
								<h2>SIGN UP NOW!</h2>
								<p>Paragon Cinema Membership Registration</p>
							</div>
						</header>

						<!-- Content -->
							<div class="wrapper">
								<div class="inner" id="form">
									<h3 class="major" >Section 1: Login Details</h3>
									<section>
										
										<form method="post" action="registerEngine.php">
											<div class="row uniform">
												<div class="6u 12u$(xsmall)">
													<label for="custName">Full Name</label>
													<input type="text" name="custName" id="custName" value="" />
												</div>
												<div class="6u 12u$(xsmall)">
													<label for="custEmail">Email</label>
													<input type="text" name="custEmail" id="custEmail" value="" />
												</div>
												<div class="6u 12u$(xsmall)">
													<label for="custNRIC">NRIC</label>
													<input type="text" name="custNRIC" id="custNRIC" value="" maxlength="12" />
												</div>
												<div class="6u 12u$(xsmall)">
													<label for="custUsername">Username</label>
													<input type="text" name="custUsername" id="custUsername" value="" maxlength="50" />
												</div>
												<div class="6u 12u$(xsmall)">
													<label for="custPW">Password</label>
													<input type="password" name="custPW" id="custPW" value="" onchange="form.custPWC.pattern = this.value;" maxlength="50" min="6" />
												</div>
												<div class="6u 12u$(xsmall)">
													<label for="custPWC">Confirm Password</label>
													<input type="password" name="custPWC" id="custPWC" value="" min="6" required />
												</div>
												<div class="6u 12u$(xsmall)">
													<label for="custPhoneNum">Phone Number</label>
													<input type="text" name="custPhoneNum" id="custPhoneNum" value="" maxlength="12" />
												</div>
											</div>
										<br><br>
										
									<h3 class="major">Section 2: Member Profile</h3>
											<div class="row uniform">
												<div class="6u 12u$(small)">
												<label for="custGender">Gender</label>
													<input type="radio" id="custGenderMale" name="custGender" value="Male">
													<label for="custGenderMale">Male</label>
													&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
													&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
													&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
													<input type="radio" id="custGenderFemale" name="custGender" value="Female">
													<label for="custGenderFemale">Female</label>
												</div>
												<div class="4u 12u$(xsmall)">
														<label for="custDOB">Date of Birth</label>
														<input type="date" name="custDOB" id="custDOB" value="" />
												</div>
												<div class="6u 12u$(xsmall)">
													<label for="custRace">Race</label>
													<div class="select-wrapper">
														<select name="custRace" id="custRace">
															<option value="">-Select Race-</option>
															<option value="Malay">Malay</option>
															<option value="Chinese">Chinese</option>
															<option value="Indian">Indian</option>
															<option value="Others">Others</option>
														</select>
													</div>
												</div>
												<div class="6u 12u$(xsmall)">
													<label for="custState">State</label>
													<div class="select-wrapper">
														<select name="custState" id="custState">
															<option value="">-Select State-</option>
															<option value="Johor">Johor</option>
															<option value="Kedah">Kedah</option>
															<option value="Kelantan">Kelantan</option>
															<option value="Kuala Lumpur">Kuala Lumpur</option>
															<option value="Melaka">Melaka</option>
															<option value="Negeri Sembilan">Negeri Sembilan</option>
															<option value="Pahang">Pahang</option>
															<option value="Penang">Penang</option>
															<option value="Perak">Perak</option>
															<option value="Perlis">Perlis</option>
															<option value="Sabah">Sabah</option>
															<option value="Sarawak">Sarawak</option>
															<option value="Selangor">Selangor</option>
															<option value="Terengganu">Terengganu</option>
														</select>
													</div>
												</div>
												<div class="6u 12u$(xsmall)">
													<label for="custAddress">Address</label>
													<textarea name="custAddress" id="custAddress" rows="6"></textarea>
												</div>
												<div class="6u 12u$(xsmall)">
													<label for="custCity">City</label>
													<input type="text" name="custCity" id="custCity" value="" />
												</div>
												<div class="6u 12u$(xsmall)">
													<label for="custPostcode">Postcode</label>
													<input type="text" name="custPostcode" id="custPostcode" value="" />
												</div>
												<br><br>

												<div class="12u$" align="center">
														<ul class="actions" >
															<li><input type="reset" value="Reset" /></li>
															<li><input type="submit" value="Register" class="special" id="registerMember" name="registerMember" /></li>
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
			<script src="assets/js/modal.js"></script>
			<script src="assets/js/formvalidation.js"></script>

	</body>
</html>