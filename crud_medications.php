<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Medications</title>
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
                        <h1 class="m-0">Manage Medications</h1>
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
                                <h3 class="card-title">Medications List</h3>
                                <div class="card-tools">
                                    <a href="create_form.php?entity=medication" class="btn btn-success">Add New Medication</a>
                                </div>
                            </div>
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>Medication Name</th>
                                            <th>Description</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $result = $conn->query("SELECT * FROM medications");
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<tr>
                                                    <td>{$row['medication_name']}</td>
                                                    <td>{$row['description']}</td>
                                                    <td>
                                                        <a href='update_form.php?entity=medication&id={$row['medication_id']}' class='btn btn-primary'>Edit</a>
                                                        <a href='delete.php?entity=medication&id={$row['medication_id']}' class='btn btn-danger'>Delete</a>
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
