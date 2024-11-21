<?php
include 'db.php';

$result = $conn->query("SELECT * FROM tasks ORDER BY created_at DESC");


<form action="add_task.php" method="POST">
    <input type="text" name="task" placeholder="Enter new task" required>
    <button type="submit">Add Task</button>
</form>
<h2>Task List</h2>
<table border="1">
    <tr>
        <th>Task</th>
        <th>Created At</th>
        <th>Actions</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo htmlspecialchars($row['task']); ?></td>
            <td><?php echo htmlspecialchars($row['created_at']); ?></td>
            <td>
                <a href="edit_task.php?id=<?php echo $row['id']; ?>">Edit</a> |
                <a href="delete_task.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this task?');">Delete</a>
            </td>
        </tr>
    <?php endwhile; ?>
</table>


 $conn->close(); 

<style>
    body {
        font-family: Arial, sans-serif;
        margin: 20px;
    }
    h2 {
        color: #333;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
    }
    table, th, td {
        border: 1px solid #ccc;
        padding: 10px;
        text-align: left;
    }
    th {
        background-color: #f4f4f4;
    }
    a {
        color: #007bff;
        text-decoration: none;
    }
    a:hover {
        text-decoration: underline;
    }
    form {
        margin-bottom: 20px;
    }
    input[type="text"] {
        padding: 8px;
        width: 80%;
        margin-right: 10px;
    }
    button {
        padding: 8px 12px;
        background-color: #28a745;
        color: #fff;
        border: none;
        cursor: pointer;
    }
    button:hover {
        background-color: #218838;
    }
</style>

 ?>
