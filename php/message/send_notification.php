<?php
include 'db.php'; // Include your database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $student_id = $_POST['student_id'];
    $lecturer_id = $_POST['lecturer_id'];
    $message = $_POST['message'];

    $stmt = $conn->prepare("INSERT INTO notifications (student_id, lecturer_id, message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $student_id, $lecturer_id, $message);
    if ($stmt->execute()) {
        echo "Notification sent!";
    } else {
        echo "Error sending notification.";
    }
}
?>
