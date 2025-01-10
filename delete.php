<?php
require 'connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete the student record from the database
    $sql = "DELETE FROM students WHERE id = $id";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        header("Location: list.php");
        exit;
    } else {
        echo "Error deleting record.";
    }
} else {
    echo "Invalid request!";
}
?>
