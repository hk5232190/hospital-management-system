<?php include 'auth.php'; ?>
<?php include 'db.php'; ?>

<?php

$id = $_GET['id'];

$query = "SELECT * FROM appointments WHERE id='$id'";
$result = mysqli_query($conn, $query);

$row = mysqli_fetch_assoc($result);

$patients = mysqli_query($conn, "SELECT * FROM patients");
$doctors = mysqli_query($conn, "SELECT * FROM doctors");

if (isset($_POST['update'])) {

    $patient_id = $_POST['patient_id'];
    $doctor_id = $_POST['doctor_id'];
    $appointment_date = $_POST['appointment_date'];

    $update = "UPDATE appointments 
               SET patient_id='$patient_id',
                   doctor_id='$doctor_id',
                   appointment_date='$appointment_date'
               WHERE id='$id'";

    mysqli_query($conn, $update);

    header("Location: view_appointments.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Appointment</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

<div class="row justify-content-center">

<div class="col-md-6">

<div class="card p-4 shadow">

<h2 class="text-center mb-4">✏ Edit Appointment</h2>

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

<label>Doctor</label>

<select name="doctor_id" class="form-control mb-3">

<?php while($d = mysqli_fetch_assoc($doctors)) { ?>

<option value="<?php echo $d['id']; ?>"
<?php if($d['id'] == $row['doctor_id']) echo "selected"; ?>>

<?php echo $d['name']; ?>

</option>

<?php } ?>

</select>

<label>Date</label>

<input type="date"
       name="appointment_date"
       value="<?php echo $row['appointment_date']; ?>"
       class="form-control mb-3">

<button type="submit"
        name="update"
        class="btn btn-primary w-100">

Update Appointment

</button>

</form>

</div>

</div>

</div>

</div>

</body>
</html>