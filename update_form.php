<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Form</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div class="header">
    <h1>Data Rumah Sakit</h1>
</div>
<div class="container1">
    <div class="column-1">
        <center><a href="logout.php"><button>LOGOUT</button></a></center>
    </div>

    <div class="column-2">
        <h2>Update Form</h2>
        <form method="post" action="process_update.php">
            <input type="hidden" name="entity" value="<?php echo htmlspecialchars($_GET['entity']); ?>">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($_GET['id']); ?>">

            <?php
            include 'koneksi.php';

            $entity = $_GET['entity'];
            $id = $_GET['id'];

            switch ($entity) {
                case 'patient':
                    $table = 'patients';
                    $id_field = 'patient_id';
                    $fields = ['first_name', 'last_name', 'date_of_birth', 'gender', 'address', 'phone_number', 'email'];
                    break;
                case 'doctor':
                    $table = 'doctors';
                    $id_field = 'doctor_id';
                    $fields = ['first_name', 'last_name', 'specialty', 'phone_number', 'email'];
                    break;
                case 'appointment':
                    $table = 'appointments';
                    $id_field = 'appointment_id';
                    $fields = ['patient_id', 'doctor_id', 'appointment_date', 'reason'];

                    $patients = $conn->query("SELECT patient_id, CONCAT(first_name, ' ', last_name) AS name FROM patients")->fetch_all(MYSQLI_ASSOC);
                    $doctors = $conn->query("SELECT doctor_id, CONCAT(first_name, ' ', last_name) AS name FROM doctors")->fetch_all(MYSQLI_ASSOC);
                    break;
                case 'medication':
                    $table = 'medications';
                    $id_field = 'medication_id';
                    $fields = ['medication_name', 'description'];
                    break;
                default:
                    die("Invalid entity");
            }

            $sql = "SELECT * FROM $table WHERE $id_field = '$id'";
            $result = $conn->query($sql);
            $data = $result->fetch_assoc();

            foreach ($fields as $field) {
                if ($field === 'patient_id') {
                    echo '<label for="patient_id">Patient:</label>
                          <select id="patient_id" name="patient_id">';
                    foreach ($patients as $patient) {
                        echo '<option value="' . htmlspecialchars($patient['patient_id']) . '"' . ($data[$field] == $patient['patient_id'] ? ' selected' : '') . '>' . htmlspecialchars($patient['name']) . '</option>';
                    }
                    echo '</select><br><br>';
                } elseif ($field === 'doctor_id') {
                    echo '<label for="doctor_id">Doctor:</label>
                          <select id="doctor_id" name="doctor_id">';
                    foreach ($doctors as $doctor) {
                        echo '<option value="' . htmlspecialchars($doctor['doctor_id']) . '"' . ($data[$field] == $doctor['doctor_id'] ? ' selected' : '') . '>' . htmlspecialchars($doctor['name']) . '</option>';
                    }
                    echo '</select><br><br>';
                } elseif ($field === 'gender') {
                    $gender_options = ['Male' => 'Male', 'Female' => 'Female'];
                    echo '<label for="gender">Gender:</label>
                          <select id="gender" name="gender">';
                    foreach ($gender_options as $value => $label) {
                        echo '<option value="' . htmlspecialchars($value) . '"' . ($data[$field] == $value ? ' selected' : '') . '>' . htmlspecialchars($label) . '</option>';
                    }
                    echo '</select><br><br>';
                } else {
                    $label = ucfirst(str_replace('_', ' ', $field));
                    $value = htmlspecialchars($data[$field]);
                    echo "<label for='$field'>$label:</label>
                          <input type='text' id='$field' name='$field' value='$value'><br><br>";
                }
            }

            $conn->close();
            ?>

            <input type="submit" value="Submit">
        </form>
    </div>
</div>

<div class="footer">
    <p>LAB KOM 2024</p>
</div>
</body>
</html>
