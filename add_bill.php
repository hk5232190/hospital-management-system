<?php include 'auth.php'; ?>
<?php include 'db.php'; ?>

<?php

// Fetch patients for dropdown
$patients = mysqli_query($conn, "SELECT * FROM patients");

// Insert bill
if (isset($_POST['add_bill'])) {

    $patient_id = $_POST['patient_id'];
    $amount = $_POST['amount'];
    $bill_date = $_POST['bill_date'];

    $query = "INSERT INTO bills(patient_id, amount, bill_date)
              VALUES('$patient_id', '$amount', '$bill_date')";

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Bill Added Successfully');</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Bill</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-md-6">

            <div class="card p-4 shadow">

                <h2 class="text-center mb-4">💵 Add Bill</h2>

                <form method="POST">

                    <label>Select Patient</label>

                    <select name="patient_id" class="form-control mb-3" required>

                        <option value="">Choose Patient</option>

                        <?php while ($row = mysqli_fetch_assoc($patients)) { ?>

                            <option value="<?php echo $row['id']; ?>">
                                <?php echo $row['name']; ?>
                            </option>

                        <?php } ?>

                    </select>

                    <label>Bill Amount</label>

                    <input type="number" name="amount"
                           class="form-control mb-3"
                           placeholder="Enter Bill Amount"
                           required>

                    <label>Bill Date</label>

                    <input type="date" name="bill_date"
                           class="form-control mb-3"
                           required>

                    <button type="submit"
                            name="add_bill"
                            class="btn btn-primary w-100">
                            Add Bill
                    </button>

                </form>

                <div class="text-center mt-3">
                    <a href="index.php" class="btn btn-secondary">
                        🏠 Dashboard
                    </a>
                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>