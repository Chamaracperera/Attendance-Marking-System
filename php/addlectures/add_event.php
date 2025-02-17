<?php 
session_start();

if (!isset($_SESSION['user_name'])) {
    header('Location:../../index.html?error=notloggedin');
    exit();
}

$lecturer_id = $_SESSION['lecturer_id'];

include '../db.php';

function getStudentTables($conn) {
    $tables = [];
    $result = mysqli_query($conn, "SHOW TABLES");
    
    while ($row = mysqli_fetch_array($result)) {
        if (preg_match('/^\d{4}_\d{2}$/', $row[0])) {
            $tables[] = $row[0];
        }
    }
    return $tables;
}

$topic = $_POST['topic'];
$event_number = $_POST['event_number'];
$date = $_POST['date'];
$time = $_POST['time'];
$venue = $_POST['venue'];
$audience = $_POST['audience'];
$file_name = null;

if (!preg_match('/^\d{5}$/', $event_number)) {
    echo "<script>alert('Event number must be exactly 5 digits. Please try again.'); window.location.href='index.php';</script>";
    exit();
}

$checkQuery = "SELECT * FROM events WHERE Event_Number = '$event_number'";
$result = mysqli_query($conn, $checkQuery);
if (mysqli_num_rows($result) > 0) {
    echo "<script>alert('Event number already exists. Please re-enter.'); window.location.href='index.php';</script>";
    exit();
}

if (isset($_FILES['document']) && $_FILES['document']['error'] == 0) {
    $file_type = mime_content_type($_FILES['document']['tmp_name']);
    if ($file_type == 'image/jpeg' ) {
        $unique_name = uniqid() . '.jpg';
        $file_name = 'uploads/' . $unique_name;
        move_uploaded_file($_FILES['document']['tmp_name'], $file_name);
    } else {
        echo "<script>alert('Only JPG files are allowed.'); window.location.href='index.php';</script>";
        exit();
    }
}

$query = "INSERT INTO events (topic, Event_Number, date, time, venue, audience, document) VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($query);
$stmt->bind_param("sssssss", $topic, $event_number, $date, $time, $venue, $audience, $file_name);

if ($stmt->execute()) {
    $message = "New Event: $topic on $date at $time in $venue for $audience";

    $studentTables = getStudentTables($conn);
    $subject_id = 11; // Example subject ID

    foreach ($studentTables as $table) {
        $studentQuery = "SELECT student_id FROM `$table`";
        $studentsResult = $conn->query($studentQuery);

        while ($row = $studentsResult->fetch_assoc()) {
            $student_id = $row['student_id'];

            $notifSql = "INSERT INTO notifications (lecturer_id, student_id, subject_id, message, timestamp, status) VALUES (?, ?, ?, ?, NOW(), 'unread')";
            $notifStmt = $conn->prepare($notifSql);
            $notifStmt->bind_param("isis", $lecturer_id, $student_id, $subject_id, $message);
            $notifStmt->execute();
            $notifStmt->close();
        }
    }

    echo "<script>alert('Event added successfully! Notifications sent.'); window.location.href='index.php';</script>";
} else {
    echo "<script>alert('Error adding event. Please try again.'); window.location.href='index.php';</script>";
}

$stmt->close();
$conn->close();
?>
