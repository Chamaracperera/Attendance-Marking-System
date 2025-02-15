<?php
include '../db.php';

// Fetch event details from form
$topic = $_POST['topic'];
$event_number = $_POST['event_number'];
$date = $_POST['date'];
$time = $_POST['time'];
$venue = $_POST['venue'];
$audience = $_POST['audience'];
$file_name = null; // Default to null if no document uploaded


// Check if event number is exactly 5 digits
if (!preg_match('/^\d{5}$/', $event_number)) {
    echo "<script>alert('Event number must be exactly 5 digits. Please try again.'); window.location.href='index.php';</script>";
    exit();
}


// Check if the event number already exists
$checkQuery = "SELECT * FROM events WHERE Event_Number = '$event_number'";
$result = mysqli_query($conn, $checkQuery);

if (mysqli_num_rows($result) > 0) {
    echo "<script>alert('Event number already exists, please re-enter.'); window.location.href='index.php';</script>";
    exit();
}

// Check if a file was uploaded
if (isset($_FILES['document']) && $_FILES['document']['error'] == 0) {
    // Get the MIME type of the uploaded file
    $file_type = mime_content_type($_FILES['document']['tmp_name']);
    
    // Allow only JPG files
    if ($file_type == 'image/jpeg') {
        // Generate a unique name for the uploaded file
        $unique_name = uniqid() . '.jpg';
        $file_name = 'uploads/' . $unique_name;
        
        // Move the file to the uploads directory
        if (move_uploaded_file($_FILES['document']['tmp_name'], $file_name)) {
            // Success, file moved
        } else {
            echo "<script>alert('Error uploading file. Please try again.'); window.location.href='index.php';</script>";
            exit();
        }
    } else {
        // If file is not JPG, show alert
        echo "<script>alert('Only JPG files are allowed.'); window.location.href='index.php';</script>";
        exit();
    }
}

// Prepare the query to insert the event data into the database
$query = "INSERT INTO events (topic,Event_Number, date, time, venue, audience, document) 
          VALUES ('$topic','$event_number', '$date', '$time', '$venue', '$audience', '$file_name')";

// Execute the query and handle success or failure
if (mysqli_query($conn, $query)) {
    echo "<script>alert('Event added successfully'); window.location.href='index.php';</script>";
} else {
    echo "<script>alert('Error occurred. Try again.'); window.location.href='index.php';</script>";
}

// Close the database connection
mysqli_close($conn);
?>
