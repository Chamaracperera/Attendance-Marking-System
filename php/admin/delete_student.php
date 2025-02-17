<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location:../../index.html?error=notloggedin');
    exit();
}

require '../db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_id = $_POST['student_id'];
    $year = $_POST['year'];

    $allowed_batches = ['2019_20', '2020_21', '2021_22', '2022_23'];
    if (!in_array($year, $allowed_batches)) {
        echo "Invalid batch year.";
        exit();
    }


    $sql = "DELETE FROM `$year` WHERE student_id = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        echo "Database query error.";
        exit();
    }

    $stmt->bind_param("s", $student_id);
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
