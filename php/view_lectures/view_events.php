<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['name'])) {
    header('Location:../../index.html?error=notloggedin');
    exit();
 }
 
 $username = $_SESSION['name'];

include '../db.php';

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Details</title>
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
            <a href="view_details.php" class="logo">
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

    <div class="container110">
        <h2>Event Details</h2>
        <table border="1">
            <tr>
                <th>Topic</th>
                <th>Event Number</th>
                <th>Date</th>
                <th>Time</th>
                <th>Venue</th>
                <th>Audience</th>
                <th>Document</th>
            </tr>

            <?php
            $query = "SELECT * FROM events ORDER BY date DESC";
            $result = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>{$row['topic']}</td>
                        <td>{$row['Event_Number']}</td>
                        <td>{$row['date']}</td>
                        <td>{$row['time']}</td>
                        <td>{$row['venue']}</td>
                        <td>{$row['audience']}</td>
                        <td>";
                if ($row['document']) {
                    echo "<a href='../addlectures/{$row['document']}' target='_blank'>View</a>";

                } else {
                    echo "No Document";
                }
                echo "</td></tr>";
            }
            mysqli_close($conn);
            ?>
        </table>
        <button onclick="window.location.href='view_details.php'" class="btn">Back</button>
    </div>
    <script>
            document.getElementById("logoutBtn").addEventListener("click", function () {
            alert("You have been logged out!");
            window.location.href = "../logout.php";
            });
    </script>
</body>
</html>
