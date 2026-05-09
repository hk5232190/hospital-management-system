<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM doctors WHERE id = $id";

    if (mysqli_query($conn, $query)) {
        header("Location: view_doctors.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>