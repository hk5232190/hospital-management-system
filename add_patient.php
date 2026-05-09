<?php include 'auth.php'; ?>
<?php include 'db.php'; ?>

<?php

if(isset($_POST['submit'])){

    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];

    $query = "INSERT INTO patients(name, age, gender, phone)
              VALUES('$name', '$age', '$gender', '$phone')";

    if(mysqli_query($conn, $query)){

        echo "<script>alert('Patient Added Successfully');</script>";

    } else {

        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Add Patient</title>

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
🧑 Add Patient
</h1>

<form method="POST">

<label class="mb-2">Patient Name</label>

<input type="text"
       name="name"
       class="form-control mb-3"
       placeholder="Enter Patient Name"
       required>

<label class="mb-2">Age</label>

<input type="number"
       name="age"
       class="form-control mb-3"
       placeholder="Enter Age"
       required>

<label class="mb-2">Gender</label>

<select name="gender"
        class="form-control mb-3"
        required>

<option value="">Choose Gender</option>

<option>Male</option>
<option>Female</option>

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

Add Patient

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