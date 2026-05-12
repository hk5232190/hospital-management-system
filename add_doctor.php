<?php include 'auth.php'; ?>
<?php include 'db.php'; ?>

<?php

if(isset($_POST['submit'])){

    $name = $_POST['name'];
    $specialization = $_POST['specialization'];
    $phone = $_POST['phone'];

    $query = "INSERT INTO doctors(name, specialization, phone)
              VALUES('$name', '$specialization', '$phone')";

    if(mysqli_query($conn, $query)){

        echo "<script>alert('Doctor Added Successfully');</script>";

    } else {

        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Add Doctor</title>

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
🧑‍⚕️ Add Doctor
</h1>

<form method="POST">

<label class="mb-2">Doctor Name</label>

<input type="text"
       name="name"
       class="form-control mb-3"
       placeholder="Enter Doctor Name"
       required>

<label class="mb-2">Specialization</label>

<select name="specialization" class="form-control mb-3" required>
    <option value="">Select Specialization</option>
    <option value="Cardiologist">Cardiologist (Heart)</option>
    <option value="Neurologist">Neurologist (Brain)</option>
    <option value="ENT Specialist">ENT Specialist</option>
    <option value="Dermatologist">Dermatologist (Skin)</option>
    <option value="Orthopedic">Orthopedic (Bones)</option>
    <option value="Pediatrician">Pediatrician (Children)</option>
    <option value="Gynecologist">Gynecologist</option>
    <option value="Liver Specialist">Liver Specialist</option>
    <option value="General Physician">General Physician</option>
</select>

<label class="mb-2">Phone</label>

<input type="text"
       name="phone"
       class="form-control mb-4"
       placeholder="Enter Phone Number"
       required>

<button type="submit"
        name="submit"
        class="btn btn-primary w-100">

Add Doctor

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
