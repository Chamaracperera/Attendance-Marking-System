<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_name'])) {
    header('Location:../../index.html?error=notloggedin');
    exit();
}

$lecturer_id = $_SESSION['lecturer_id'];

include '../db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $batch_id = $_POST['batch_id'];
    $department_id = $_POST['department_id'];
    $subject_id = $_POST['subject_id'];
    $title = $_POST['title'];
    $instructor = $_POST['instructor'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $venue = $_POST['venue'];
    
    // Insert new lecture
    $sql = "INSERT INTO lectures (batch_id, department_id, subject_id, title, instructor, date, time, venue) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iiisssss", $batch_id, $department_id, $subject_id, $title, $instructor, $date, $time, $venue);
    
    if ($stmt->execute()) {
        // Construct message for notification
        $message = "New Lecture: $title on $date at $time in $venue";

        // Fetch batch year from the batch table
        $batchYearQuery = "SELECT year FROM batch WHERE batch_id = ?";
        $batchYearStmt = $conn->prepare($batchYearQuery);
        $batchYearStmt->bind_param("i", $batch_id);
        $batchYearStmt->execute();
        $batchYearStmt->bind_result($batch_year);
        $batchYearStmt->fetch();
        $batchYearStmt->close();

        // Determine student table based on batch year
        
        if ($batch_year) {
            // Determine student table based on batch year (e.g., '2019_20')
            $student_table = $batch_year;

            // Check if the table exists before querying
            $table_check_query = "SHOW TABLES LIKE '$student_table'";
            $table_result = $conn->query($table_check_query);

            if ($table_result->num_rows > 0) {
                // Fetch students from the determined table
                $studentQuery = "SELECT student_id FROM `$student_table`";
                $studentsResult = $conn->query($studentQuery);

                while ($row = $studentsResult->fetch_assoc()) {
                    $student_id = $row['student_id'];
                    $notifSql = "INSERT INTO notifications (lecturer_id, student_id, subject_id, message, timestamp, status) VALUES (?, ?, ?, ?, NOW(), 'unread')";
                    $notifStmt = $conn->prepare($notifSql);
                    $notifStmt->bind_param("isis",$lecturer_id, $student_id, $subject_id, $message);
                    $notifStmt->execute();
                }
            } else {
                echo "<script>alert('Student table for batch year not found: $student_table');</script>";
            }
        } else {
            echo "<script>alert('Batch year not found for batch ID: $batch_id');</script>";
        }
        echo "<script>alert('Lecture added successfully and notifications sent!'); window.location.href='index.php';</script>";
    } else {
        echo "<script>alert('Error occurred. Try again.'); window.location.href='index.php';</script>";
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
