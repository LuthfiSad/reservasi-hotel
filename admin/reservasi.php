<?php
include "../model/koneksi.php";
include "../layout/headadmin.php";
include "../layout/navadmin.php";
include "../layout/sidebar.php";
if ($_SESSION['level'] !== 'Resep' && $_SESSION['level'] !== 'Admin') {
    echo "<script>alert('Halaman Ini hanya Untuk Resepsionis');
    location='index.php'</script>";
}
$day = date('d');
$month = date('m');
$year = date('Y');
error_reporting(0);
date_default_timezone_set('asia/jakarta');
?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Reservasi</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./">Home</a></li>
                        <li class="breadcrumb-item active">Data Reservasi</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="content">
        <div class="card">
            <div class="card-body">
                <div class="row pb-2">
                    <div class="col-md-10">
                        <form class="d-flex flex-lg-row flex-column" action="" method="post">
                            <div class="form-floating me-2 mb-2 flex-fill">
                                <input class="form-control" value="<?= $_POST['nama'] ?>" name="nama" type="search" id="nama">
                                <label for="nama">Cari Nama</label>
                            </div>
                            <div class="form-floating me-2 mb-2 flex-fill">
                                <input class="form-control" type="date" value="<?= $_POST['cekin'] ?>" name="cekin" id="cekin">
                                <label for="cekin">Cari Tgl Check In</label>
                            </div>
                            <div class="form-floating me-2 mb-2 flex-fill">
                                <select class="form-control" name="status" id="status">
                                    <option value="" selected>Pilih Status</option>
                                    <option value="1" <?= ($_POST['status'] == 1) ? "selected" : "" ?>>Pending</option>
                                    <option value="2" <?= ($_POST['status'] == 2) ? "selected" : "" ?>>Accept</option>
                                    <option value="3" <?= ($_POST['status'] == 3) ? "selected" : "" ?>>Reject</option>
                                </select>
                                <label for="status">Cari Status</label>
                            </div>
                            <button class="btn btn-outline-success me-2 mb-2" name="submit" type="submit">Search</button>
                        </form>
                    </div>
                </div>
                <div class="d-flex mb-2">
                    <form action="" method="post" class="me-2">
                        <input type="hidden" name="day" value="<?= $day ?>">
                        <button class="btn btn-outline-success" type="submit">Hari ini</button>
                    </form>
                    <form action="" method="post" class="me-2">
                        <input type="hidden" name="month" value="<?= $month ?>">
                        <button class="btn btn-outline-success" type="submit">Bulan ini</button>
                    </form>
                    <form action="" method="post" class="me-2">
                        <input type="hidden" name="year" value="<?= $year ?>">
                        <button class="btn btn-outline-success" type="submit">Tahun ini</button>
                    </form>
                </div>
                <table id="example1" class="table table-stripped table-bordered table-dark">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>No. Telp</th>
                            <th>Tipe</th>
                            <th>Jumlah</th>
                            <th>Tgl Check In</th>
                            <th>Tgl Check Out</th>
                            <th>Total Harga</th>
                            <th width="8%">Status</th>
                            <th width="12%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        if (isset($_POST['submit'])) {
                            $query = mysqli_query($koneksi, "SELECT * from reservasi where not status=4 and nama like '%$_POST[nama]%' and cekin like '%$_POST[cekin]%' and status like '%$_POST[status]%'");
                        } elseif (isset($_POST['day'])) {
                            $query = mysqli_query($koneksi, "SELECT * from reservasi where not status=4 and day(cekin) like '%$_POST[day]%' and year(cekin) like '$year'");
                        } elseif (isset($_POST['month'])) {
                            $query = mysqli_query($koneksi, "SELECT * from reservasi where not status=4 and month(cekin) = '$_POST[month]' and year(cekin) like '$year'");
                        } elseif (isset($_POST['year'])) {
                            $query = mysqli_query($koneksi, "SELECT * from reservasi where not status=4 and year(cekin) like '%$_POST[year]%'");
                        } else {
                            $query = mysqli_query($koneksi, "SELECT * from reservasi where not status=4");
                        }
                        while ($data = mysqli_fetch_assoc($query)) {
                            $kamar = mysqli_query($koneksi, "SELECT tipe from kamar where id_kamar='$data[id_kamar]'");
                            $data2 = mysqli_fetch_assoc($kamar);
                            $in = $data['cekin'];
                            $out = $data['cekout'];
                            $now = date('Y-m-d');
                            $sts = $data['status']
                        ?>
                            <tr>

                                <td><?= $no++ ?></td>
                                <td><?= $data['nama'] ?></td>
                                <td><?= $data['email'] ?></td>
                                <td>0<?= $data['telp'] ?></td>
                                <td><?= $data2['tipe'] ?></td>
                                <td><?= $data['jumlah'] ?></td>
                                <td><?= $data['cekin'] ?></td>
                                <td><?= $data['cekout'] ?></td>
                                <td>Rp. <?= $data['total'] ?></td>
                                <td>
                                    <?php
                                    if ($sts == 1) {
                                        if ($now <= $in) {
                                            echo "<p class='bg-warning text-center'>Pending!</p>";
                                        } else {
                                            mysqli_query($koneksi, "UPDATE reservasi set status=3 where id='$data[id]'");
                                        }
                                    } elseif ($sts == 2) {
                                        if ($now < $in) {
                                            echo "<p class='bg-warning text-center'>Wait!</p>";
                                        } elseif ($now >= $in && $now < $out) {
                                            echo "<p class='bg-info text-center'>Check In</p>";
                                        } elseif ($now == $out) {
                                            echo "<p class='bg-primary text-center'>Check Out</p>";
                                        } else {
                                            mysqli_query($koneksi, "UPDATE reservasi set status=4 where id='$data[id]'");
                                        }
                                    } elseif ($sts == 3) {
                                        echo "<p class='bg-danger text-center'>Reject</p>";
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    if ($sts == 1 && $now <= $in) {
                                    ?>
                                        <button onclick="if(confirm('Apakah Anda Ingin Menerima Data Ini')){location='controller/status.php?sts=1&id=<?= $data['id'] ?>'}" class="btn btn-sm btn-primary">Accept</button>
                                        <button onclick="if(confirm('Apakah Anda Ingin Membatalkan Data Ini')){location='controller/status.php?sts=2&id=<?= $data['id'] ?>'}" class="btn btn-sm btn-danger">Reject</button>
                                    <?php } elseif ($sts == 2 && $now < $in) { ?>
                                        <button onclick="if(confirm('Apakah Anda Ingin Membatalkan Data Ini')){location='controller/status.php?sts=2&id=<?= $data['id'] ?>'}" class="btn btn-sm btn-danger">Batal</button>
                                    <?php } elseif ($sts == 2 && $now == $out) { ?>
                                        <button onclick="if(confirm('Apakah Data Ini Sudah Selesai')){location='controller/status.php?sts=3&id=<?= $data['id'] ?>'}" class="btn btn-sm btn-success">Success</button>
                                    <?php } elseif ($sts == 3) { ?>
                                        <button onclick="if(confirm('Apakah Anda Ingin Menghapus Data Ini')){location='controller/status.php?sts=4&id=<?= $data['id'] ?>'}" class="btn btn-sm btn-danger">Hapus</button>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include "../layout/footadmin.php"; ?>