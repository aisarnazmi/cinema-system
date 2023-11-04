<!DOCTYPE HTML>
<html>
	<head>
		<title></title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
		
	</head>
	<body>
		
		<?php
			include("connection.php");
			session_start();
		
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
								<li><a href="#">Manage Movies</a></li>
								<hr>
								<li><a href="logoutEngine.php">Sign out</a></li>
							</ul>
							<a href="#" class="close">Close</a>
						</div>
					</nav>

				<!-- Wrapper -->
				
				<?php

					$sql = "SELECT * FROM movies";
					$query = mysqli_query($connect, $sql);


					$numRows = mysqli_num_rows($query);
				
				?>
				
					<section id="wrapper">

						<!-- Content -->
							<div class="wrapper">
								<div class="inner" id="form">
									<h2 class="major">Manage Movies Section</h2>
									<section>
										<div class="table-wrapper">
											<table class="alt">
												<thead>
													<tr>
														<th>#</th>
														<th>Movie Title</th>
														<th>Release Date</th>
														<th align="center" width="30%">Action</th>
													</tr>
												</thead>
		
												<tbody>
												<?php
													$count = 1;
													
													for($i = 0; $i < $numRows; $i++)
													{
														$data = mysqli_fetch_array($query);
												?>
													<tr>
														<td align="center" width="5%"><?php echo $count++; ?></td>
														<td><?php echo $data["mTitle"]; ?></td>
														<td align="center" width="15%"><?php echo $data["mReleaseDate"]; ?></td>
														<td align="center">
															<ul class="actions small">
																<li><a href="editMovie.php?mID=<?php echo $data["mID"]; ?>" class="button special small">Edit</a></li>
																<li><a href="deleteMovieEngine.php?mID=<?php echo $data["mID"]; ?>" class="button small" onClick="return confirm('Are you sure you want to delete this movie?')">Delete</a></li>
															</ul>
														</td>
													</tr>
												<?php
													}
												?>
													
												</tbody>
												<tfoot>
													<tr>
														<th>#</th>
														<th>Movie Title</th>
														<th>Release Date</th>
														<th>Action</th>
													</tr>
												</tfoot>
											</table>
										</div>
										
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
			<script src="assets/js/formvalidation.js"></script>
			
				<?php
				
			}
			else{
				
				header("Location: index.php");
				
			}
		?>
	</body>
</html>