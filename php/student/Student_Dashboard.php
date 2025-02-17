<?php
session_start(); // Add this line to start the session
if (!isset($_SESSION['name'])) {
    // Redirect to login if session is not set
    header("Location: login.php");
    exit();
}
?>

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
        /* Internal CSS for Notification Dropdown */
        .notifications {
            position: relative;
            display: inline-block;
        }

        .dropdown {
            position: absolute;
            top: 100%; /* Position below the bell icon */
            right: 0;
            background-color: rgba(255, 254, 254, 0.8);
            border-radius: 20px; /* Round border */
            border: 36px round #ccc;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            width: 300px; /* Adjust width as needed */
            max-height: 400px; /* Limit height and add scroll */
            overflow-y: auto;
            display: none; /* Hidden by default */
        }

        .dropdown ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        .dropdown li {
            padding: 10px;
            border-bottom: 1px solid #eee;
        }

        .dropdown li:last-child {
            border-bottom: none;
        }

        .notification-btn {
            cursor: pointer;
            position: relative;
        }

        .notification-btn[data-count]:after {
            content: attr(data-count);
            position: absolute;
            top: -15px;
            right: -10px;
            background-color: red;
            color: white;
            border-radius: 40%;
            padding: 2px 6px; /* Adjust the padding to fit the text */
            font-size: 12px; /* Adjust the font size for better visibility */
            line-height: 18px; /* Align text vertically inside the circle */ /* Make the number stand out */
        }

        /* Show dropdown when active */
        .dropdown.active {
            display: block;
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
                        <span class="username"><?php echo htmlspecialchars($_SESSION['name']); ?></span>
                        <div class="popup-info">
                            <p>Student ID: <?php echo htmlspecialchars($_SESSION['student_id']); ?></p>
                            <p>Email: <?php echo htmlspecialchars($_SESSION['email']); ?></p>
                            <p>Batch: <?php echo htmlspecialchars($_SESSION['year']); ?></p>                        
                            <p>Department: <?php echo htmlspecialchars($_SESSION['department_name']); ?></p>
                        </div>
                    </div>
                    <span class="close-btn material-symbols-rounded">close</span>
                    <li><a href="#">Home</a></li>


                </ul>
                <div class="notifications">
                    <span class="notification-btn material-symbols-rounded" id="notification-bell" aria-label="Notifications">notifications</span>
                    <div class="dropdown" id="notification-dropdown">
                        <ul id="notification-list"></ul>
                    </div>
                </div>
                <button class="logout-btn" id="logoutBtn">LOGOUT</button>
            </div>
        </nav>
    </header>
    <main>
        <section class="options">
            <div class="option">
                <a href="#">Scan QR Code</a>
            </div>
            <div class="option">
                <a href="../view_lectures/view_details.php">Lectures/ Events Shedule</a>
            </div>
            <div class="option">
                <a href="../message/upload.php">Send Absence Message</a>
            </div>
            <div class="option">
                <a href="../reports/Student_Reports.php">Attendance Reports</a>
            </div>
        </section>
    </main>
    <script src="../../js/script_2.js"></script>
    <script>
        $(document).ready(function () {
            // Fetch notifications when the page loads
            fetchNotifications();

            // Toggle notifications dropdown
            $("#notification-bell").click(function() {
                $("#notification-dropdown").toggle();
            });

            // Fetch and display notifications
            function fetchNotifications() {
                $.ajax({
                    url: 'fetch_notificatons.php', // PHP script to fetch notifications
                    method: 'GET',
                    success: function(response) {
                        const notifications = JSON.parse(response);
                        let notificationHTML = '';
                        if (notifications.length === 0) {
                            notificationHTML = '<li>No notifications</li>';
                        } else {
                            notifications.forEach(function(notification) {
                                notificationHTML += `
                                    <li class="notification-item" data-id="${notification.id}">
                                        <strong>${notification.message}</strong> - ${notification.timestamp}
                                        <button class="mark-as-read" data-id="${notification.id}">Mark as Read</button>
                                    </li>
                                `;
                            });
                        }
                        $('#notification-list').html(notificationHTML);
                        // Update notification count
                        $('#notification-bell').attr('data-count', notifications.length);
                    },
                    error: function() {
                        $('#notification-list').html('<li>Error loading notifications</li>');
                    }
                });
            }

            // Mark notification as read
            $(document).on('click', '.mark-as-read', function() {
                const notificationId = $(this).data('id');
                $.ajax({
                    url: 'mark_as_read.php',
                    method: 'POST',
                    data: { id: notificationId },
                    success: function() {
                        fetchNotifications(); // Refresh notifications
                    }
                });
            });

            // Auto-refresh notifications every 60 seconds
            setInterval(fetchNotifications, 60000);
        });

        document.getElementById("logoutBtn").addEventListener("click", function () {
        alert("You have been logged out!");
        window.location.href = "../logout.php";
        });
  </script>
  

</body>
</html>
