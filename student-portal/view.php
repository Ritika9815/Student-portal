<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Records | View Students</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<!-- Header -->
<div style="background-color: #003366; color: white; padding: 20px 0; text-align: center;">
    <h1>Student Records System</h1>
    <nav>
        <a href="index.php" style="color: white; margin: 0 15px;">Add Student</a>
        <a href="view.php" style="color: white; margin: 0 15px;">View Students</a>
    </nav>
</div>

<!-- Main Content -->
<h2 style="text-align: center; margin-top: 30px;">All Student Records</h2>

<?php
include_once './class/crud.php';
$crud = new crud();
$query = "SELECT * FROM students";
$result = $crud->getData($query);
?>

<?php if (isset($_GET['message'])): ?>
    <p style="text-align:center; color: green;"><?= htmlspecialchars($_GET['message']) ?></p>
<?php endif; ?>

<?php if ($result && count($result) > 0): ?>
    <table border="1" cellspacing="0" cellpadding="10" align="center">
        <thead style="background-color: #dddddd;">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Course</th>
            <th>Grade</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($result as $row): ?>
            <tr>
                <td><?= htmlspecialchars($row['name']) ?></td>
                <td><?= htmlspecialchars($row['email']) ?></td>
                <td><?= htmlspecialchars($row['course']) ?></td>
                <td><?= htmlspecialchars($row['grade']) ?></td>
                <td>
                    <a href="edit.php?id=<?= $row['id'] ?>">Edit</a> |
                    <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Delete this student?');">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p style="text-align:center; color: red;">No student records found.</p>
<?php endif; ?>

<!-- Footer -->
<footer style="background-color: #f2f2f2; text-align: center; padding: 15px; margin-top: 40px;">
    &copy; <?= date("Y") ?> Student Records Application
</footer>

</body>
</html>
