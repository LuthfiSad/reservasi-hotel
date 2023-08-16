<?php
include "koneksi.php";
$query = mysqli_query($koneksi, "SELECT * from crud where no_ujian='$_GET[id]'");
$data = mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post">
        <table>
            <tr>
                <td><label for="">No Ujian</label></td>
                <td><input type="number" value="<?= $data['no_ujian'] ?>" name="no" id=""></td>
            </tr>
            <tr>
                <td><label for="">Nama Siswa</label></td>
                <td><input type="text" value="<?= $data['nama_siswa'] ?>" name="nama" id=""></td>
            </tr>
            <tr>
                <td><label for="">Tempat Lahir</label></td>
                <td><input type="text" value="<?= $data['tempat'] ?>" name="tempat" id=""></td>
            </tr>
            <tr>
                <td><label for="">Tanggal Lahir</label></td>
                <td><input type="date" value="<?= $data['tanggal_lahir'] ?>" name="tanggal" id=""></td>
            </tr>
            <tr>
                <td><label for="">Kejuruan</label></td>
                <td><input type="text" value="<?= $data['kejuruan'] ?>" name="kejuruan" id=""></td>
            </tr>
            <tr>
                <td>
                    <button name="submit">Simpan</button>
                    <a href="index.php">Batal</a>
                </td>
            </tr>
        </table>
    </form>
</body>
<?php
if (isset($_POST['submit'])) {
    mysqli_query($koneksi, "UPDATE crud set no_ujian='$_POST[no]', nama_siswa='$_POST[nama]',tempat='$_POST[tempat]',tanggal_lahir='$_POST[tanggal]',kejuruan='$_POST[kejuruan]' where no_ujian='$_GET[id]'");
    header('location:index.php');
}
?>

</html>