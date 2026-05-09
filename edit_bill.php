<?php include 'auth.php'; ?>
<?php include 'db.php'; ?>

<?php

$id = $_GET['id'];

$query = "SELECT * FROM bills WHERE id='$id'";
$result = mysqli_query($conn, $query);

$row = mysqli_fetch_assoc($result);

$patients = mysqli_query($conn, "SELECT * FROM patients");

if (isset($_POST['update'])) {

    $patient_id = $_POST['patient_id'];
    $amount = $_POST['amount'];
    $bill_date = $_POST['bill_date'];

    $update = "UPDATE bills
               SET patient_id='$patient_id',
                   amount='$amount',
                   bill_date='$bill_date'
               WHERE id='$id'";

    mysqli_query($conn, $update);

    header("Location: view_bills.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Bill</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

<div class="row justify-content-center">

<div class="col-md-6">

<div class="card p-4 shadow">

<h2 class="text-center mb-4">✏ Edit Bill</h2>

<form method="POST">

<label>Patient</label>

<select name="patient_id" class="form-control mb-3">

<?php while($p = mysqli_fetch_assoc($patients)) { ?>

<option value="<?php echo $p['id']; ?>"
<?php if($p['id'] == $row['patient_id']) echo "selected"; ?>>

<?php echo $p['name']; ?>

</option>

<?php } ?>

</select>

<label>Amount</label>

<input type="number"
       name="amount"
       value="<?php echo $row['amount']; ?>"
       class="form-control mb-3">

<label>Date</label>

<input type="date"
       name="bill_date"
       value="<?php echo $row['bill_date']; ?>"
       class="form-control mb-3">

<button type="submit"
        name="update"
        class="btn btn-primary w-100">

Update Bill

</button>

</form>

</div>

</div>

</div>

</div>

</body>
</html>