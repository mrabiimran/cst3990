<?php
include 'connection.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete query
    $query = "DELETE FROM services WHERE id = $id";
    $result = mysqli_query($con, $query);

    if ($result) {
        echo "<script>alert('Service deleted successfully!'); window.location.href='services.php';</script>";
    } else {
        echo "<script>alert('Failed to delete service!'); window.location.href='services.php';</script>";
    }
} else {
    echo "<script>alert('Invalid request!'); window.location.href='services.php';</script>";
}
?>