<?php
	session_start();

    // Including the connection file
    include("../settings/connection.php");
    include('../functions/function.php');

    // Check if the user is not logged in
    if (!isset($_SESSION['userId'])) {
        // Redirect to login page if the user is not logged in
        header("Location:../view/login.php");
        die;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
	<!-- My CSS -->
	<link rel="stylesheet" href="../css/dashboard.css">

	<title>Dashboard</title>
</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="../view/initiative.php" class="brand">
			<i class="fas fa-solid fa-tree"></i>
			<span class="text">Hidden Leaf</span>
		</a>
		<ul class="side-menu top">
			<li class="active">
				<a href="../view/dashboard.php">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="../view/prifile.php">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">My Profile</span>
				</a>
			</li>
			<li>
				<a href="../view/calculator.php">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Calculator</span>
				</a>
			</li>
			<li>
				<a href="../view/initiative.php">
					<i class='bx bxs-message-dots' ></i>
					<span class="text">Information</span>
				</a>
			</li>
			
		</ul>
		<ul class="side-menu">
			<li>
				<a href="../view/logout.php" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->



	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<a href="#" class="profile">
				<img src="../images/logo.jpg">
				<h4><?php echo htmlspecialchars($_SESSION['fullname']); ?></h4>
			</a>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Dashboard</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Home</a>
						</li>
					</ul>
				</div>
				<a href="initiative.php" class="btn-download">
					<span class="text">Find More</span>
				</a>
			</div>

			<ul class="box-info">
				<li>
					<i class='bx bxs-calendar-check' ></i>
					<span class="text">
						<h3>800</h3>
						<p>Community</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-tree' ></i>
					<span class="text">
						<h3>750</h3>
						<p>Number of Trees</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-dollar-circle' ></i>
					<span class="text">
						<h3> Cedi 30 000</h3>
						<p>Environmental Cost</p>
					</span>
				</li>
			</ul>


			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>User Report</h3>
					</div>
					<table width=100%>
						<thead>
							<tr>
								<th>User</th>
								<th>Roles</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							<tr>
				
							</tr>
							<tr>
				
							</tr>
							<tr>
								
							</tr>
							<tr>
								
							</tr>
							<tr>
								
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="script.js"></script>
</body>
</html>
