<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['name'])) {
   header('Location:../../index.html?error=notloggedin');
   exit();
}

$studentID = $_SESSION['student_id'];
$username = $_SESSION['name'];
$batchID = $_SESSION['batch_id'];
$departmentID = $_SESSION['department_id'];

// Include the database connection
include '../db.php';

// Initialize a flag for successful submission
$success = false;
$error = ""; // To store error messages

// Assuming batchID and departmentID are stored in the session


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // If you need these values, sanitize them:
    $dateOfAbsence = isset($_POST['dateOfAbsence']) ? htmlspecialchars(trim($_POST['dateOfAbsence'])) : '';
    $reason        = isset($_POST['reason']) ? htmlspecialchars(trim($_POST['reason'])) : '';
    $subject       = isset($_POST['subject']) ? $_POST['subject'] : '';

    // Handle PHP-level upload errors
    if (isset($_FILES['proofFile'])) {
        switch ($_FILES['proofFile']['error']) {
            case UPLOAD_ERR_OK:
                // No error at PHP level, proceed with your own checks
                break;
            case UPLOAD_ERR_INI_SIZE:
            case UPLOAD_ERR_FORM_SIZE:
                // The file exceeded the server limit (php.ini or <input> MAX_FILE_SIZE)
                $error .= "Sorry, your file exceeds the 5MB limit.<br>";
                break;
            case UPLOAD_ERR_NO_FILE:
                $error .= "No file was uploaded.<br>";
                break;
            default:
                $error .= "An unexpected error occurred while uploading.<br>";
        }
    } else {
        $error .= "Sorry, your file exceeds the 5MB limit.<br>";
    }

    // If there's still no error at this point, do a custom 2MB check    
    if (empty($error)) {
        $customLimitBytes = 5 * 1024 * 1024; // 2MB
        if ($_FILES['proofFile']['size'] > $customLimitBytes) {
            $error .= "Sorry, your file exceeds the 5MB limit.<br>";
        }
    }

    // If no errors so far, check file extension
    if (empty($error)) {
        $allowedTypes = ['pdf','doc','docx'];
        $fileType     = strtolower(pathinfo($_FILES['proofFile']['name'], PATHINFO_EXTENSION));
        if (!in_array($fileType, $allowedTypes)) {
            $error .= "Only PDF, DOC, and DOCX files are allowed.<br>";
        }
    }

    if (empty($error)) {
    $conn->begin_transaction(); // Start transaction

    // Ensure your uploads folder exists
    $uploadDir = 'uploads/';
    $uniqueFilename = $uploadDir . uniqid() . "." . $fileType;
    $fileHash = hash_file('sha256', $_FILES['proofFile']['tmp_name']);

    // Check if file hash already exists
    $stmt = $conn->prepare("SELECT * FROM absences WHERE proof_file_hash = ?");
    $stmt->bind_param("s", $fileHash);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $error = "This document has already been submitted.";
    } else {
        if (move_uploaded_file($_FILES['proofFile']['tmp_name'], $uniqueFilename)) {
            $stmt = $conn->prepare("INSERT INTO absences (subject_id, student_id, batch_id, date_of_absence, reason, proof_file_path, proof_file_hash)
                                    VALUES (?,?,?,?,?,?,?)");
            $stmt->bind_param("isissss", $subject, $studentID, $batchID, $dateOfAbsence, $reason, $uniqueFilename, $fileHash);

            if ($stmt->execute()) {
                // Fetch lecturer ID
                $lecturerStmt = $conn->prepare("SELECT lecturer_id FROM batch_subject WHERE batch_id=? AND Subject_id=? AND department_id=?");
                $lecturerStmt->bind_param("iii", $batchID, $subject, $departmentID);
                $lecturerStmt->execute();
                $lecturerResult = $lecturerStmt->get_result();

                if ($lecturerRow = $lecturerResult->fetch_assoc()) {
                    $lecturerID = $lecturerRow['lecturer_id'];

                    // Fetch subject name
                    $sqlquery = "SELECT subject_name FROM subjects WHERE subject_id = ?";
                    $subjectStmt = $conn->prepare($sqlquery);
                    $subjectStmt->bind_param("i", $subject);
                    $subjectStmt->execute();
                    $subjectResult = $subjectStmt->get_result();

                    if ($subjectRow = $subjectResult->fetch_assoc()) {
                        $subjectName = $subjectRow['subject_name'];

                        // Insert notification
                        $notificationMessage = "Student $studentID submitted an absence for Subject $subjectName on $dateOfAbsence.";
                        $notifStmt = $conn->prepare("INSERT INTO notifications (lecturer_id, subject_id, student_id, message, timestamp, status)
                                                     VALUES (?,?,?,?,NOW(),'unread')");
                        $notifStmt->bind_param("iiss", $lecturerID, $subject, $studentID, $notificationMessage);

                        if ($notifStmt->execute()) {
                            $conn->commit(); // Everything successful, commit changes
                            $success = true;
                        } else {
                            $error = "Error inserting notification: " . $notifStmt->error;
                            $conn->rollback(); // Undo all changes
                        }
                        $notifStmt->close();
                    } else {
                        $error = "Error fetching subject name: " . $conn->error;
                        $conn->rollback();
                    }
                } else {
                    $error = "Lecturer not found for the given batch and subject.";
                    $conn->rollback();
                }
            } else {
                $error = "Error submitting absence request: " . $conn->error;
                $conn->rollback();
            }
            $stmt->close();
        } else {
            $error = "Sorry, there was an error uploading your file.";
            $conn->rollback();
        }
    }
    $conn->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="shortcut icon" href="../../img/logo.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <nav class="navbar">
            <span class="hamburger-btn material-symbols-rounded">menu</span>
            <a href="#" class="logo">
                <img src="../../img/logo.png" alt="logo">
                <h2>Attendance Marking System</h2>
            </a>
            
            <div class="navbar-right">
                <ul class="links">
                <div class="profile">
                        <img src="../../img/user.png" class="profile-photo">
                        <span class="username"><?php echo htmlspecialchars($_SESSION['name']); ?></span>
                        <div class="popup-info">
                            <p>Student ID: <?php echo htmlspecialchars($_SESSION['student_id']); ?></p>
                            <p>Email: <?php echo htmlspecialchars($_SESSION['email']); ?></p>
                            <p>Batch: <?php echo htmlspecialchars($_SESSION['year']); ?></p>                        
                            <p>Department: <?php echo htmlspecialchars($_SESSION['department_name']); ?></p>
                        </div>
                    </div>
                    <span class="close-btn material-symbols-rounded">close</span>
                    <li><a href="../student/Student_Dashboard.php">Home</a></li>
                </ul>
                <button class="logout-btn" id="logoutBtn">LOGOUT</button>
            </div>
        </nav>
    </header>

    <div class="container1">
        <?php if ($success): ?>
            <h2>The file <?php echo htmlspecialchars(basename($_FILES['proofFile']['name'])); ?> has been uploaded.</h2>
            <p>Absence request submitted successfully!</p>
            <button type="btn" onclick="goHome()">Back to Home</button>

        <?php elseif (!empty($error)): ?>
            <h2>Error submitting absence request</h2>
            <p><?php echo $error; ?></p>
            <button type="btn" onclick="goHome()">Back to Home</button>

        <?php else: ?>
            <!-- Subject Selection Form -->
            <form id="subjectForm">
                <h1>Select the subject you were absent</h1>
                <div class="form-group">
                    <label for="subject" class="form-label">Subject:</label>
                    <select id="subject" name="subject" required>
                        <option value="" disabled selected>Select from here</option>
                        <?php
                        // Fetch subjects from database
                        $subjectQuery = "SELECT * FROM subjects";
                        $subjectResult = $conn->query($subjectQuery);
                        while ($subject = $subjectResult->fetch_assoc()) {
                            echo "<option value='" . $subject['subject_id'] . "'>" . $subject['subject_name'] . "</option>";
                        }
                        ?>
                    </select>
                </div>

                <button type="submit" >Next</button>
            </form>

            <!-- Absence Form (initially hidden) -->
            <div id="absenceForm" style="display:none;">
                <h1>Submit Absence Request</h1>
                <form id="attendanceForm" action="" method="post" enctype="multipart/form-data">
                    <!-- Subject field will be auto-filled from Step 1 -->
                    <div class="form-group">
                        <label>Subject ID:</label>
                        <input type="text" name="subject" id="subjectDisplay" readonly>
                    </div>

                    <div class="form-group">
                        <label for="dateOfAbsence">Date of Absence:</label>
                        <input type="date" id="dateOfAbsence" name="dateOfAbsence" required>
                    </div>

                    <div class="form-group">
                        <label for="reason">Reason for Absence:</label>
                        <textarea id="reason" name="reason" rows="4" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="proofFile">Upload Proof Document (pdf/doc/docx): </label>
                        <input type="file" id="proofFile" name="proofFile" required>
                    </div>

                    <button type="submit">Submit</button>
                </form>
            </div>
        <?php endif; ?>
    </div>

    <script src="scripts.js"></script>
    <script src="../../js/script_2.js"></script>
    <script>
    document.getElementById("logoutBtn").addEventListener("click", function () {
      alert("You have been logged out!");
      window.location.href = "../logout.php";
    });

    // Handle form transitions
    const subjectForm = document.getElementById('subjectForm');
    const absenceForm = document.getElementById('absenceForm');
    const subjectDisplay = document.getElementById('subjectDisplay');

    subjectForm.addEventListener('submit', function (e) {
        e.preventDefault();
        const selectedSubject = document.getElementById('subject').value;
        subjectDisplay.value = selectedSubject;
        subjectForm.style.display = 'none';
        absenceForm.style.display = 'block';
    });

    function goHome() {
    window.location.href = "../student/Student_Dashboard.php";
    }
    </script>
    
</body>
</html>
