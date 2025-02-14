<?php
session_start();
require '../db.php';

// Turn on output buffering to prevent any output before JSON response
ob_start();

header('Content-Type: application/json');

if (!isset($_SESSION['username'])) {
    echo json_encode(["status" => "error", "message" => "Not logged in"]);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['year'])) {
    $year = $_POST['year'];

    // Validate batch year format (e.g., 2024_25)
    if (!preg_match('/^\d{4}_\d{2}$/', $year)) {
        echo json_encode(["status" => "error", "message" => "Invalid format. Use YYYY_YY (e.g., 2024_25)."]);
        exit();
    }

    // Check if the batch already exists
    $checkSql = "SELECT * FROM batch WHERE year = ?";
    $stmtCheck = $conn->prepare($checkSql);
    $stmtCheck->bind_param("s", $year);
    $stmtCheck->execute();
    $result = $stmtCheck->get_result();

    if ($result->num_rows > 0) {
        echo json_encode(["status" => "error", "message" => "Batch already exists!"]);
    } else {
        // Insert new batch
        $insertSql = "INSERT INTO batch (year) VALUES (?)";
        $stmtInsert = $conn->prepare($insertSql);
        $stmtInsert->bind_param("s", $year);

        if ($stmtInsert->execute()) {
            $batch_table_name = $year;
            $createTableSQL = "CREATE TABLE `$batch_table_name` (
                student_id CHAR(10) PRIMARY KEY NOT NULL,
                email VARCHAR(50) NOT NULL,
                name VARCHAR(50) NOT NULL,
                department_id INT(11) NOT NULL,
                batch_id INT(11) NOT NULL,
                password VARCHAR(150) NOT NULL,
                reset_token_hash VARCHAR(64) UNIQUE,
                reset_token_expires_at DATETIME,
                FOREIGN KEY (department_id) REFERENCES department(department_id),
                FOREIGN KEY (batch_id) REFERENCES batch(batch_id)
            )";

            if ($conn->query($createTableSQL) === TRUE) {
                echo json_encode(["status" => "success", "message" => "Batch added successfully and student table created: " . $batch_table_name]);
            } else {
                echo json_encode(["status" => "error", "message" => "Batch added, but failed to create student table: " . $conn->error]);
            }
        } else {
            echo json_encode(["status" => "error", "message" => "Error adding batch: " . $stmtInsert->error]);
        }
    }

    $stmtCheck->close();
    $stmtInsert->close();
}

$conn->close();
ob_end_flush();
