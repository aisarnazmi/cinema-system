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
										
										<form method="post" action="seatReserve.php">
											<div class="row uniform">
											
											<?php
												
												if(isset($_GET["mID"])){
													
												
													$sql = mysqli_query($connect, "SELECT * FROM movies WHERE mID = '$_GET[mID]' ");
													
													$row = mysqli_fetch_array($sql);
												
											?>
													<div class="6u 12u$(xsmall)">
															<label for="mTitle">Select Movie</label>
															<div class="select-wrapper">

																<select name="p_mTitle" id="p_mTitle" onChange="window.location='purchase.php?mID='+this.value+'#form'">
																<?php
													
																	$result = mysqli_query($connect, "SELECT * FROM movies ORDER BY mID desc") or die("Failed to Read Data From Database");

																	for ($i = 0; $i < 10; $i++)
																	{
																		$rows = mysqli_fetch_array($result);
																?>
																		<option value="<?php echo $rows["mID"]?>" <?php if($rows["mID"] == $row["mID"]){echo 'selected';}?>>
																		<?php echo $rows["mTitle"];?>
																		</option>
																<?php
																	}
																?>
																</select>
															</div>
														</div>
														<div class="4u 12u$(xsmall)">
																<label for="p_Date">Select Date</label>
																<input type="date" name="p_Date" id="p_Date" value="" />
														</div>
														<div class="12u$">
															<label for="p_mShowtime">Select Showtime</label>
														</div>
														<div class="4u 12u$(xsmall)">
															&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
															&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
															<input type="radio" id="p_mShowtime1" name="p_mShowtime" value="<?php echo $row["mShowtime1"] ?>">
															<label for="p_mShowtime1"><?php echo $row["mShowtime1"] ?></label>
														</div>
														<div class="4u 12u$(xsmall)">
															&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
															<input type="radio" id="p_mShowtime2" name="p_mShowtime" value="<?php echo $row["mShowtime2"] ?>">
															<label for="p_mShowtime2"><?php echo $row["mShowtime2"] ?></label>
														</div>
														<div class="4u 12u$(xsmall)">
															<input type="radio" id="p_mShowtime3" name="p_mShowtime" value="<?php echo $row["mShowtime3"] ?>">
															<label for="p_mShowtime3"><?php echo $row["mShowtime3"] ?></label>
														</div>
														<div class="4u 12u$(xsmall)">
														<br>
															<label for="p_mNumTicket">Ticket Quantity</label>
															<input type="number" name="p_mNumTicket" id="p_mNumTicket" min="1" max="66" value=""/>
														</div>
											<?php
													
											}
											else{
												
											?>
												<div class="6u 12u$(xsmall)">
													<label for="mTitle">Select Movie</label>
													<div class="select-wrapper">
													
														<select name="p_mTitle" id="p_mTitle" onChange="window.location.href='purchase.php?mID='+this.value+'#form'">
														<?php

															$result = mysqli_query($connect, "SELECT * FROM movies ORDER BY mID desc") or die("Failed to Read Data From Database");
															
															
															echo '<option value="">-Select a Movie-</option>';

															for ($i = 0; $i < 9; $i++)
															{
																$rows = mysqli_fetch_array($result);

																echo '<option value="'.$rows["mID"].'">';
																echo $rows["mTitle"];
																echo '</option>';
															}
														?>
														</select>
													</div>
												</div>
												<div class="4u 12u$(xsmall)">
														<label for="p_Date">Select Date</label>
														<input type="date" name="p_Date" id="p_Date" value="" />
												</div>
												<div class="12u$">
													<label for="p_mShowtime">Select Showtime</label>
												</div>
												<div class="4u 12u$(xsmall)">
													&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
													&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
													<input type="radio" id="p_mShowtime1" name="p_mShowtime" value="">
													<label for="p_mShowtime1"></label>
												</div>
												<div class="4u 12u$(xsmall)">
													&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
													<input type="radio" id="p_mShowtime2" name="p_mShowtime" value="">
													<label for="p_mShowtime2"></label>
												</div>
												<div class="4u 12u$(xsmall)">
													<input type="radio" id="p_mShowtime3" name="p_mShowtime" value="">
													<label for="p_mShowtime3"></label>
												</div>
												<div class="4u 12u$(xsmall)">
												<br>
													<label for="p_mNumTicket">Ticket Quantity</label>
													<input type="number" name="p_mNumTicket" id="p_mNumTicket" min="1" value=""/>
												</div>
										<?php
											
											}
											
										?>
											</div>
											<br><hr>
											<div class="12u$" align="center">
														<ul class="actions" >
															<li><input type="reset" value="Reset" /></li>
															<li><input type="submit" value="Next" class="special" id="purchaseTicket" name="purchaseTicket" /></li>
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
				
			}
			else{
				
				header("Location: index.php");
				
			}
	
	?>

	</body>
</html>