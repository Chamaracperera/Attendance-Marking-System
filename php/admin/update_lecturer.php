<?php
require '../php/db.php';

if (isset($_POST['lecturer_id']) && isset($_POST['name']) && isset($_POST['email'])) {
    $lecturer_id = $_POST['lecturer_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];

    // Prepare an update query
    $stmt = $conn->prepare("UPDATE lecturer SET name = ?, email = ? WHERE lecturer_id = ?");
    $stmt->bind_param("ssi", $name, $email, $lecturer_id);

    if ($stmt->execute()) {
        echo "Lecturer updated successfully";
    } else {
        echo "Error updating lecturer";
    }

    $stmt->close();
    $conn->close();
}
?>
