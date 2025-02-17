<?php
session_start(); // Add this line to start the session
if (!isset($_SESSION['name'])) {
    // Redirect to login if session is not set
    header("Location: login.php");
    exit();
}

// Include the database connection
include '../db.php';

// Fetch notifications for the student
$student_id = $_SESSION['student_id']; // Sanitize input

$sql = "SELECT id, message, timestamp FROM notifications WHERE student_id = ? AND status = 'unread' ORDER BY timestamp DESC LIMIT 10";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    die(json_encode(['error' => 'Database error']));
}

$stmt->bind_param("s", $student_id);
$stmt->execute();
$result = $stmt->get_result();

$notifications = [];
while ($row = $result->fetch_assoc()) {
    $notifications[] = $row;
}

echo json_encode($notifications);
$stmt->close();
$conn->close();
?>