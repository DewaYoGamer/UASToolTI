<?php
include 'connect.php';

$nim = $_GET['id'];

$delete = mysqli_query($conn, "DELETE FROM tbmahasiswa WHERE nim='$nim'");

if (!$delete) {
    echo "Error: " . mysqli_error($conn);
} else {
    header("Location: ../mahasiswa_table.php");
}
?>