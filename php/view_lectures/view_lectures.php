<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_name'])) {
    header('Location:../../index.html?error=notloggedin');
    exit();
 }
 
 $username = $_SESSION['user_name'];

include '../db.php';
$sql = "SELECT 
            b.year AS batch_name, 
            d.department_name, 
            s.subject_name, 
            l.title, 
            l.instructor, 
            l.date, 
            l.time, 
            l.venue 
        FROM lectures l
        JOIN batch b ON l.batch_id = b.batch_id
        JOIN department d ON l.department_id = d.department_id
        JOIN subjects s ON l.subject_id = s.subject_id
        ORDER BY l.date DESC";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lecture Details</title>
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
                            <span class="username"><?php echo htmlspecialchars($_SESSION['user_name']); ?></span>
                        </div>
                        <span class="close-btn material-symbols-rounded">close</span>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Help</a></li>
                    </ul>
                    <span class="notification-btn material-symbols-rounded">notifications</span>
                    <button class="logout-btn" id="logoutBtn">LOGOUT</button>
                </div>
        </nav>
    </header>

    <div class="container110">
        <h2>Lecture Details</h2>
        <table border="1">
            <tr>
                <th>Batch</th>
                <th>Department</th>
                <th>Subject</th>
                <th>Title</th>
                <th>Instructor</th>
                <th>Date</th>
                <th>Time</th>
                <th>Venue</th>
            </tr>

            <?php
            if  ($result && mysqli_num_rows($result) > 0) {

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                            <td>{$row['batch_name']}</td>
                            <td>{$row['department_name']}</td>
                            <td>{$row['subject_name']}</td>
                            <td>{$row['title']}</td>
                            <td>{$row['instructor']}</td>
                            <td>{$row['date']}</td>
                            <td>{$row['time']}</td>
                            <td>{$row['venue']}</td>
                        </tr>";
                }
            } else {
                echo "<tr><td colspan='8'>No lectures found</td></tr>";
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
