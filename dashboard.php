<?php
include 'koneksi.php';

$patients_count = $conn->query("SELECT COUNT(*) AS count FROM patients")->fetch_assoc()['count'];
$doctors_count = $conn->query("SELECT COUNT(*) AS count FROM doctors")->fetch_assoc()['count'];
$appointments_count = $conn->query("SELECT COUNT(*) AS count FROM appointments")->fetch_assoc()['count'];
$medications_count = $conn->query("SELECT COUNT(*) AS count FROM medications")->fetch_assoc()['count'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="node_modules\admin-lte\plugins\fontawesome-free\css\all.min.css">
    <link rel="stylesheet" href="node_modules\admin-lte\dist\css\adminlte.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <?php include 'navbar.php'; ?>
    <?php include 'sidebar.php'; ?>
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3><?php echo $patients_count; ?></h3>
                                <p>Patients</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <a href="crud_patients.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3><?php echo $doctors_count; ?></h3>
                                <p>Doctors</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-user-md"></i>
                            </div>
                            <a href="crud_doctors.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3><?php echo $appointments_count; ?></h3>
                                <p>Appointments</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-calendar-check"></i>
                            </div>
                            <a href="crud_appointments.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3><?php echo $medications_count; ?></h3>
                                <p>Medications</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-notes-medical"></i>
                            </div>
                            <a href="crud_medications.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <?php include 'footer.php'; ?>
</div>
<script src="node_modules\admin-lte\dist\css\adminlte.min.css"></script>
<script src="node_modules\admin-lte\plugins\bootstrap\js\bootstrap.bundle.min.js"></script>
<script src="node_modules\admin-lte\dist\js\adminlte.min.js"></script>
</body>
</html>
