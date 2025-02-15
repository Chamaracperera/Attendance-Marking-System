<?php
include '../db.php';

$batchId = $_GET['batch_id'];
$departmentId = $_GET['department_id'];

$sql = "SELECT s.subject_id, s.subject_name FROM subjects s
        JOIN batch_subject bs ON s.subject_id = bs.subject_id
        WHERE bs.batch_id = ? AND bs.department_id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $batchId, $departmentId);
$stmt->execute();
$result = $stmt->get_result();

$subjects = [];
while ($row = $result->fetch_assoc()) {
    $subjects[] = $row;
}

echo json_encode($subjects);
$stmt->close();
$conn->close();
?>
