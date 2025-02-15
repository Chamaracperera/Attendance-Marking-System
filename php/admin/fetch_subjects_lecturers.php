<?php
// fetch_subjects_lecturers.php
error_reporting(0); // Disable error reporting
ini_set('display_errors', 0); // Hide errors from the output

include '../db.php'; // Database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $department_id = $_POST['department_id'];

    // Fetch subjects
    $subjects = [];
    $subjectQuery = $conn->query("SELECT subject_id, subject_code FROM subjects");
    if ($subjectQuery) {
        while ($row = $subjectQuery->fetch_assoc()) {
            $subjects[] = $row;
        }
    } else {
        echo json_encode(['error' => 'Failed to fetch subjects']);
        exit;
    }

    // Fetch lecturers
    $lecturers = [];
    $lecturerQuery = $conn->query("SELECT lecturer_id, name FROM lecturer WHERE department_id = $department_id");
    if ($lecturerQuery) {
        while ($row = $lecturerQuery->fetch_assoc()) {
            $lecturers[] = $row;
        }
    } else {
        echo json_encode(['error' => 'Failed to fetch lecturers']);
        exit;
    }

    // Return JSON response
    echo json_encode([
        'subjects' => $subjects,
        'lecturers' => $lecturers
    ]);
    exit;
}