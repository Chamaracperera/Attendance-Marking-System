<?php
require '../php/db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR-Based Attendance Marking System - User Management</title>
    <link rel="shortcut icon" href="../img/logo.png">
    <link rel="stylesheet" href="user.css">
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
                <li><a href="#">Home</a></li>
                <li><a href="../crud/user.php" id="manageUserBtn">Manage User</a></li>
                <li><a href="../crud/batch.php">Manage Batch Details</a></li>
                <li><a href="#">Manage Course Details</a></li>
                <li><a href="#">Manage Location</a></li>
            </ul>
            <div class="navbar-right">
                <span class="notification-btn material-symbols-rounded">notifications</span>
                <button class="logout-btn" id="logoutBtn">LOGOUT</button>
            </div>
        </div>
    </nav>
</header>

<div class="container">
    <div class="department-selection">
        <button onclick="filterByDepartment('ICT')">ICT</button>
        <button onclick="filterByDepartment('IAT')">IAT</button>
        <button onclick="filterByDepartment('AT')">AT</button>
        <button onclick="filterByDepartment('ET')">ET</button>
    </div>

    <div class="user-type-selection">
        <button onclick="filterByUserType('Lecturers')">Lecturer</button>
        <button onclick="filterByUserType('Students')">Student</button>
    </div>

    <div id="lecturerTable" class="user-table" style="display: none;">
        <h3>Lecturer Details</h3>
        <div class="search-container">
            <input type="text" id="lecturerSearch" class="search-input" placeholder="Search by Lecturer ID or Name" onkeyup="searchTable('lecturerSearch', 'lecturerTable')">
            <span class="clear-btn" onclick="clearSearch('lecturerSearch', 'lecturerTable')">&times;</span>
        </div>
        <table class="user-management-table" id="lecturerTableContent">
            <thead>
                <tr>
                    <th>Lecturer ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
        <div class="table-buttons">
            <button class="add-btn" id="addLecturerBtn">Add New Lecturer</button>
        </div>
    </div>

    <div id="studentTable" class="user-table" style="display: none;">
        <h3>Student Details</h3>
        <div class="batch-selection">
            <label for="batchSelect">Select Batch:</label>
            <select id="batchSelect" class="batch-dropdown" onchange="filterByBatchAndDepartment()">
                <option value="">--Select Batch--</option>
                <?php
                $sql = "SELECT DISTINCT year FROM batch ORDER BY year DESC";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<option value='".$row['year']."'>".$row['year']."</option>";
                    }
                } else {
                    echo "<option value=''>No batches available</option>";
                }
                ?>
            </select>
        </div>
        <div class="search-container">
            <input type="text" id="studentSearch" class="search-input" placeholder="Search by Student ID or Name" onkeyup="searchTable('studentSearch', 'studentTable')">
            <span class="clear-btn" onclick="clearSearch('studentSearch', 'studentTable')">&times;</span>
        </div>
        <table class="user-management-table" id="studentTableContent">
            <thead>
                <tr>
                    <th>Student ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
        <div class="table-buttons">
            <button class="add-btn" id="addStudentBtn">Add New Student</button>
        </div>
    </div>
</div>

<script src="../../JS/script_2.js"></script>
<script src="../crud/user.js"></script>

</body>
</html>
