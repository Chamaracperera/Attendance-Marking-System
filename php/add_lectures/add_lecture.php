<?php
include '../db.php';

$batch_id = $_POST['batch_id'];
$department_id = $_POST['department_id'];
$subject_id = $_POST['subject_id'];
$title = $_POST['title'];
$instructor = $_POST['instructor'];
$date = $_POST['date'];
$time = $_POST['time'];
$venue = $_POST['venue'];

$query = "INSERT INTO lectures (batch_id, department_id, subject_id, title, instructor, date, time, venue) 
          VALUES ('$batch_id', '$department_id', '$subject_id', '$title', '$instructor', '$date', '$time', '$venue')";

if (mysqli_query($conn, $query)) {
    echo "<script>alert('Lecture added successfully'); window.location.href='index.php';</script>";
} else {
    echo "<script>alert('Error occurred. Try again.'); window.location.href='index.php';</script>";
}

mysqli_close($conn);
?>
