<?php
$nim = $_GET['NIM'];

$query = "SELECT * FROM mahasiswa WHERE NIM = '$nim'";
$result = mysqli_query($conn, $query);
$mahasiswa = mysqli_fetch_assoc($result);

if (isset($_POST['update'])) {
    $nama = $_POST['Nama'];
    $TanggalLahir = $_POST['TanggalLahir'];
    $Telp = $_POST['Telp'];
    $Email = $_POST['Email'];
    $id = $_POST['Id'];

    $query = "UPDATE mahasiswa SET Nama = '$nama', TanggalLahir = '$TanggalLahir', Telp = '$Telp', Email = '$Email', Id = '$id' WHERE NIM = '$nim'";
    mysqli_query($conn, $query);

    header('Location: index.php');
}
?>