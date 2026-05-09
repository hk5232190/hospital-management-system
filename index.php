<?php include 'auth.php'; ?>
<!DOCTYPE html>
<html>
<head>
   

    <title>Hospital Management System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
	    
    <style>
        
        <style>
/* your old CSS */

.card {
    padding: 20px;
}  
        body {
            margin: 0;
            font-family: Arial;
            background-color: #f4f6f9;
        }
        
        <style>
/* your old CSS */

.card {
    padding: 20px;
}

        /* Navbar */
        .navbar {
            background-color: #2c3e50;
            padding: 15px;
            color: white;
            font-size: 20px;
        }

        /* Container */
      .container {
    padding: 20px;
}


/* MOBILE FIX */
@media (max-width: 768px) {
    .stats-container {
        flex-direction: column;
    }
}

        /* Cards */
        .card {
    background: white;
    padding: 20px;
    margin: 10px 0;
    border-radius: 8px;
    box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
}

        a {
            text-decoration: none;
            color: #3498db;
        }

        a:hover {
            text-decoration: underline;
        }

        .btn {
    display: inline-block;
    margin: 5px 5px 0 0;
    padding: 10px 15px;
    background-color: #3498db;
    color: white;
    border-radius: 5px;
}

.btn:hover {
    background-color: #2980b9;
}
        /* Logout Button */
        .logout-btn {
            position: fixed;
            bottom: 20px;
            left: 20px;
            background-color: #e74c3c;
            color: white;
            padding: 10px 15px;
            border-radius: 5px;
        }
        
        
        
         
    </style>
</head>
<body>

<div class="navbar">
    🏥 Hospital Management System
</div>

<div class="container mt-4">
    
    <div class="row">

    <div class="col-md-4 mb-3">
        <div class="card p-3">
            <h4>👤 Patient Management</h4>
            <a href="add_patient.php" class="btn btn-primary mb-2">Add Patient</a>
            <a href="view_patients.php" class="btn btn-secondary">View Patients</a>
        </div>
    </div>

    <div class="col-md-4 mb-3">
        <div class="card p-3">
            <h4>👨‍⚕️ Doctor Management</h4>
            <a href="add_doctor.php" class="btn btn-primary mb-2">Add Doctor</a>
            <a href="view_doctors.php" class="btn btn-secondary">View Doctors</a>
        </div>
    </div>

    <div class="col-md-4 mb-3">
        <div class="card p-3">
            <h4>📅 Appointment</h4>
            <a href="add_appointment.php" class="btn btn-primary mb-2">Book Appointment</a>
            <a href="view_appointments.php" class="btn btn-secondary">View Appointments</a>
        </div>
    </div>
        
        <div class="col-md-4 mb-3">
        <div class="card p-3">
        <h4>💵 Billing Management</h4>
        <a href="add_bill.php" class="btn btn-primary mb-2">Add Bill</a>
        <a href="view_bills.php" class="btn btn-secondary">View Bills</a>

    </div>
</div>

</div>
<a href="logout.php" class="logout-btn">Logout</a>

</body>
</html>

   