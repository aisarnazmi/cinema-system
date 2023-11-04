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
							
			$data = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM members where custID = '$_SESSION[custID]' "));

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
								<li><a href="#">Member's Profile</a></li>
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
								<h2>MEMBER'S PROFILE</h2>
								<p>Update your profile here.</p>
							</div>
						</header>

						<!-- Content -->
							<div class="wrapper">
								<div class="inner" id="form">

									<h3 class="major" >Section 1: Login Details</h3>
									<section>
										
										<form method="post" action="updateProfileEngine.php">
											<div class="row uniform">
												<div class="6u 12u$(xsmall)">
													<label for="custName">Full Name</label>
													<input type="text" name="custName" id="custName" value="<?php echo $data["custName"]; ?>" />
												</div>
												<div class="6u 12u$(xsmall)">
													<label for="custEmail">Email</label>
													<input type="text" name="custEmail" id="custEmail" value="<?php echo $data["custEmail"]; ?>" />
												</div>
												<div class="6u 12u$(xsmall)">
													<label for="custNRIC">NRIC</label>
													<input type="text" name="custNRIC" id="custNRIC" value="<?php echo $data["custNRIC"]; ?>" maxlength="12" readonly/>
												</div>
												<div class="6u 12u$(xsmall)">
													<label for="custUsername">Username</label>
													<input type="text" name="custUsername" id="custUsername" value="<?php echo $data["custUsername"]; ?>" readonly maxlength="50" />
												</div>
												<div class="6u 12u$(xsmall)">
													<label for="custPW">Password</label>
													<input type="password" name="custPW" id="custPW" value="<?php echo $data["custPW"]; ?>" maxlength="50" min="6" />
												</div>
												<div class="6u 12u$(xsmall)">
													<label for="custPhoneNum">Phone Number</label>
													<input type="text" name="custPhoneNum" id="custPhoneNum" value="<?php echo $data["custPhoneNum"]; ?>" maxlength="12" />
												</div>
											</div>
										<br><br>
										
									<h3 class="major">Section 2: Member Profile</h3>
											<div class="row uniform">
												<div class="6u 12u$(small)">
												<label for="custGender">Gender</label>
													<input type="radio" id="custGenderMale" name="custGender" value="Male" <?php if($data["custGender"]=="Male") echo "checked";?> >
													<label for="custGenderMale">Male</label>
													&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
													&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
													&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
													<input type="radio" id="custGenderFemale" name="custGender" value="Female" <?php if($data["custGender"]=="Female") echo "checked";?> >
													<label for="custGenderFemale">Female</label>
												</div>
												<div class="4u 12u$(xsmall)">
														<label for="custDOB">Date of Birth</label>
														<input type="date" name="custDOB" id="custDOB" value="<?php echo $data["custDOB"]; ?>" />
												</div>
												<div class="6u 12u$(xsmall)">
													<label for="custRace">Race</label>
													<div class="select-wrapper">
														<select name="custRace" id="custRace">
															<option value="">-Select Race-</option>
															<option value="Malay" <?php if($data["custRace"]=="Malay") echo "selected";?>>Malay</option>
															<option value="Chinese" <?php if($data["custRace"]=="Chinese") echo "selected";?>>Chinese</option>
															<option value="Indian" <?php if($data["custRace"]=="Indian") echo "selected";?>>Indian</option>
															<option value="Others" <?php if($data["custRace"]=="Others") echo "selected";?>>Others</option>
														</select>
													</div>
												</div>
												<div class="6u 12u$(xsmall)">
													<label for="custState">State</label>
													<div class="select-wrapper">
														<select name="custState" id="custState">
															<option value="">-Select State-</option>
															<option value="Johor" <?php if($data["custState"]=="Johor") echo "selected";?>>Johor</option>
															<option value="Kedah" <?php if($data["custState"]=="Kedah") echo "selected";?>>Kedah</option>
															<option value="Kelantan" <?php if($data["custState"]=="Kelantan") echo "selected";?>>Kelantan</option>
															<option value="Kuala Lumpur" <?php if($data["custState"]=="Kuala Lumpur") echo "selected";?>>Kuala Lumpur</option>
															<option value="Melaka" <?php if($data["custState"]=="Melaka") echo "selected";?>>Melaka</option>
															<option value="Negeri Sembilan" <?php if($data["custState"]=="Negeri Sembilan") echo "selected";?>>Negeri Sembilan</option>
															<option value="Pahang" <?php if($data["custState"]=="Pahang") echo "selected";?>>Pahang</option>
															<option value="Penang" <?php if($data["custState"]=="Penang") echo "selected";?>>Penang</option>
															<option value="Perak" <?php if($data["custState"]=="Perak") echo "selected";?>>Perak</option>
															<option value="Perlis" <?php if($data["custState"]=="Perlis") echo "selected";?>>Perlis</option>
															<option value="Sabah" <?php if($data["custState"]=="Sabah") echo "selected";?>>Sabah</option>
															<option value="Sarawak" <?php if($data["custState"]=="Sarawak") echo "selected";?>>Sarawak</option>
															<option value="Selangor" <?php if($data["custState"]=="Selangor") echo "selected";?>>Selangor</option>
															<option value="Terengganu" <?php if($data["custState"]=="Terengganu") echo "selected";?>>Terengganu</option>
														</select>
													</div>
												</div>
												<div class="6u 12u$(xsmall)">
													<label for="custAddress">Address</label>
													<textarea name="custAddress" id="custAddress" rows="6"><?php echo $data["custAddress"];?></textarea>
												</div>
												<div class="6u 12u$(xsmall)">
													<label for="custCity">City</label>
													<input type="text" name="custCity" id="custCity" value="<?php echo $data["custCity"];?>" />
												</div>
												<div class="6u 12u$(xsmall)">
													<label for="custPostcode">Postcode</label>
													<input type="text" name="custPostcode" id="custPostcode" value="<?php echo $data["custPostcode"];?>" />
												</div>
												<br>
												<div class="12u$" align="center">
													<hr>
													<ul class="actions" >
														<li><input type="submit" value="Update" class="special" id="updateMember" name="updateMember" /></li>
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
			
			<?php
				
			}
			else{
				
				header("Location: index.php");
				
			}
	
	?>
			

	</body>
</html>