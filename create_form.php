<?php
include 'koneksi.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Form</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div class="header">
    <h2>Create Form</h2>
</div>
<div class="container1">
    <div class="column-1">
        <center><a href="logout.php"><button>LOGOUT</button></a></center>
    </div>

    <div class="column-2">
        <form method="post" action="process_create.php">
            <input type="hidden" name="entity" value="<?php echo htmlspecialchars($_GET['entity']); ?>">

            <?php
            $entity = $_GET['entity'];

            switch ($entity) {
                case 'patient':
                    echo '<label for="first_name">First Name:</label>
                          <input type="text" id="first_name" name="first_name"><br><br>
                          <label for="last_name">Last Name:</label>
                          <input type="text" id="last_name" name="last_name"><br><br>
                          <label for="date_of_birth">Date of Birth:</label>
                          <input type="date" id="date_of_birth" name="date_of_birth"><br><br>
                          <label for="gender">Gender:</label>
                          <select id="gender" name="gender">
                              <option value="Male">Male</option>
                              <option value="Female">Female</option>
                          </select><br><br>
                          <label for="address">Address:</label>
                          <input type="text" id="address" name="address"><br><br>
                          <label for="phone_number">Phone Number:</label>
                          <input type="text" id="phone_number" name="phone_number"><br><br>
                          <label for="email">Email:</label>
                          <input type="email" id="email" name="email"><br><br>';
                    break;

                case 'doctor':
                    echo '<label for="first_name">First Name:</label>
                          <input type="text" id="doctor_first_name" name="first_name"><br><br>
                          <label for="last_name">Last Name:</label>
                          <input type="text" id="doctor_last_name" name="last_name"><br><br>
                          <label for="specialty">Specialty:</label>
                          <input type="text" id="specialty" name="specialty"><br><br>
                          <label for="phone_number">Phone Number:</label>
                          <input type="text" id="doctor_phone_number" name="phone_number"><br><br>
                          <label for="email">Email:</label>
                          <input type="email" id="doctor_email" name="email"><br><br>';
                    break;

                case 'appointment':
                
                    $result = $conn->query("SELECT patient_id, CONCAT(first_name, ' ', last_name) AS name FROM patients");
                    $patients = $result->fetch_all(MYSQLI_ASSOC);

                    $result = $conn->query("SELECT doctor_id, CONCAT(first_name, ' ', last_name) AS name FROM doctors");
                    $doctors = $result->fetch_all(MYSQLI_ASSOC);

                    echo '<label for="patient_id">Patient:</label>
                          <select id="patient_id" name="patient_id">';
                    foreach ($patients as $patient) {
                        echo '<option value="' . htmlspecialchars($patient['patient_id']) . '">' . htmlspecialchars($patient['name']) . '</option>';
                    }
                    echo '</select><br><br>';

                    echo '<label for="doctor_id">Doctor:</label>
                          <select id="doctor_id" name="doctor_id">';
                    foreach ($doctors as $doctor) {
                        echo '<option value="' . htmlspecialchars($doctor['doctor_id']) . '">' . htmlspecialchars($doctor['name']) . '</option>';
                    }
                    echo '</select><br><br>';

                    echo '<label for="appointment_date">Appointment Date:</label>
                          <input type="datetime-local" id="appointment_date" name="appointment_date"><br><br>
                          <label for="reason">Reason:</label>
                          <input type="text" id="reason" name="reason"><br><br>';
                    break;

                case 'medication':
                    echo '<label for="medication_name">Medication Name:</label>
                          <input type="text" id="medication_name" name="medication_name"><br><br>
                          <label for="description">Description:</label>
                          <input type="text" id="description" name="description"><br><br>';
                    break;

                default:
                    die("Invalid entity");
            }
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
