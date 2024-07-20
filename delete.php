<?php
include 'koneksi.php';

$entity = $_GET['entity'];
$id = $_GET['id'];

switch ($entity) {
    case 'patient':
        $id_field = 'patient_id';
        $table = 'patients';
        break;
    case 'doctor':
        $id_field = 'doctor_id';
        $table = 'doctors';
        break;
    case 'appointment':
        $id_field = 'appointment_id';
        $table = 'appointments';
        break;
    case 'medication':
        $id_field = 'medication_id';
        $table = 'medications';
        break;
    default:
        die("Invalid entity");
}

if (isset($_GET['confirm']) && $_GET['confirm'] === 'yes') {

    $sql = "DELETE FROM $table WHERE $id_field = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        $message = "Record deleted successfully";
    } else {
        $message = "Error deleting record: " . $conn->error;
    }

    $stmt->close();
    $conn->close();

    header("Location: dashboard.php?message=" . urlencode($message));
    exit();
} else {
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Confirm Deletion</title>
        <script type="text/javascript">
            function confirmDeletion() {
                var confirmDelete = confirm("Are you sure you want to delete this record?");
                if (confirmDelete) {
                    window.location.href = "delete.php?entity=<?php echo urlencode($entity); ?>&id=<?php echo urlencode($id); ?>&confirm=yes";
                } else {
                    window.location.href = "dashboard.php";
                }
            }
        </script>
    </head>
    <body onload="confirmDeletion();">
        <p>Please wait while we process your request...</p>
    </body>
    </html>
    <?php
}
?>
