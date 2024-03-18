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
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="stylesheet" href="../css/profile.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;600&display=swap" rel="stylesheet">
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
            <a href="../view/profile.php"> <!-- Note: Corrected the file name from prifile.php to profile.php -->
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
            <a href="#">
                <i class='bx bxs-message-dots' ></i>
                <span class="text">Information</span>
            </a>
        </li>
        
    </ul>
    <ul class="side-menu">
        <li>
            <a href="#">
                <i class='bx bxs-cog' ></i>
                <span class="text">Settings</span>
            </a>
        </li>
        <li>
            <a href="../view/logout.php" class="logout">
                <i class='bx bxs-log-out-circle' ></i>
                <span class="text">Logout</span>
            </a>
        </li>
    </ul>
</section>
<!-- END SIDEBAR -->

<!-- CONTENT -->
<section id="content">
    <!-- END NAVBAR -->

    <!-- MAIN -->
    <main>
        <!-- Profile Section -->
        <div class="profile-page">
            <div class="content">
                <div class="content__cover">
                    <div class="content__avatar"></div>
                    <div class="content__bull"><span></span><span></span><span></span><span></span><span></span>
                    </div>
                </div>

                <div class="content__actions">
                </div>
                <div class="content__title">
                    <h1><?php echo htmlspecialchars($_SESSION['fullname']); ?></h1><span><?php echo htmlspecialchars($_SESSION['tel']); ?></span>
                </div>
                <div class="content__description">
                    <p>Web Producer - Web Specialist</p>
                    <p>Columbia University - New York</p>
                </div>
                <div class="content__button"><a class="button" href="#">
                        <div class="button__border"></div>
                        <div class="button__bg"></div>
                        <p class="button__text"></p></a></div>
            </div>
            <div class="bg">
                <div><span></span><span></span><span></span><span></span><span></span><span></span><span></span>
                </div>
            </div>
        </div>
        <!-- End Profile Section -->
    </main>
    <!-- END MAIN -->
</section>
<!-- END CONTENT -->

<script src="script.js"></script>
</body>
</html>