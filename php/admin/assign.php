<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header('Location:../../index.html?error=notloggedin');
    exit();
}
include '../db.php'; // Your database connection file

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $batch_id = $_POST['batch_id'];
    $department_id = $_POST['department_id'];
    $subject_ids = $_POST['subject_ids']; // Array
    $lecturer_id = $_POST['lecturer_id'];
    
    if (empty($subject_ids)) {
        echo 'Please select at least one subject!';
        exit;
    }
    
    $inserted = false;
    foreach ($subject_ids as $subject_id) {
        $sql = "INSERT INTO batch_subject (batch_id, department_id, Subject_id, lecturer_id) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('iiii', $batch_id, $department_id, $subject_id, $lecturer_id);
        if ($stmt->execute()) {
            $inserted = true;
        } else {
            echo 'Error: ' . $stmt->error;
            exit;
        }
    }

    if ($inserted) {
        echo "<script>alert('Batch, Department, Subjects, and Lecturer Assigned Successfully!');</script>";
    } else {
        echo "<script>alert('Failed to assign records. Please try again.');</script>";
    }
    exit;
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0">
    <style>
        body { color: white; }
        #subjectsContainer, #lecturerContainer, #assignmentForm { 
            display: none; 
            margin-top: 10px; 
            color: white;
            background-color: rgba(255, 255, 255, 0.8); 
            padding: 10px;
            border-radius: 5px;
        }
        #assignmentForm { display: block; }
    </style>
    <link rel="stylesheet" href="../../css/style.css">
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
                <span class="close-btn material-symbols-rounded">close</span>
                <li><a href="Admin_Dashboard.php">Home</a></li>
            </ul>
            <div class="navbar-right">
                <button class="logout-btn" id="logoutBtn">LOGOUT</button>
            </div>
        </div>
    </nav>
</header>
<div class="container"><br><br><br><br><br>
    <h2>Assign Batch to<br> Department, Subjects, and Lecturer<br></h2><br>

    
    <form id="assignmentForm">
        <label for="batch" style="color: black;">Select Batch:</label>
        <select id="batch" name="batch_id"  required>
            <option value="">-- Select Batch --</option>
            <?php
            $batchResult = $conn->query("SELECT batch_id, year FROM batch");
            while ($row = $batchResult->fetch_assoc()) {
                echo "<option value='{$row['batch_id']}'>{$row['year']}</option>";
            }
            ?>
        </select>

        <label for="department" style="color: black;">Select Department:</label>
        <select id="department" name="department_id" required>
            <option value="">-- Select Department --</option>
            <?php
            $departmentResult = $conn->query("SELECT department_id, department_name FROM department");
            while ($row = $departmentResult->fetch_assoc()) {
                echo "<option value='{$row['department_id']}'>{$row['department_name']}</option>";
            }
            ?>
        </select>

        <div id="subjectsContainer" style="display:none;">
            <label style="color: black;">Select Subjects:</label>
            <div id="subjects" style="color: black;"></div>
        </div>

        <label for="lecturer" style="color: black;">Select Lecturer:</label>
        <select id="lecturer" name="lecturer_id" required>
            <option value="" style="color: black;">-- Select Lecturer --</option>
        </select>

        <button type="submit" style="max-width:100px">Assign</button>
    </form>
    </div>

    <div id="result"></div>

    <script>
        $(document).ready(function () {
            $('#department').change(function () {
                var department_id = $(this).val();
                if (department_id) {
                    $.ajax({
                        url: 'fetch_subjects_lecturers.php',
                        type: 'POST',
                        data: { department_id: department_id },
                        success: function (response) {
                            var data = JSON.parse(response);

                            $('#subjects').empty();
                            if (data.subjects.length > 0) {
                                data.subjects.forEach(function (subject) {
                                    $('#subjects').append(
                                        `<label><input type='checkbox' name='subject_ids[]' value='${subject.subject_id}'> ${subject.subject_code}</label><br>`
                                    );
                                });
                                $('#subjectsContainer').slideDown();
                            } else {
                                $('#subjectsContainer').hide();
                            }

                            $('#lecturer').empty().append('<option value="">-- Select Lecturer --</option>');
                            if (data.lecturers.length > 0) {
                                data.lecturers.forEach(function (lecturer) {
                                    $('#lecturer').append(
                                        `<option value='${lecturer.lecturer_id}'>${lecturer.name}</option>`
                                    );
                                });
                                $('#lecturerContainer').slideDown();
                            } else {
                                $('#lecturerContainer').hide();
                            }
                        }
                    });
                } else {
                    $('#subjectsContainer, #lecturerContainer').slideUp();
                }
            });

            $('#batch').change(function () {
                $('#subjectsContainer, #lecturerContainer').slideUp();
                $('#subjects').empty();
                $('#lecturer').empty().append('<option value="">-- Select Lecturer --</option>');
            });

            $('#assignmentForm').submit(function (e) {
                e.preventDefault();

                $.ajax({
                    url: 'assign.php',
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function (response) {
                        $('#result').html(response);
                        if (response.includes('Successfully')) {
                            $('#assignmentForm')[0].reset();
                            $('#subjectsContainer, #lecturerContainer').slideUp();
                        }
                    }
                });
            });
        });
    </script>
    <script src="../../js/script_2.js"></script>
    
    <script>
        document.getElementById("logoutBtn").addEventListener("click", function () {
            alert("You have been logged out!");
            window.location.href = "../logout.php";
        });

    </script>
</body>
</html>
