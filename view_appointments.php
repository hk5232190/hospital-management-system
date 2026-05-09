<?php include 'auth.php'; ?>
<?php include 'db.php'; ?>

<?php
$query = "SELECT 
            appointments.id,
            patients.name AS patient_name,
            doctors.name AS doctor_name,
            appointments.appointment_date
          FROM appointments
          JOIN patients ON appointments.patient_id = patients.id
          JOIN doctors ON appointments.doctor_id = doctors.id";

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Appointments</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">

    <h2 class="text-center mb-4">All Appointments</h2>

    <div class="mb-3 text-center">
        <a href="add_appointment.php" class="btn btn-primary">➕ Book Appointment</a>
        <a href="index.php" class="btn btn-secondary">🏠 Dashboard</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped text-center">
            <tr>
                <th>ID</th>
                <th>Patient</th>
                <th>Doctor</th>
                <th>Date</th>
                <th>Action</th>
            </tr>

            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['patient_name']; ?></td>
                <td><?php echo $row['doctor_name']; ?></td>
                <td><?php echo $row['appointment_date']; ?></td>
                <td>

<a href="edit_appointment.php?id=<?php echo $row['id']; ?>" 
   class="btn btn-warning btn-sm">
   Edit
</a>

<a href="delete_appointment.php?id=<?php echo $row['id']; ?>" 
   class="btn btn-danger btn-sm"
   onclick="return confirm('Delete this appointment?')">

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