<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Records | Add Student</title>
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
<h2 style="text-align: center; margin-top: 30px;">Add New Student</h2>

<?php if (isset($msg)) echo $msg; ?>

<form action="add.php" method="post">
    <table align="center" cellpadding="10">
        <tr>
            <td><label for="name">Full Name:</label></td>
            <td><input type="text" name="name" id="name" required></td>
        </tr>
        <tr>
            <td><label for="email">Email:</label></td>
            <td><input type="email" name="email" id="email" required></td>
        </tr>
        <tr>
            <td><label for="course">Course:</label></td>
            <td><input type="text" name="course" id="course" required></td>
        </tr>
        <tr>
            <td><label for="grade">Grade (0 - 100):</label></td>
            <td><input type="number" name="grade" id="grade" min="0" max="100" required></td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="submit" name="submit" value="Add Student">
                <input type="reset" value="Clear">
            </td>
        </tr>
    </table>
</form>

<p style="text-align: center; margin-top: 20px;">
    <a href="view.php">View All Students</a>
</p>

<!-- Footer -->
<footer style="background-color: #f2f2f2; text-align: center; padding: 15px; margin-top: 40px;">
    &copy; <?php echo date("Y"); ?> Student Records Application
</footer>

</body>
</html>
