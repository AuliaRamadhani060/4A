<?php
include 'koneksi.php'; 

$nim = $_GET['NIM'];

$query = "SELECT * FROM prodi";
$data = ambildata($query);


$mahasiswaquery = "SELECT * FROM mahasiswa WHERE NIM = '$nim'";
$datamahasiswa = ambildata($mahasiswaquery);
$datamahasiswa = $datamahasiswa[0];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mahasiswa</title>
</head>
<body>
    <h2>Edit Mahasiswa</h2>
    <form action="editaksimahasiswa.php" method="POST">
        <table>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="Nama" required value="<?php echo $datamahasiswa['Nama']; ?>"></td>
            </tr>
            
            <tr>
                <td>Tanggal Lahir</td>
                <td><input type="date" name="TanggalLahir" required value="<?php echo $datamahasiswa['TanggalLahir']; ?>"></td>
            </tr>

            <tr>
                <td>Telp</td>
                <td><input type="text" name="Telp" required value="<?php echo $datamahasiswa['Telp']; ?>"></td>
            </tr>

            <tr>
                <td>Email</td>
                <td><input type="email" name="Email" required value="<?php echo $datamahasiswa['Email']; ?>"></td>
            </tr>

            <tr>
                <td>Prodi</td>
                <td><select name="Id" >
                    <?php foreach($data as $d) : ?>
                    <option value="<?= $d["Id"] ?>" 
                    <?=$d["Id"] == $datamahasiswa['Id'] ? "selected" :  ""; ?>>
                    <?= $d["Nama"] ?></option>
                    <?php endforeach; ?>
                </select></td>
            </tr>
        </table>
        <input type="hidden" name="NIM" value="<?php echo $datamahasiswa['NIM']; ?>">
        <a href="index.php">Kembali</a>
        <button type="submit" name="update">Update</button>
    </form>
</body>
</html>