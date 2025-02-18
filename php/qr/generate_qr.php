<?php

session_start();
// Check if the user is logged in
if (!isset($_SESSION['user_name'])) {
    header('Location:../../index.html?error=notloggedin');
    exit();
}

require 'phpqrcode/qrlib.php';  // Include the QR Code library
require '../db.php'; //

// Fetch data for Batch, Department, and Subject from respective tables
$batch_query = "SELECT * FROM batch";
$department_query = "SELECT * FROM department";
$subject_query = "SELECT * FROM subjects";

// Execute queries
$batch_result = $conn->query($batch_query);
$department_result = $conn->query($department_query);
$subject_result = $conn->query($subject_query);

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $batch_id = $_POST['batch_id'];
    $department_id = $_POST['department_id'];
    $subject_id = $_POST['subject_id'];

    // Generate a dynamic session ID (based on time or a unique identifier)
    $session_id = uniqid('session_'); // You can use time() as well
    
    // Prepare the data for the QR Code
    $data = json_encode([
        'batch_id' => $batch_id,
        'department_id' => $department_id,
        'subject_id' => $subject_id,
        'session_id' => $session_id
    ]);
    
    // Define the path where QR codes will be saved
    $qrImagePath = 'qrcodes/' . $session_id . '.png';
    
    // Generate the QR Code and save it to the server
    QRcode::png($data, $qrImagePath, QR_ECLEVEL_L, 10);  // Increase the size by changing the last parameter

    
    // Set the QR Code path for display
    $show_qr_code = true;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="shortcut icon" href="../../img/logo.png">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0">
    <link rel="stylesheet" href="../../css/style.css">
    <style>
        .container100 {
            background-color:rgba(255, 255, 255, 0.64);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            margin: 50px auto;
            max-width: 300px;
            text-align: center;
        }
        form label {
            font-weight: bold;
        }
        form select, form button {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        form button {
            background-color:rgb(0, 198, 228);
            color: white;
            font-size: 16px;
            cursor: pointer;
        }
        form button:hover {
            background-color:rgb(0, 101, 156);
        }
        .qr-code-display img {
            width: 250px;
            height: 250px;
            margin-top: 10px;
        }
        .back-btn {
            background-color: #337ab7;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .back-btn:hover {
            background-color: #286090;
        }
    </style>
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
                        <div class="popup-info">
                            <p>Email: <?php echo htmlspecialchars($_SESSION['email']); ?></p>
                            <p>Lecturer ID: <?php echo htmlspecialchars($_SESSION['lecturer_id']); ?></p>                         
                            <p>Department: <?php echo htmlspecialchars($_SESSION['department_name']); ?></p>
                        </div>
                    </div>
                    <span class="close-btn material-symbols-rounded">close</span>
                    <li><a href="../lecturer/Lecturer_Dashboard.php">Home</a></li>
                </ul>
                
                <button class="logout-btn" id="logoutBtn">LOGOUT</button>
            </div>
        </nav>
    </header>

    <div class="container100">
        <?php if (isset($show_qr_code) && $show_qr_code): ?>
            <div class="qr-code-display">
                <h3>Generated QR Code for Attendance</h3>
                <img src="<?php echo $qrImagePath; ?>" alt="QR Code">
                <br><br>
                <a href="generate_qr.php"><button class="back-btn">Back</button></a>
            </div>
        <?php else: ?>
            <form action="generate_qr.php" method="POST">
                <label for="batch_id">Batch ID:</label>
                <select name="batch_id" required>
                    <option value="">Select Batch</option>
                    <?php while ($row = $batch_result->fetch_assoc()) { ?>
                        <option value="<?php echo $row['batch_id']; ?>"><?php echo $row['year']; ?></option>
                    <?php } ?>
                </select>

                <label for="department_id">Department ID:</label>
                <select name="department_id" required>
                    <option value="">Select Department</option>
                    <?php while ($row = $department_result->fetch_assoc()) { ?>
                        <option value="<?php echo $row['department_id']; ?>"><?php echo $row['department_name']; ?></option>
                    <?php } ?>
                </select>

                <label for="subject_id">Subject ID:</label>
                <select name="subject_id" required>
                    <option value="">Select Subject</option>
                    <?php while ($row = $subject_result->fetch_assoc()) { ?>
                        <option value="<?php echo $row['subject_id']; ?>"><?php echo $row['subject_name']; ?></option>
                    <?php } ?>
                </select>

                <button type="submit">Generate QR Code</button>
            </form>
        <?php endif; ?>
    </div>

    <script src="../../js/script_2.js"></script>
    <script>
        document.getElementById("logoutBtn").addEventListener("click", function (e) {
            e.preventDefault();
            if (confirm("Are you sure you want to logout?")) {
                alert("You have been logged out!");
                window.location.href = "../logout.php";
            }
        });
    </script>
</body>
</html>
