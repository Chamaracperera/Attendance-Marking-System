<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_name'])) {
   header('Location:../../index.html?error=notloggedin');
   exit();
}

$username = $_SESSION['user_name'];

include 'db.php'; // Include the database connection
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absence Records</title>
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
                            <span class="username"><?php echo htmlspecialchars($_SESSION['user_name']); ?></span>
                        </div>
                        <span class="close-btn material-symbols-rounded">close</span>
                        <li><a href="../lecturer/Lecturer_Dashboard.php">Home</a></li>
                    </ul>
                    <span class="notification-btn material-symbols-rounded">notifications</span>
                    <button class="logout-btn" id="logoutBtn">LOGOUT</button>
                </div>
            </nav>
    </header>
    
        <h2 class="center-heading" style="color: white;"><u>Absence Records</u></h2>

        <div class="table-box">
            <?php
                // Fetch all absence records with batch year and subject name
                $sql = "SELECT 
                        absences.student_id, 
                        absences.date_of_absence, 
                        absences.reason, 
                        absences.proof_file_path, 
                        absences.submission_date, 
                        batch.year, 
                        subjects.subject_name 
                    FROM absences
                    JOIN batch ON absences.batch_id = batch.batch_id
                    JOIN subjects ON absences.subject_id = subjects.subject_id";

                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    echo "<table class='absence-table'>
                            <tr>
                                <th>Batch</th>
                                <th>Student ID</th>
                                <th>Subject</th>
                                <th>Date of Absence</th>
                                <th>Reason</th>
                                <th>Proof Document</th>
                                <th>Submission Date</th>
                            </tr>";

                    while($row = $result->fetch_assoc()) {
                        // Handle missing proof document paths
                        $proofLink = $row['proof_file_path'] ? "<a href='" . htmlspecialchars($row['proof_file_path']) . "' target='_blank'>Download</a>" : "No file";

                        echo "<tr>
                                <td>" . htmlspecialchars($row['year']) . "</td>
                                <td>" . htmlspecialchars($row['student_id']) . "</td>
                                <td>" . htmlspecialchars($row['subject_name']) . "</td>
                                <td>" . htmlspecialchars($row['date_of_absence']) . "</td>
                                <td>" . htmlspecialchars($row['reason']) . "</td>
                                <td>" . $proofLink . "</td>
                                <td>" . htmlspecialchars($row['submission_date']) . "</td>
                            </tr>";
                    }

                    echo "</table>";
                } else {
                    echo "<p>No absence records found.</p>";
                }

                $conn->close();
                ?>
        </div> 
        <script>
            document.getElementById("logoutBtn").addEventListener("click", function () {
            alert("You have been logged out!");
            window.location.href = "../logout.php";
            });
        </script>
</body>
</html>