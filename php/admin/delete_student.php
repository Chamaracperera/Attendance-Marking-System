<?php
require '../php/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_id = $_POST['student_id'];
    $year = $_POST['year']; // Get the batch year

    // Ensure year is provided
    if (empty($year)) {
        echo "Batch year is required.";
        exit;
    }

    // Perform deletion query
    $sql = "DELETE FROM `$year` WHERE student_id = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        echo "Database query error.";
        exit;
    }

    $stmt->bind_param("i", $student_id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Student deleted successfully.";
    } else {
        echo "Failed to delete student.";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request.";
}
?>
