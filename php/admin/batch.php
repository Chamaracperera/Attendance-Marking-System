<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location:../../index.html?error=notloggedin');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Batch Management</title>
    <link rel="shortcut icon" href="../../img/logo.png">
    <link rel="stylesheet" href="user.css">
</head>

<body>
    <header>
        <nav class="navbar">
            <span class="hamburger-btn material-symbols-rounded">menu</span>
            <a href="#" class="logo">
                <img src="../../img/logo.png" alt="logo">
                <h2>Attendance Marking System</h2>
            </a>
            <div class="navbar-right">
                <ul class="links">
                    <span class="close-btn material-symbols-rounded">close</span>
                    <li><a href="Admin_Dashboard.php">Home</a></li>
                </ul>
                <div class="navbar-right">
                    <button class="logout-btn" id="logoutBtn">LOGOUT</button>
                </div>
            </div>
        </nav>
    </header>

    <div class="container">
        <h2>Add New Batch</h2>
        <form id="batchForm">
            <label for="year">Batch Year (e.g., 2024_25):</label>
            <input type="text" id="year" name="year" required pattern="\d{4}_\d{2}" title="Format: 2024_25">
            <button type="button" id="addBatchBtn" class="add-btn">Add Batch</button>
        </form>
        <div id="feedbackMessage"></div>
    </div>

    <script src="../../js/script_2.js"></script>
    <script src="user.js"></script>
    <script src="batch.js"></script>
</body>

</html>
