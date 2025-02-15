<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['name'])) {
    header('Location:../../index.html?error=notloggedin');
    exit();
 }
 
$username = $_SESSION['name'];

include '../db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Details</title>
    <link rel="shortcut icon" href="../../img/logo.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <nav class="navbar">
        <span class="hamburger-btn material-symbols-rounded">menu</span>
            <a href="index.php" class="logo">
                <img src="../../img/logo.png" alt="logo">
                <h2>Attendance Marking System</h2>
            </a>
            <div class="navbar-right">
                <ul class="links">
                    <div class="profile">
                        <img src="../../img/user.png" class="profile-photo">
                        <span class="username"><?php echo htmlspecialchars($_SESSION['name']); ?></span>
                    </div>
                    <span class="close-btn material-symbols-rounded">close</span>
                    <li><a href="../student/Student_Dashboard.php">Home</a></li>
                </ul>
                <span class="notification-btn material-symbols-rounded">notifications</span>
                <button class="logout-btn" id="logoutBtn">LOGOUT</button>
            </div>
        </nav>
    </header>

    <div class="container110">
        <h2>View Details</h2>
        <div class="options">
            <button onclick="window.location.href='view_lectures.php'" class="btn">View Lectures</button>
            <button onclick="window.location.href='view_events.php'" class="btn">View Events</button>
        </div>
    </div>
    <script>
            document.getElementById("logoutBtn").addEventListener("click", function () {
            alert("You have been logged out!");
            window.location.href = "../logout.php";
            });
    </script>
</body>
</html>
