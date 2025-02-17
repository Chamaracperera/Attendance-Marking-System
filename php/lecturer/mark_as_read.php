<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['lecturer_id'])) {
    die("Not logged in");
}

// Get the notification ID
if (isset($_POST['id'])) {
    $notification_id = intval($_POST['id']); // Sanitize input
    $lecturer_id = intval($_SESSION['lecturer_id']); // Sanitize input

    // Include the database connection
    include '../db.php';

    // Update the notification status to 'read'
    $sql = "UPDATE notifications SET status = 'read' WHERE id = ? AND lecturer_id = ?";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Database error");
    }

    $stmt->bind_param("ii", $notification_id, $lecturer_id);
    $stmt->execute();

    echo "Notification marked as read.";
    $stmt->close();
    $conn->close();
} else {
    die("Invalid request");
}
?>