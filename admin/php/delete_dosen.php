<?php
include 'connect.php';

$nidn = $_GET['id'];

$check = mysqli_query($conn, "SELECT COUNT(*) as jumlahMahasiswa FROM tbmahasiswa WHERE nidn='$nidn'");
$row = mysqli_fetch_assoc($check);

if ($row['jumlahMahasiswa'] > 0) {
    echo "<script>alert('Tidak dapat menghapus dosen, Tolong hapus mahasiswa di dalamnya terlebih dahulu!'); window.location.href='../dosen_table.php';</script>";
} else {
    $delete = mysqli_query($conn, "DELETE FROM tbdosen WHERE nidn='$nidn'");

    if (!$delete) {
        echo "Error: " . mysqli_error($conn);
    } else {
        header("Location: ../dosen_table.php");
    }
}
?>