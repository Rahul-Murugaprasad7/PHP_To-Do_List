<?php

if (isset($_POST['add'])) {
    $title = $_POST['title'];
    if (empty($title)) {
        header("Location: index1.php?mess=error");
    } else {
        $stmt = $conn->prepare("INSERT INTO todos (title, date_time) VALUES (:title, NOW())");
        $stmt->execute(array(':title' => $title));
        header("Location: index1.php");
    }
}

$todos = $conn->query("SELECT * FROM todos ORDER BY id DESC");

?>

