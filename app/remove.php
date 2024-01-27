<?php
if (isset($_GET['remove'])) {
    $id = $_GET['remove'];
    $stmt = $conn->prepare("DELETE FROM todos WHERE id = :id");
    $stmt->execute(array(':id' => $id));
    header("Location: index1.php");
}
?>



