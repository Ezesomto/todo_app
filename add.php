<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $desc = $_POST['description'];

    $stmt = $pdo->prepare("INSERT INTO task (title, description) VALUES (:title, :description)");
    $stmt->execute(['title' => $title, 'description' => $desc]);

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Task</title>
</head>
<body>
    <h1>Add Task</h1>
    <form method="POST">
        <label>Title:</label><br>
        <input type="text" name="title" required><br><br>

        <label>Description:</label><br>
        <textarea name="description"></textarea><br><br>

        <button type="submit">Save</button>
    </form>
    <br>
    <a href="index.php">Back</a>
</body>
</html>
