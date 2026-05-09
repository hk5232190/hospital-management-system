<?php
include 'db.php';

// Get doctor data
$id = $_GET['id'];
$query = "SELECT * FROM doctors WHERE id = $id";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

// Update doctor
if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $specialization = $_POST['specialization'];
    $phone = $_POST['phone'];

    $update_query = "UPDATE doctors SET 
        name='$name',
        specialization='$specialization',
        phone='$phone'
        WHERE id=$id";

    if (mysqli_query($conn, $update_query)) {
        header("Location: view_doctors.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Doctor</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<h2>Edit Doctor</h2>

<form method="POST">
    Name: <input type="text" name="name" value="<?php echo $row['name']; ?>" required><br><br>
    
    Specialization: <input type="text" name="specialization" value="<?php echo $row['specialization']; ?>"><br><br>
    
    Phone: <input type="text" name="phone" value="<?php echo $row['phone']; ?>"><br><br>

    <button type="submit" name="update">Update Doctor</button>
</form>

</body>
</html>