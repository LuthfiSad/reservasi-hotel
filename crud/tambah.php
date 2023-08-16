<?php
include "koneksi.php";
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
                <td><input type="number" name="no" id=""></td>
            </tr>
            <tr>
                <td><label for="">Nama Siswa</label></td>
                <td><input type="text" name="nama" id=""></td>
            </tr>
            <tr>
                <td><label for="">Tempat Lahir</label></td>
                <td><input type="text" name="tempat" id=""></td>
            </tr>
            <tr>
                <td><label for="">Tanggal Lahir</label></td>
                <td><input type="date" name="tanggal" id=""></td>
            </tr>
            <tr>
                <td><label for="">Kejuruan</label></td>
                <td><input type="text" name="kejuruan" id=""></td>
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
    mysqli_query($koneksi, "INSERT into crud value ('$_POST[no]', '$_POST[nama]','$_POST[tempat]','$_POST[tanggal]','$_POST[kejuruan]')");
    header('location:index.php');
}
?>

</html>