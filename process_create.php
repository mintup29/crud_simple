<?php
include 'koneksi.php';

$entity = $_POST['entity'];

switch ($entity) {
    case 'patient':
        $table = 'patients';
        $fields = ['first_name', 'last_name', 'date_of_birth', 'gender', 'address', 'phone_number', 'email'];
        break;
    case 'doctor':
        $table = 'doctors';
        $fields = ['first_name', 'last_name', 'specialty', 'phone_number', 'email'];
        break;
    case 'appointment':
        $table = 'appointments';
        $fields = ['patient_id', 'doctor_id', 'appointment_date', 'reason'];
        break;
    case 'medication':
        $table = 'medications';
        $fields = ['medication_id', 'medication_name', 'description'];
        break;
    default:
        die("Invalid entity");
}

$data = array_map(fn($field) => "'".$conn->real_escape_string($_POST[$field])."'", $fields);
$columns = implode(", ", $fields);
$values = implode(", ", $data);

$sql = "INSERT INTO $table ($columns) VALUES ($values)";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Data berhasil ditambahkan.'); window.location.href = 'dashboard.php';</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
