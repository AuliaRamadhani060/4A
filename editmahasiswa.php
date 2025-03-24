<?php
include 'koneksi.php'; 
include 'ambildata.php';

$query = "SELECT * FROM prodi";
$data = ambildata($query);
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
    <form method="POST">
        <table>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="Nama" value="<?php echo $mahasiswa['Nama']; ?>" required></td>
            </tr>
            
            <tr>
                <td>Tanggal Lahir</td>
                <td><input type="date" name="TanggalLahir" value="<?php echo $mahasiswa['TanggalLahir']; ?>" required></td>
            </tr>

            <tr>
                <td>Telp</td>
                <td><input type="text" name="Telp" value="<?php echo $mahasiswa['Telp']; ?>" required></td>
            </tr>

            <tr>
                <td>Email</td>
                <td><input type="email" name="Email" value="<?php echo $mahasiswa['Email']; ?>" required></td>
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
        <button type="submit" name="update">Update</button>
    </form>

    
</body>
</html>