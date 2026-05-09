<?php include 'auth.php'; ?>
<?php include 'db.php'; ?>

<?php
$query = "SELECT * FROM patients";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Patients</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f4f6f9;
        }

        .container {
            margin-top: 40px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<div class="container">

    <h2>All Patients</h2>

    <div class="mb-3">
        <a href="add_patient.php" class="btn btn-primary">➕ Add Patient</a>
        <a href="index.php" class="btn btn-secondary">🏠 Dashboard</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped text-center">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Phone</th>
                <th>Action</th>
            </tr>

            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['age']; ?></td>
                <td><?php echo $row['gender']; ?></td>
                <td><?php echo $row['phone']; ?></td>
                <td>
                    <a href="edit_patient.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="delete_patient.php?id=<?php echo $row['id']; ?>" 
                       class="btn btn-danger btn-sm"
                       onclick="return confirm('Delete this patient?')">
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