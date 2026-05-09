<?php include 'auth.php'; ?>
<?php include 'db.php'; ?>

<?php

$query = "SELECT 
            bills.id,
            patients.name AS patient_name,
            bills.amount,
            bills.bill_date
          FROM bills
          JOIN patients ON bills.patient_id = patients.id";

$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html>
<head>
    <title>View Bills</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">

    <h2 class="text-center mb-4">💵 All Bills</h2>

    <div class="mb-3 text-center">
        <a href="add_bill.php" class="btn btn-primary">
            ➕ Add Bill
        </a>

        <a href="index.php" class="btn btn-secondary">
            🏠 Dashboard
        </a>
    </div>

    <div class="table-responsive">

        <table class="table table-bordered table-striped text-center">

            <tr>
                <th>ID</th>
                <th>Patient Name</th>
                <th>Amount</th>
                <th>Bill Date</th>
                <th>Action</th>
            </tr>

            <?php while ($row = mysqli_fetch_assoc($result)) { ?>

            <tr>
                <td><?php echo $row['id']; ?></td>

                <td><?php echo $row['patient_name']; ?></td>

                <td>
                    Rs. <?php echo $row['amount']; ?>
                </td>

                <td><?php echo $row['bill_date']; ?></td>
                
                <td>

<a href="edit_bill.php?id=<?php echo $row['id']; ?>"
   class="btn btn-warning btn-sm">

   Edit

</a>

<a href="delete_bill.php?id=<?php echo $row['id']; ?>"
   class="btn btn-danger btn-sm"
   onclick="return confirm('Delete this bill?')">

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