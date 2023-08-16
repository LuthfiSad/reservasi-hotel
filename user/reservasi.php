<?php
include "../model/koneksi.php";
include "../layout/header.php";
$kamar = mysqli_query($koneksi, "SELECT * from kamar");
$now = date('Y-m-d')
?>
<style>
    body {
        background-image: url('../img/hotel (1).png');
        background-size: 100%;
    }

    @media print {

        .container,
        .modal-header,
        .modal-footer {
            display: none;
        }

        table {
            margin-bottom: 48px;
        }

        h1.block {
            display: block;
        }
    }

    .block {
        display: none;
    }
</style>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-7 position-absolute start-50 top-50 translate-middle">
                <div class="card">
                    <div class="card-body">
                        <a href="kamar.php"><button type="button" class="btn-sm bg-danger btn-close" aria-label="Close"></button></a>
                        <h1 class="text-center mb-3">Pesan Sekarang</h1>
                        <form action="" method="post">
                            <div class="row">
                                <div class="col-md">
                                    <div class="form-floating mb-3">
                                        <select class="form-control" required name="tipe" id="tipe">
                                            <option value="" selected disabled>Pilih Tipe</option>
                                            <?php
                                            $query = mysqli_query($koneksi, "SELECT id_kamar, tipe from kamar");
                                            while ($data = mysqli_fetch_assoc($query)) {
                                            ?>
                                                <option value="<?= $data['id_kamar']  ?>"><?= $data['tipe'] ?></option>
                                            <?php } ?>
                                        </select>
                                        <label for="tipe">Tipe Kamar</label>
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-floating mb-3">
                                        <select class="form-control" name="jumlah" required id="jumlah">
                                            <option value="" disabled selected>Pilih Jumlah</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                        <label for="jumlah">Jumlah Pesan Kamar</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" maxlength="30" id="nama" name="nama" required placeholder="nama">
                                <label for="nama">Nama Lengkap</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" maxlength="40" id="email" name="email" required placeholder="email">
                                <label for="email">Email</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" minlength="10" value="0" id="telp" required name="telp" placeholder="telp">
                                <label for="telp">No. Telp</label>
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <div class="form-floating mb-3">
                                        <input type="date" min="<?= $now ?>" class="form-control" id="cekin" required name="cekin">
                                        <label for="cekin">Tanggal Check In</label>
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-floating mb-3">
                                        <div class="form-floating mb-3">
                                            <input type="date" min="<?= $now ?>" class="form-control" id="cekout" required name="cekout">
                                            <label for="cekout">Tanggal Check Out</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md mb-2">
                                    <button name="cek" class="w-100 btn-sm btn btn-primary">Pesan</button>
                                </div>
                                <div class="col-md">
                                    <button type="reset" class="w-100 btn-sm btn btn-warning">Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    if (isset($_POST['cek'])) {
        $tipe = mysqli_query($koneksi, "SELECT harga, jumlah, tipe from kamar where id_kamar='$_POST[tipe]'");
        $cek = mysqli_fetch_assoc($tipe);
        if ($cek['jumlah'] <= $_POST['jumlah']) {
            echo "<script>alert('Jumlah Kamar Hanya Tersisa " . $cek['jumlah'] . " ,Pesan Sesuai Jumlah Kamar');
            location='reservasi.php'</script>";
        }
        if ($_POST['cekout'] < $_POST['cekin']) {
            echo "<script>alert('Data Cekout Harus Sebelum Data Check In');
            location='reservasi.php'</script>";
        }
        $nama = htmlspecialchars($_POST['nama']);
        $cekin = new DateTime($_POST['cekin']);
        $cekout = new DateTime($_POST['cekout']);
        $day = $cekout->diff($cekin)->days + 1;
        $total = $_POST['jumlah'] * $cek['harga'] * $day;
    ?>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title">Konfirmasi Perpesanan</h5>
                    <a href="reservasi.php">
                        <button type="button" class="btn-close"></button>
                    </a>
                </div>
                <h1 class="text-danger pt-4 block text-center">Hotel Me</h1>
                <form action="" method="post">
                    <div class="modal-body">
                        <table>
                            <input type="hidden" name="nama" value="<?= $nama ?>">
                            <input type="hidden" name="email" value="<?= $_POST['email'] ?>">
                            <input type="hidden" name="telp" value="<?= $_POST['telp'] ?>">
                            <input type="hidden" name="tipe" value="<?= $_POST['tipe'] ?>">
                            <input type="hidden" name="jumlah" value="<?= $_POST['jumlah'] ?>">
                            <input type="hidden" name="cekin" value="<?= $_POST['cekin'] ?>">
                            <input type="hidden" name="cekout" value="<?= $_POST['cekout'] ?>">
                            <input type="hidden" name="total" value="<?= $total ?>">
                            <input type="hidden" name="status" value="1">
                            <tr>
                                <td width="50%">Nama</td>
                                <td>:</td>
                                <td><?= $nama ?></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>:</td>
                                <td><?= $_POST['email'] ?></td>
                            </tr>
                            <tr>
                                <td>No. Telp</td>
                                <td>:</td>
                                <td><?= $_POST['telp'] ?></td>
                            </tr>
                            <tr>
                                <td>Tipe Kamar</td>
                                <td>:</td>
                                <td><?= $cek['tipe'] ?></td>
                            </tr>
                            <tr>
                                <td>Jumlah Kamar</td>
                                <td>:</td>
                                <td><?= $_POST['jumlah'] ?></td>
                            </tr>
                            <tr>
                                <td>Tanggal Check In</td>
                                <td>:</td>
                                <td><?= $_POST['cekin'] ?></td>
                            </tr>
                            <tr>
                                <td>Tanggal Check Out</td>
                                <td>:</td>
                                <td><?= $_POST['cekout'] ?></td>
                            </tr>
                            <tr>
                                <td>Harga Kamar</td>
                                <td>:</td>
                                <td><?= "Rp. " . $cek['harga'] ?></td>
                            </tr>
                            <tr>
                                <td>Total Harga</td>
                                <td>:</td>
                                <td><?= "Rp. " . $total ?></td>
                            </tr>
                            <tr>
                                <td>Total Hari</td>
                                <td>:</td>
                                <td><?= $day . " Hari" ?></td>
                            </tr>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <a href="reservasi.php">
                            <button type="button" class="btn btn-secondary">Close</button>
                        </a>
                        <button type="submit" name="submit" onclick="window.print()" class="btn btn-success">Pesan</button>
                    </div>
                </form>
            </div>
        </div>
    <?php
    }
    if (isset($_POST['submit'])) {
        $nama = htmlspecialchars($_POST['nama']);
        $query = mysqli_query($koneksi, "INSERT into reservasi value ('', '$nama', '$_POST[email]', '$_POST[telp]', '$_POST[tipe]', '$_POST[jumlah]', '$_POST[cekin]', '$_POST[cekout]', '$_POST[total]', '$_POST[status]')");
        if ($query) {
            echo "<script>alert('Terima Kasih');location='index.php'</script>";
        } else {
            echo "<script>alert('Gagal Perpesanan Data');location='index.php'</script>";
        }
    }
    include "../layout/footer.php";
    ?>