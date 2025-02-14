<?php 
require '../php/db.php'; // Ensure this path matches your actual db connection path

$year = $_POST['year']; 
$department = $_POST['department'];

// Ensure both year and department are provided
if (empty($year) || empty($department)) {
    echo "<tr><td colspan='4'>Please select both batch year and department.</td></tr>";
    exit;
}

// Construct and execute the query to access the correct batch's student table
$sql = "SELECT student_id, name, email FROM $year WHERE department_id = (SELECT department_id FROM department WHERE department_name = ?)";
$stmt = $conn->prepare($sql);

if ($stmt === false) {
    echo "<tr><td colspan='4'>Database query error.</td></tr>";
    exit;
}

$stmt->bind_param("s", $department);
$stmt->execute();
$result = $stmt->get_result();

// Output table rows based on query result
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . htmlspecialchars($row['student_id']) . "</td>
                <td>" . htmlspecialchars($row['name']) . "</td>
                <td>" . htmlspecialchars($row['email']) . "</td>
                <td class='actions-btn-group'>
                    <button class='edit-btn' onclick='editStudent({$row['student_id']}, \"{$year}\")'>Edit</button>
                    <button class='delete-btn' onclick='deleteStudent({$row['student_id']}, \"{$year}\")'>Delete</button>
                </td>
            </tr>";
    }
    
} else {
    echo "<tr><td colspan='4'>No students found for the selected batch and department.</td></tr>";
}

$stmt->close();
$conn->close();
?>
