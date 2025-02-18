<?php
session_start();

if (!isset($_SESSION['name'])) {
    header('Location:../../index.html?error=notloggedin');
    exit();
}
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
    <!-- Include jsQR library -->
    <script src="https://cdn.jsdelivr.net/npm/jsqr/dist/jsQR.js"></script>
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

<div class="container100">
    <h2>Scan QR Code for Attendance</h2>

    <!-- Permission message -->
    <div id="camera-permission-message" style="display:none;">
        <p>Please allow access to your camera for QR code scanning.</p>
        <button onclick="startQRScan()">Enable Camera</button>
    </div>

    <button onclick="startQRScan()">Scan QR Code</button>

    <div id="result"></div>
    <video id="video" width="100%" height="auto" style="border: 1px solid black;"></video>
</div>

<script>
    // Start QR scan when button is clicked
    function startQRScan() {
        const videoElement = document.getElementById('video');
        const resultElement = document.getElementById('result');
        
        // Check if the browser supports getUserMedia
        if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
            // Get all available video devices (cameras)
            navigator.mediaDevices.enumerateDevices()
                .then(function(devices) {
                    const videoDevices = devices.filter(function(device) {
                        return device.kind === 'videoinput';
                    });

                    // Look for the back camera (typically device facing away from the user)
                    const backCamera = videoDevices.find(function(device) {
                        return device.label.toLowerCase().includes('back') || device.facing === 'environment';
                    });

                    // If the back camera is available, use it, otherwise fall back to the first camera
                    const cameraId = backCamera ? backCamera.deviceId : videoDevices[0].deviceId;

                    // Access the selected camera
                    return navigator.mediaDevices.getUserMedia({
                        video: { deviceId: { exact: cameraId } }
                    });
                })
                .then(function(stream) {
                    videoElement.srcObject = stream;
                    videoElement.play();
                    scanQRCode(videoElement, resultElement);
                    document.getElementById('camera-permission-message').style.display = 'none'; // Hide permission message
                })
                .catch(function(error) {
                    console.error("Error accessing camera: ", error);
                    alert('Error accessing camera. Please check your permissions.');
                    document.getElementById('camera-permission-message').style.display = 'block'; // Show permission message
                });
        } else {
            alert('Your browser does not support camera access.');
        }
    }

    // Scan QR code from video stream
    function scanQRCode(videoElement, resultElement) {
    const canvas = document.createElement('canvas');
    const context = canvas.getContext('2d');

    function scan() {
        if (videoElement.readyState === videoElement.HAVE_ENOUGH_DATA) {
            canvas.width = videoElement.videoWidth;
            canvas.height = videoElement.videoHeight;
            context.drawImage(videoElement, 0, 0, canvas.width, canvas.height);

            const imageData = context.getImageData(0, 0, canvas.width, canvas.height);
            const code = jsQR(imageData.data, canvas.width, canvas.height);

            if (code) {
                stopCamera(videoElement);

                // Display scanned QR data
                resultElement.innerHTML = `<p style="color: green;">QR Code Scanned: ${code.data}</p>`;

                // Send QR data to PHP for attendance marking
                fetch('mark_attendance.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ qr_data: code.data })
                })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        resultElement.innerHTML += `<p style="color: green;">Attendance Marked Successfully!</p>`;
                    } else {
                        resultElement.innerHTML += `<p style="color: red;">Failed to Mark Attendance: ${data.message}</p>`;
                    }
                })
                .catch(err => {
                    resultElement.innerHTML += `<p style="color: red;">Error storing attendance: ${err}</p>`;
                });
            } else {
                requestAnimationFrame(scan); // Keep scanning if no QR code is detected
            }
        }
    }

    requestAnimationFrame(scan);
}

    // Stop camera when done scanning
    function stopCamera(videoElement) {
        const stream = videoElement.srcObject;
        const tracks = stream.getTracks();
        tracks.forEach(track => track.stop());
        videoElement.srcObject = null;
    }

    // Logout functionality
    document.getElementById("logoutBtn").addEventListener("click", function () {
        alert("You have been logged out!");
        window.location.href = "../logout.php";
    });
</script>
</body>
</html>
