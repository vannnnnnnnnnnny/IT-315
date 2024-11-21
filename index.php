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
                <a href="edit_task.php?id=<?php echo $row['id']; ?>">Edit</a>
            </td>
        </tr>
    <?php endwhile; ?>
</table>

</table>


 $conn->close(); 
 ?>
