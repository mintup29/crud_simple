<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Appointments</title>
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
                        <h1 class="m-0">Manage Appointments</h1>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Appointments List</h3>
                                <div class="card-tools">
                                    <a href="create_form.php?entity=appointment" class="btn btn-success">Add New Appointment</a>
                                </div>
                            </div>
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>Patient Name</th>
                                            <th>Doctor Name</th>
                                            <th>Appointment Date</th>
                                            <th>Reason</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $result = $conn->query("SELECT appointments.*, patients.first_name AS patient_first_name, patients.last_name AS patient_last_name, doctors.first_name AS doctor_first_name, doctors.last_name AS doctor_last_name
                                                                FROM appointments 
                                                                JOIN patients ON appointments.patient_id = patients.patient_id 
                                                                JOIN doctors ON appointments.doctor_id = doctors.doctor_id");
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<tr>
                                                    <td>{$row['patient_first_name']} {$row['patient_last_name']}</td>
                                                    <td>{$row['doctor_first_name']} {$row['doctor_last_name']}</td>
                                                    <td>{$row['appointment_date']}</td>
                                                    <td>{$row['reason']}</td>
                                                    <td>
                                                        <a href='update_form.php?entity=appointment&id={$row['appointment_id']}' class='btn btn-primary'>Edit</a> 
                                                        <a href='delete.php?entity=appointment&id={$row['appointment_id']}' class='btn btn-danger'>Delete</a>
                                                    </td>
                                                </tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
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
