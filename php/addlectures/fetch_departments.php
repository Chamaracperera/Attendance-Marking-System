<?php
include '../db.php';

$batchId = $_GET['batch_id'];
$sql = "SELECT department_id, department_name FROM department 
        WHERE department_id IN (SELECT department_id FROM batch_subject WHERE batch_id = ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $batchId);
$stmt->execute();
$result = $stmt->get_result();

$departments = [];
while ($row = $result->fetch_assoc()) {
    $departments[] = $row;
}

echo json_encode($departments);
$stmt->close();
$conn->close();
?>
