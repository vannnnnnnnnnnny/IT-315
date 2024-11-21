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
    </tr>
    <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo htmlspecialchars($row['task']); ?></td>
            <td><?php echo htmlspecialchars($row['created_at']); ?></td>
        </tr>
    <?php endwhile; ?>
</table>


 $conn->close(); 
 ?>
