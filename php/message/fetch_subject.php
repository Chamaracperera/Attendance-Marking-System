<?php
// Database connection
include 'db.php';

$sql = "SELECT subject_id, subject_name FROM subjects";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<option value='" . $row["subject_name"] . "'>" . $row["subject_name"] . "</option>";
    }
}
$conn->close();
?>
