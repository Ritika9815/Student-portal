<?php
require_once './class/crud.php';

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submit'])) {
    // Collect and sanitize input
    $name = isset($_POST['name']) ? trim($_POST['name']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $course = isset($_POST['course']) ? trim($_POST['course']) : '';
    $grade = isset($_POST['grade']) ? (int)$_POST['grade'] : -1;

    // Basic validation
    if ($name !== '' && $email !== '' && $course !== '' && $grade >= 0 && $grade <= 100) {
        $crud = new crud();

        $sql = "INSERT INTO students (name, email, course, grade) VALUES (?, ?, ?, ?)";
        $params = [$name, $email, $course, $grade];

        // Execute and redirect
        if ($crud->execute($sql, $params)) {
            header("Location: view.php?message=Student added successfully");
            exit();
        } else {
            echo "<p style='text-align:center; color:red;'>Error: Could not add student. Please try again.</p>";
        }
    } else {
        echo "<p style='text-align:center; color:red;'>Please fill out all fields correctly.</p>";
    }
} else {
    echo "<p style='text-align:center; color:red;'>Invalid request.</p>";
}

echo "<p style='text-align:center;'><a href='index.php'>Back to Form</a></p>";
?>
