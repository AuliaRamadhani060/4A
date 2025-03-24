<?php
include 'koneksi.php'; 

$nim = $_GET['NIM'];

$query = "DELETE FROM mahasiswa WHERE NIM = '$nim'";
mysqli_query($conn, $query);

header('Location: index.php');
?>