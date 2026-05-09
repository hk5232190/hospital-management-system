<?php include 'auth.php'; ?>
<?php include 'db.php'; ?>

<?php
$query = "SELECT * FROM doctors";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Doctors</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">

    <h2 class="text-center mb-4">All Doctors</h2>

    <div class="mb-3 text-center">
        <a href="add_doctor.php" class="btn btn-primary">➕ Add Doctor</a>
        <a href="index.php" class="btn btn-secondary">🏠 Dashboard</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped text-center">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Specialization</th>
                <th>Phone</th>
                <th>Action</th>
            </tr>

            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['specialization']; ?></td>
                <td><?php echo $row['phone']; ?></td>
                <td>
                    <a href="edit_doctor.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="delete_doctor.php?id=<?php echo $row['id']; ?>" 
                       class="btn btn-danger btn-sm"
                       onclick="return confirm('Delete this doctor?')">
                       Delete
                    </a>
                </td>
            </tr>
            <?php } ?>

        </table>
    </div>

</div>

</body>
</html>