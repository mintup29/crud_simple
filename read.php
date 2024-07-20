<?php
include 'koneksi.php';

$entity = $_GET['entity'] ?? 'patient';

switch ($entity) {
    case 'patient':
        $sql = "SELECT * FROM patients";
        $id_field = 'patient_id';
        $fields = ['first_name', 'last_name', 'date_of_birth', 'gender', 'address', 'phone_number', 'email'];
        break;
    case 'doctor':
        $sql = "SELECT * FROM doctors";
        $id_field = 'doctor_id';
        $fields = ['first_name', 'last_name', 'specialty', 'phone_number', 'email'];
        break;
    case 'appointment':
        $sql = "SELECT * FROM appointments";
        $id_field = 'appointment_id';
        $fields = ['patient_id', 'doctor_id', 'appointment_date', 'reason'];
        break;
    default:
        die("Invalid entity");
}

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr>";
    foreach ($fields as $field) {
        echo "<th>".ucfirst(str_replace('_', ' ', $field))."</th>";
    }
    echo "<th>Actions</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        foreach ($fields as $field) {
            echo "<td>".$row[$field]."</td>";
        }
        echo "<td class='action-buttons'>
                <a href='update_form.php?entity=$entity&id=".$row[$id_field]."'><button>Edit</button></a>
                <a href='delete.php?entity=$entity&id=".$row[$id_field]."' onclick='return confirm(\"Are you sure you want to delete this item?\");'><button>Delete</button></a>
              </td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>
