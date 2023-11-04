<!DOCTYPE html>
<html lang="en" >

<head>
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" href="assets/css/style.css">
	<script type="text/javascript">alert("Please save or print this ticket for payment and validation! Thank you.");</script>

</head>

<body>
	
	<div align="right">
		<button onClick="window.print()">PRINT</button>
	</div>
	<?php
		session_start();
	
		include("connection.php");
	
		$data1 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM reservation ORDER BY p_receiptID desc"));
		
		$data2 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM members WHERE custID = '$_SESSION[custID]' "));
	
		$sql3 = mysqli_query($connect, "SELECT * FROM seat WHERE p_receiptID = '$data1[p_receiptID]' ");
	
		$numRows = mysqli_num_rows($sql3);
		
		$rID = sprintf('%05d', $data1["p_receiptID"]);
	?>
  
	  <div class="login-form">
		 <div id="main">
			<div class="ticket-main">
				<div class="ticket-top">
			
				</div>

					<div class="ticket-middle">
						<div class="middle-row middle-1">
							<span class="ticket-label middle-type">Name</span>
							<span class="ticket-label middle-type">Movie Title</span>
						</div>
							<div class="middle-row middle-1-1">
							<span class="ticket-detail middle-type"><?php echo $data2["custName"]; ?></span>
							<span class="ticket-detail middle-type"><?php echo $data1["p_mTitle"]; ?></span>
							<span class="ticket-detail-large middle-class"><?php echo "ref id :<br> # ".$rID; ?></span>
						</div>
						<div class="middle-row middle-3">
							<span class="ticket-label middle-from">Date</span>
							<span class="ticket-label middle-valid">Showtime</span>
							<span class="ticket-label middle-price">Ticket Quantity</span>
						</div>
						<div class="middle-row middle-3-3">
							<span class="ticket-detail middle-from"><?php echo $data1["p_Date"]; ?></span>
							<span class="ticket-detail middle-valid"><?php echo $data1["p_mShowtime"]; ?></span>
							<span class="ticket-detail middle-price"><?php echo $data1["p_mNumTicket"]; ?></span>
						</div>
						<div class="middle-row middle-2">
							<span class="ticket-label middle-startdate">Valid-Until</span>
							<span class="ticket-label middle-number">Seat Number</span>
						</div>
						<div class="middle-row middle-2-2">
							
							<span class="ticket-detail middle-startdate"><?php echo $data1["p_Date"]; ?></span>
							<span class="ticket-detail middle-longnumber"><?php for($i = 0; $i < $numRows; $i++){
																			$seat = mysqli_fetch_array($sql3); 
																				echo $seat["p_Seat"];
																					echo ", ";} ?></span>
							
						</div>
						<div class="middle-row middle-4">
							<span class="ticket-label middle-validity">Validity</span>
						</div>
						<div class="middle-row middle-4-4">
							<span class="ticket-detail-small middle-validity">On Date Shown</span>
						</div>
					</div>

					<div class="ticket-bottom">
						<div class="ticket-logo-2-container">
							<div class="ticket-logo"></div>
						</div>
						<div class="ticket-printed">
							<span class="ticket-label">Generated <?php echo date("h:i") ?> on <?php echo date("d-m-Y") ?></span>
						</div>
					</div>
				</div>
			</div>
	   </div>

		<script  src="js/index.js"></script>
	</body>
</html>
