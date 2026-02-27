<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>

<body>
    
    <h2>Student Dashboard</h2>

<p>
Welcome, <?= $_SESSION['user']['username']; ?> |
<a href="index.php?action=logout">Logout</a>
</p>

<h3>Add New Student</h3>

<form method="POST" action="index.php?action=create_student">
    <input type="text" name="student_id" placeholder="Student ID" required>
    <input type="text" name="name" placeholder="Name" required>
    <input type="email" name="email" placeholder="Email" required>
    <button type="submit">Add</button>
</form>

<h3>Student List</h3>

<table cellpadding="5">
<tr>
    <th>ID</th>
    <th>Student ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Action</th>
</tr>

<?php while($student = $students->fetch_assoc()): ?>
<tr>
    <td><?= $student['id']; ?></td>
    <td><?= $student['student_id']; ?></td>
    <td><?= $student['name']; ?></td>
    <td><?= $student['email']; ?></td>
    <td>
        <a href="index.php?action=delete_student&id=<?= $student['id']; ?>">
            Delete
        </a>
    </td>
</tr>
<?php endwhile; ?>
</table>

</body>
</html>