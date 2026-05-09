<?php include 'db.php'; ?>

$id = $_GET['id'];

$query = "DELETE FROM bills WHERE id='$id'";

mysqli_query($conn, $query);

header("Location: view_bills.php");
?>