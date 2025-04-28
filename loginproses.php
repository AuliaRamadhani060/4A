<?php
session_start();
include 'koneksi.php';

$nim = $_POST["NIM"];
$password = $_POST["Password"];

$query = "SELECT * FROM mahasiswa WHERE NIM='$nim'";
$hasil = mysqli_query($conn, $query);

$data = mysqli_fetch_assoc($hasil);

if (password_verify($password, $data['Password'])) {
    $_SESSION['login'] = true;
    header("Location: index.php");
}else {
    header("Location: login.html");
}

?>