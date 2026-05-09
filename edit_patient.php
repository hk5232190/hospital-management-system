<?php
include 'db.php';

// Get patient data by ID
$id = $_GET['id'];
$query = "SELECT * FROM patients WHERE id = $id";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

// Update data
if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];

    $update_query = "UPDATE patients SET 
        name='$name',
        age='$age',
        gender='$gender',
        phone='$phone'
        WHERE id=$id";

    if (mysqli_query($conn, $update_query)) {
        header("Location: view_patients.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Patient</title>
</head>
<body>

<h2>Edit Patient</h2>

<form method="POST">
    Name: <input type="text" name="name" value="<?php echo $row['name']; ?>" required><br><br>
    
    Age: <input type="number" name="age" value="<?php echo $row['age']; ?>"><br><br>
    
    Gender:
    <select name="gender">
        <option <?php if($row['gender']=="Male") echo "selected"; ?>>Male</option>
        <option <?php if($row['gender']=="Female") echo "selected"; ?>>Female</option>
    </select><br><br>
    
    Phone: <input type="text" name="phone" value="<?php echo $row['phone']; ?>"><br><br>

    <button type="submit" name="update">Update Patient</button>
</form>

</body>
</html>