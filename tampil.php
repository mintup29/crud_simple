<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Management</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        .action-buttons {
            display: flex;
            gap: 10px;
        }
    </style>
</head>
<body>
<div class="header">
        <h1>Data Rumah Sakit</h1>
    </div>
    <div class="container1">
        <div class="column-1">
            <center> <a href="logout.php"><button>LOGOUT</button></a></center>
        
           </div>
        
        <div class="column-2">
        <h2>Data Management</h2>
    
        <h3>Patients</h3>
        <?php
        $_GET['entity'] = 'patient';
        include 'read.php';
        ?>
        <a href="create_form.php?entity=patient"><button>Add Patient</button></a>
    
        <h3>Doctors</h3>
        <?php
        $_GET['entity'] = 'doctor';
        include 'read.php';
        ?>
        <a href="create_form.php?entity=doctor"><button>Add Doctor</button></a>
    
        <h3>Appointments</h3>
        <?php
        $_GET['entity'] = 'appointment';
        include 'read.php';
        ?>
        <a href="create_form.php?entity=appointment"><button>Add Appointment</button></a>
    </div>
    </div>

    <div class="footer">
        <p>LAB KOM 2024</p>
    </div>
    
</body>
</html>
