<?php
include 'koneksi.php';

$entity = $_POST['entity'];

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
        break;
    case 'medication':
        $table = 'medications';
        $id_field = 'medication_id';
        $fields = ['medication_name', 'description'];
        break;
    default:
        die("Invalid entity");
}

$id_value = $conn->real_escape_string($_POST['id']);
$updates = array_map(fn($field) => "$field = '".$conn->real_escape_string($_POST[$field])."'", $fields);
$sql = "UPDATE $table SET ".implode(", ", $updates)." WHERE $id_field = '$id_value'";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Data berhasil diupdate.'); window.location.href = 'dashboard.php';</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
