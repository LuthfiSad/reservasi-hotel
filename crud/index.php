<?php
include "koneksi.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <a href="tambah.php">Tambah Data</a>
    <table>
        <tr>
            <td>No Ujian</td>
            <td>Nama Siswa</td>
            <td>Tempat, Tanggal Lahir</td>
            <td>Kejuruan</td>
            <td>Aksi</td>
        </tr>
        <?php
        $query = mysqli_query($koneksi, "SELECT * from crud");
        while ($data = mysqli_fetch_assoc($query)) {
        ?>
            <tr>
                <td><?= $data['no_ujian'] ?></td>
                <td><?= $data['nama_siswa'] ?></td>
                <td><?= $data['tempat'] . ", " . $data['tanggal_lahir'] ?></td>
                <td><?= $data['kejuruan'] ?></td>
                <td>
                    <a href="edit.php?id=<?= $data['no_ujian'] ?>">edit</a>
                    <a href="hapus.php?id=<?= $data['no_ujian'] ?>">hapus</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>

</html>