<?php 
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.html");
}

include "Koneksi.php";

$query = "SELECT * FROM prodi";
$data = ambildata($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah mahasiswa</title>
</head>
<body>
    <h1>Tambah Data Mahasiswa</h1>
    <form action="tambahaksimahasiswa.php" method="post">
        <table>
            <tr>
                <td>NIM</td>
                <td><input type="text" name="NIM"></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="Nama"></td>
            </tr>
            <tr>
                <td>Tanggal Lahir</td>
                <td><input type="date" name="TanggalLahir"></td>
            </tr>
            <tr>
                <td>Telpon</td>
                <td><input type="text" name="Telp"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="email" name="Email"></td>
            </tr>
            <tr>
                <td>Prodi</td>
                <td><select name="Id">
                    <?php foreach($data as $d) : ?>
                    <option value="<?= $d["Id"] ?>"><?= $d["Nama"] ?></option>
                    <?php endforeach; ?>
                </select></td>
            </tr>
        </table>
        <a href="index.php">Kembali</a>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>