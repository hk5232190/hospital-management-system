<?php include 'auth.php'; ?>
<?php include 'db.php'; ?>

<?php

$patients = mysqli_query($conn, "SELECT * FROM patients");
$doctors = mysqli_query($conn, "SELECT * FROM doctors");

if(isset($_POST['submit'])){

    $patient_id = $_POST['patient_id'];
    $doctor_id = $_POST['doctor_id'];
    $appointment_date = $_POST['appointment_date'];

    $query = "INSERT INTO appointments(patient_id, doctor_id, appointment_date)
              VALUES('$patient_id', '$doctor_id', '$appointment_date')";

    if(mysqli_query($conn, $query)){

        echo "<script>alert('Appointment Added Successfully');</script>";

    } else {

        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Book Appointment</title>

<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background:#f4f6f9;
}

.card{
    border-radius:20px;
}

</style>

</head>
<body>

<div class="container mt-5">

<div class="row justify-content-center">

<div class="col-md-6">

<div class="card shadow p-4">

<h1 class="text-center mb-4">
📅 Book Appointment
</h1>

<form method="POST">

<label class="mb-2">Select Patient</label>

<select name="patient_id" class="form-control mb-3" required>

<option value="">Choose Patient</option>

<?php while($p = mysqli_fetch_assoc($patients)) { ?>

<option value="<?php echo $p['id']; ?>">

<?php echo $p['name']; ?>

</option>

<?php } ?>

</select>

<label class="mb-2">Select Doctor</label>

<select name="doctor_id" class="form-control mb-3" required>

<option value="">Choose Doctor</option>

<?php while($d = mysqli_fetch_assoc($doctors)) { ?>

<option value="<?php echo $d['id']; ?>">

<?php echo $d['name']; ?>

</option>

<?php } ?>

</select>

<label class="mb-2">Appointment Date</label>

<input type="date"
       name="appointment_date"
       class="form-control mb-4"
       required>

<button type="submit"
        name="submit"
        class="btn btn-primary w-100">

Book Appointment

</button>

</form>

<div class="text-center mt-4">

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