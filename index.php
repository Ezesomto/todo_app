<?php require 'db.php';

// Fetch tasks
$stmt = $pdo->query("SELECT * FROM task ORDER BY created_at DESC");
$tasks = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>To-Do List</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>To-Do List</h1>

    <a href="add.php">Add Task</a>

    <ul>
        <?php foreach ($tasks as $task): ?>
            <li>
                <strong><?= htmlspecialchars($task['title']) ?></strong> 
                (<?= $task['status'] ?>, created at <?= $task['created_at'] ?>) <br>
                <?= nl2br(htmlspecialchars($task['description'])) ?>
                <br>
                <a href="edit.php?id=<?= $task['id'] ?>">✏ Edit</a> | 
                <a href="delete.php?id=<?= $task['id'] ?>" onclick="return confirm('Delete this task?')">🗑 Delete</a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
