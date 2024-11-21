<?php
include 'db.php';

$id = $_GET['id'] ?? null;

if ($id) {
    $stmt = $conn->prepare("SELECT * FROM tasks WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $task = $result->fetch_assoc();
}
?>
<?php if ($task): ?>
    <h2>Edit Task</h2>
    <form action="edit_task.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $task['id']; ?>">
        <input type="text" name="task" value="<?php echo htmlspecialchars($task['task']); ?>" required>
        <button type="submit">Update Task</button>
    </form>
<?php else: ?>
    <p>Task not found.</p>
<?php endif; ?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $task = $_POST['task'];

    $stmt = $conn->prepare("UPDATE tasks SET task = ? WHERE id = ?");
    $stmt->bind_param("si", $task, $id);

    if ($stmt->execute()) {
        echo "Task updated successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();

    header("Location: index.php");
    exit();
}
?>
