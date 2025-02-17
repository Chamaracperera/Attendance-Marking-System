<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['lecturer_id'])) {
    die(json_encode(['error' => 'Not logged in']));
}

// Include the database connection
include '../db.php';

// Fetch notifications for the lecturer
$lecturer_id = intval($_SESSION['lecturer_id']); // Sanitize input
$sql = "SELECT id, message, timestamp FROM notifications WHERE lecturer_id = ? AND status = 'unread' ORDER BY timestamp DESC LIMIT 10";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    die(json_encode(['error' => 'Database error']));
}

$stmt->bind_param("i", $lecturer_id);
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