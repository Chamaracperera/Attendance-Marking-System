<?php
require '../php/db.php';

if (isset($_POST['department'])) {
    $department = $_POST['department'];

    // Prepare statement to select lecturers based on department
    $stmt = $conn->prepare("SELECT lecturer_id, name, email FROM lecturer WHERE department_id = (SELECT department_id FROM department WHERE department_name = ?)");
    $stmt->bind_param("s", $department);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['lecturer_id']}</td>
                    <td>{$row['name']}</td>
                    <td>{$row['email']}</td>
                    <td class='actions-btn-group'>
                        <button class='edit-btn' onclick='editLecturer({$row['lecturer_id']})'>Edit</button>
                        <button class='delete-btn' onclick='deleteLecturer({$row['lecturer_id']})'>Delete</button>
                    </td>
                </tr>";
        }
    } else {
        echo "<tr><td colspan='4'>No lecturers found in this department.</td></tr>";
    }

    $stmt->close();
    $conn->close();
}
