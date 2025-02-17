<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header('Location:../../index.html?error=notloggedin');
    exit();
}

require '../db.php';

if (isset($_POST['lecturer_id'])) {
    $lecturer_id = $_POST['lecturer_id'];

    // Prepare statement to delete the lecturer from the database
    $stmt = $conn->prepare("DELETE FROM lecturer WHERE lecturer_id = ?");
    $stmt->bind_param("i", $lecturer_id);

    if ($stmt->execute()) {
        echo "Lecturer deleted successfully";
    } else {
        echo "Error deleting lecturer";
    }

    $stmt->close();
    $conn->close();
}
?>
