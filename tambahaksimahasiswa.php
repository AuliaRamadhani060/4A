<?php 
include "Koneksi.php";


$NIM = $_POST['NIM'];
$Nama = $_POST['Nama'];
$TanggalLahir = $_POST['TanggalLahir'];
$Telp = $_POST['Telp'];
$Email = $_POST['Email'];
$Id = $_POST['Id'];

$query = "INSERT INTO mahasiswa (NIM, Nama, TanggalLahir, Telp, Email, Id) VALUES ('$NIM', '$Nama', '$TanggalLahir', '$Telp', '$Email', '$Id')";


mysqli_query($conn, $query);
header("Location: index.php");
?>