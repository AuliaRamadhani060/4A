<?php 
include "Koneksi.php";


$NIM = $_POST['NIM'];
$Nama = $_POST['Nama'];
$TanggalLahir = $_POST['TanggalLahir'];
$Telp = $_POST['Telp'];
$Email = $_POST['Email'];
$Id = $_POST['Id'];
$password = $_POST['Password'];
$namafile = $_FILES['foto']['name'];
$tmpname = $_FILES['foto']['tmp_name'];

$ekstensifoto = explode('.', $namafile);
$ekstensifoto = strtolower(end($ekstensifoto));

$namaFileBaru = $NIM;
$namaFileBaru .= '.';
$namaFileBaru .= $ekstensifoto;

move_uploaded_file($tmpname, 'assets/img/' . $namaFileBaru);

$Password = password_hash($password, PASSWORD_DEFAULT);

$query = "INSERT INTO mahasiswa (NIM, Nama, TanggalLahir, Telp, Email, Password, foto, Id) VALUES ('$NIM', '$Nama', '$TanggalLahir', '$Telp', '$Email', '$Password', '$namaFileBaru', '$Id')";

mysqli_query($conn, $query);
header("Location: index.php");
?>
