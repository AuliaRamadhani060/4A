<?php 
include "Koneksi.php";


$NIM = $_POST['NIM'];
$Nama = $_POST['Nama'];
$TanggalLahir = $_POST['TanggalLahir'];
$Telp = $_POST['Telp'];
$Email = $_POST['Email'];
$Id = $_POST['Id'];

$query = "UPDATE mahasiswa SET Nama = '$Nama', TanggalLahir = '$TanggalLahir', Telp = '$Telp', Email = '$Email', Id = '$Id' WHERE NIM = '$NIM'";
mysqli_query($conn, $query);

header("Location: index.php");
?>