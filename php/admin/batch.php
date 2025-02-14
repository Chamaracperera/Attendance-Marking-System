<?php 
require '../php/db.php'; // Database connection

// Handle AJAX request for adding a new batch year
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['year'])) {
    $year = $_POST['year'];
    $batch_table_name = str_replace('-', '_', $year);

    // Insert batch into the main batch table
    $stmt = $db->prepare("INSERT INTO batch (year) VALUES (?)");
    if ($stmt) {
        $stmt->bind_param("s", $year);
        if ($stmt->execute()) {
            // Success response
            echo json_encode(["status" => "success", "message" => "Batch for $year added successfully!"]);
        } else {
            // Error response if insertion fails
            echo json_encode(["status" => "error", "message" => "Error inserting batch: " . $stmt->error]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => "Preparation failed: " . $db->error]);
    }
    exit; // Stop further execution for AJAX response
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR-Based Attendance Marking System - User Management</title>
    <link rel="shortcut icon" href="../img/logo.png">
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
                <li><a href="#">Home</a></li>
                <li><a href="../crud/user.php" id="manageUserBtn">Manage User</a></li>
                <li><a href="../crud/batch.php">Manage Batch Details</a></li>
                <li><a href="#">Manage Course Details</a></li>
                <li><a href="#">Manage Location</a></li>
            </ul>
            <div class="navbar-right">
                <span class="notification-btn material-symbols-rounded">notifications</span>
                <button class="logout-btn" id="logoutBtn">LOGOUT</button>
            </div>
        </div>
    </nav>
</header>

<div class="container">
    <h2>Add New Batch</h2>
    <form id="batchForm">
        <label for="year">Batch Year (e.g., 2024-25):</label>
        <input type="text" id="year" name="year" required>
        <button type="button" id="addBatchBtn" class="add-btn">Add Batch</button>
    </form>
    <div id="feedbackMessage"></div>
</div>

<script src="../crud/batch.js"></script>
<script src="../../js/script_2.js"></script>
<script src="../crud/user.js"></script>

</body>
</html>
