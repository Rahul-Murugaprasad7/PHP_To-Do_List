<?php
if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $checked = isset($_POST['checked']) ? 1 : 0;

    $stmt = $conn->prepare("UPDATE todos SET title = :title, checked = :checked WHERE id = :id");
    $stmt->execute(array(':id' => $id, ':title' => $title, ':checked' => $checked));
    header("Location: index.php");
}
?>