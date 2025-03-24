<?php
include "Koneksi.php";


$query = "SELECT * FROM mahasiswa";
$data = ambildata($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMPADU POLIBAN </title>
</head>

<body>
    <H1>DATA MAHASISWA</H1>
    <br>
    <a href="TambahMahasiswa.php">Tambah</a>
    <table border="1" cellspacing="0" cellpadding="5">
        <thead>
            <tr>
                <td>No</td>
                <td>NIM</td>
                <td>Nama</td>
                <td>Tanggal lahir</td>
                <td>Telpon</td>
                <td>Email</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>

        <?php 
        $i=1;
        foreach($data as $d) : ?>


            <tr>
                <td><?php echo $i++; ?></td>
                <td> <?= $d["NIM"] ?></td>
                <td><?= $d["Nama"] ?></td>
                <td><?= $d["TanggalLahir"] ?></td>
                <td><?= $d["Telp"] ?></td>
                <td><?= $d["Email"] ?></td>
                <td>
                    <a href="editmahasiswa.php?NIM=<?= $d["NIM"] ?>">Edit</a>
                    <a href="hapusmahasiswa.php?NIM=<?= $d["NIM"] ?>">Hapus</a>
                </td>
            </tr>

        <?php endforeach; ?>

        </tbody>
    </table>
</body>
</html>