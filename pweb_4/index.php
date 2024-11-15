<?php
include_once('../db/database.php');
$db = new Database();

$sql = "SELECT * FROM mahasiswa";
$result = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="../style/style.css">
</head>
<body>
    <h2>Data Mahasiswa</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Program Studi</th>
        </tr>
        <?php foreach ($result as $row): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['nim']; ?></td>
            <td><?php echo $row['nama']; ?></td>
            <td><?php echo $row['jk'] == 'L' ? 'Laki-laki' : 'Perempuan'; ?></td>
            <td><?php echo $row['prodi']; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
