<?php
session_start();


if (!isset($_SESSION['name'])) {
    header('Location:../../index.html?error=notloggedin');
    exit();
}

include '../db.php';

// Assuming student details are in session
$student_id = $_SESSION['student_id'];
$student_name = $_SESSION['name'];
$batch_id = $_SESSION['batch_id'];
$department_id = $_SESSION['department_id'];

// Get the QR data (sent from student dashboard after scanning)
$data = json_decode(file_get_contents('php://input'), true);

if (!isset($data['subject_id']) || !isset($data['session_id'])) {
    echo json_encode(['status' => 'error', 'message' => 'Invalid QR Data']);
    exit();
}

// Extract data from the QR code
$subject_id = $data['subject_id'];
$session_id = $data['session_id'];

// Fetch table name and subject code from subjects table
$query = "SELECT table_name, subject_code FROM subjects WHERE subject_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $subject_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo json_encode(['status' => 'error', 'message' => 'Subject not found']);
    exit();
}

$row = $result->fetch_assoc();
$table_name = $row['table_name'];
$subject_code = $row['subject_code'];

$stmt->close();

// Check for duplicate attendance (Optional but recommended)
$date = date("Y-m-d");
$checkQuery = "SELECT * FROM $table_name WHERE student_id = ? AND scanned_Date = ? AND Subject_id = ?";
$checkStmt = $conn->prepare($checkQuery);
$checkStmt->bind_param("ssi", $student_id, $date, $subject_id);
$checkStmt->execute();
$checkResult = $checkStmt->get_result();

if ($checkResult->num_rows > 0) {
    echo json_encode(['status' => 'error', 'message' => 'Attendance already marked for today']);
    exit();
}

$checkStmt->close();


// Insert attendance record
$time = date("H:i:s");

$insertQuery = "INSERT INTO $table_name (scanned_Date, scanned_Time, Subject_id, Subject_Code, student_id, batch_id, department_id,)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
$insertStmt = $conn->prepare($insertQuery);
$insertStmt->bind_param("ssissii", $date, $time, $subject_id, $subject_code, $student_id, $batch_id, $department_id,);

if ($insertStmt->execute()) {
    echo json_encode(['status' => 'success', 'message' => 'Attendance marked successfully']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Database error: ' . $insertStmt->error]);
}

$insertStmt->close();
$conn->close();
?>

