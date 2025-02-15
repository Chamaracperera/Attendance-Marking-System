<?php
session_start();


if (!isset($_SESSION['user_name'])) {
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
    
    <!-- content must in this section --><!DOCTYPE html>

    <div class="container110">
        <h2>QR Based Attendance Marking System</h2>
        <div class="options">
            <button id="addLectureBtn" class="btn">Add Lecture</button>
            <button id="addEventBtn" class="btn">Add Event</button>
        </div>

        <!-- Add Lecture Form with multi-step flow -->
        <div id="lectureForm" class="form-container hidden">
            <form action="add_lecture.php" method="post" onsubmit="return validateLectureForm()">
                <!-- Step 1: Select Batch -->
                <div id="step1" class="step active">
                    <label for="batch">Select Batch Year</label>
                    <select id="batch" name="batch_id" required onchange="fetchDepartments()">
                        <option value="" disabled selected>Select Batch Year</option>
                        <?php include 'fetch_batch.php'; ?>
                    </select>
                    <button type="button" class="next-btn" onclick="nextSlide(2)">Next</button>
                </div>

                <!-- Step 2: Select Department -->
                <div id="step2" class="step hidden">
                    <label for="department">Select Department</label>
                    <select id="department" name="department_id" required onchange="fetchSubjects()">
                        <option value="" disabled selected>Select Department</option>
                    </select>
                    <button type="button" class="prev-btn" onclick="prevSlide(1)">Previous</button>
                    <button type="button" class="next-btn" onclick="nextSlide(3)">Next</button>
                </div>

                <!-- Step 3: Select Subject -->
                <div id="step3" class="step hidden">
                    <label for="subject">Select Subject</label>
                    <select id="subject" name="subject_id" required>
                        <option value="" disabled selected>Select Subject</option>
                    </select>
                    <button type="button" class="prev-btn" onclick="prevSlide(2)">Previous</button>
                    <button type="button" class="next-btn" onclick="nextSlide(4)">Next</button>
                </div>

                <!-- Step 4: Lecture Details -->
                <div id="step4" class="step hidden">
                    <label for="title">Lecture Title</label>
                    <input type="text" name="title" placeholder="Enter lecture title" required>
                    <label for="instructor">Instructor</label>
                    <input type="text" name="instructor" placeholder="Enter instructor name" required>
                    <label for="date">Date</label>
                    <input type="date" name="date" required>
                    <label for="time">Time</label>
                    <input type="time" name="time" required>
                    <label for="venue">Venue</label>
                    <input type="text" name="venue" placeholder="Enter the venue" required>
                    <button type="button" class="prev-btn" onclick="prevSlide(3)">Previous</button>
                    <button type="submit" class="submit-btn">Submit</button>
                </div>
            </form>
            <button class="close-btn" onclick="closeForm('lectureForm')">X</button>
        </div>

        <!-- Add Event Form -->
        <div id="eventForm" class="form-container hidden">
            <form action="add_event.php" method="post" enctype="multipart/form-data">
                <label for="topic">Event Topic</label>
                <input type="text" name="topic" placeholder="Name of the event" required>
                <label for="event_number">Event Number</label>
                <input type="text" name="event_number" id="event_number" placeholder="Enter a number of 5 digits" required>
                <span id="eventError" class="error-message">Event number must be exactly 5 digits.</span>

                <label for="date">Date</label>
                <input type="date" name="date" required>
                <label for="time">Time</label>
                <input type="time" name="time" required>
                <label for="venue">Venue</label>
                <input type="text" name="venue" placeholder="Enter the venue" required>
                <label for="audience">Audience</label>
                <input type="text" name="audience" placeholder="For whom" required>
                <label for="document">Upload JPG Document (optional)</label>
                <input type="file" name="document" accept=".jpg">
                <button type="submit" class="submit-btn">Submit</button>
            </form>
            <button class="close-btn" onclick="closeForm('eventForm')">X</button>
        </div>
    </div>
    
    <script src="script.js"></script>
    <script src="../../js/script_2.js"></script>
    <script>
    document.getElementById("logoutBtn").addEventListener("click", function () {
      alert("You have been logged out!");
      window.location.href = "../logout.php";
    });
  </script>
    
</body>
</html>
