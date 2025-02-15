<?php
// Database connection
include '../db.php';

$sql = "SELECT batch_id, year FROM batch";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<option value='" . $row["batch_id"] . "'>" . $row["year"] . "</option>";
    }
}
$conn->close();
?>
