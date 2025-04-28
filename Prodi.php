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
    <title>SIMPADU POLIBAN</title>
</head>
<body>
    <h1>Data Prodi</h1>
<table border="1" cellspacing="0" cellpadding="5">
    <thead>
        <tr>
            <td>No</td>
            <td>Nama Prodi</td>
            <td>Kaprodi</td>
            <td>Jurusan</td>
        </tr>
    </thead>

    <tbody>
      <?php
      $i = 1;
      foreach($data as $d) : ?>

        <tr>
            <td><?= $i++; ?></td>
            <td><?= $d["Nama"] ?></td>
            <td><?= $d["Kaprodi"] ?></td>
            <td><?= $d["Jurusan"] ?></td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>
</body>
</html>