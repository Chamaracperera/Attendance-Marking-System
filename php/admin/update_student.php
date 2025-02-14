<?php
require '../php/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $student_id = $_POST['student_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $year = $_POST['year']; // Ensure batch year is passed

    if (empty($student_id) || empty($name) || empty($email) || empty($year)) {
        echo 'All fields are required.';
        exit;
    }

    $sql = "UPDATE `$year` SET name = ?, email = ? WHERE student_id = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        echo 'Database query error.';
        exit;
    }

    $stmt->bind_param("ssi", $name, $email, $student_id);

    if ($stmt->execute()) {
        echo 'Student details updated successfully.';
    } else {
        echo 'Error updating student details.';
    }

    $stmt->close();
    $conn->close();
} else {
    echo 'Invalid request method.';
}
?>
