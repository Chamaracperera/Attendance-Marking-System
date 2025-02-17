<?php
session_start(); // Add this line to start the session
if (!isset($_SESSION['name'])) {
    // Redirect to login if session is not set
    header("Location: login.php");
    exit();
}
// Get the notification ID
if (isset($_POST['id'])) {
    $notification_id = intval($_POST['id']); // Sanitize input
    $student_id = $_SESSION['student_id']; // Sanitize input

    // Include the database connection
    include '../db.php';

    // Update the notification status to 'read'
    $sql = "UPDATE notifications SET status = 'read' WHERE id = ? AND student_id = ?";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Database error");
    }

    $stmt->bind_param("is", $notification_id, $student_id);
    $stmt->execute();

    echo "Notification marked as read.";
    $stmt->close();
    $conn->close();
} else {
    die("Invalid request");
}
?>