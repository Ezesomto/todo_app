<?php
require 'db.php';

// Get task by ID
$id = $_GET['id'] ?? null;
if (!$id) {
    die("Task ID missing.");
}

$stmt = $pdo->prepare("SELECT * FROM task WHERE id = :id");
$stmt->execute(['id' => $id]);
$task = $stmt->fetch();

if (!$task) {
    die("Task not found.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $desc = $_POST['description'];
    $status = $_POST['status'];

    $stmt = $pdo->prepare("UPDATE task SET title = :title, description = :description, status = :status WHERE id = :id");
    $stmt->execute([
        'title' => $title,
        'description' => $desc,
        'status' => $status,
        'id' => $id
    ]);

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Task</title>
</head>
<body>
    <h1>Edit Task</h1>
    <form method="POST">
        <label>Title:</label><br>
        <input type="text" name="title" value="<?= htmlspecialchars($task['title']) ?>" required><br><br>

        <label>Description:</label><br>
        <textarea name="description"><?= htmlspecialchars($task['description']) ?></textarea><br><br>

        <label>Status:</label><br>
        <select name="status">
            <option value="pending" <?= $task['status'] === 'pending' ? 'selected' : '' ?>>Pending</option>
            <option value="completed" <?= $task['status'] === 'completed' ? 'selected' : '' ?>>Completed</option>
        </select><br><br>

        <button type="submit">Update</button>
    </form>
    <br>
    <a href="index.php">⬅ Back</a>
</body>
</html>
