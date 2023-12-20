<?php
include 'connect.php';

$idKelas = $_GET['id'];

$check = mysqli_query($conn, "SELECT COUNT(*) as jumlahMahasiswa FROM tbmahasiswa WHERE idKelas='$idKelas'");
$row = mysqli_fetch_assoc($check);

if ($row['jumlahMahasiswa'] > 0) {
    echo "<script>alert('Tidak dapat menghapus kelas, Tolong hapus mahasiswa di dalamnya terlebih dahulu!'); window.location.href='../kelas_table.php';</script>";
} else {
    $delete = mysqli_query($conn, "DELETE FROM tbkelas WHERE idKelas='$idKelas'");

    if (!$delete) {
        echo "Error: " . mysqli_error($conn);
    } else {
        header("Location: ../kelas_table.php");
    }
}
?>