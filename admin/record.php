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
                    <h1 class="m-0">Data Record</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./">Home</a></li>
                        <li class="breadcrumb-item active">Data Record</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="content">
        <div class="card">
            <div class="card-body">
                <div class="row pb-2">
                    <div class="col-md-7">
                        <form class="d-flex flex-sm-row flex-column" action="" method="post">
                            <div class="form-floating me-2 mb-2 w-100">
                                <input class="form-control" value="<?= $_POST['nama'] ?>" name="nama" type="search" id="nama">
                                <label for="nama">Cari Nama</label>
                            </div>
                            <div class="form-floating me-2 mb-2 w-100">
                                <input class="form-control" type="date" value="<?= $_POST['cekin'] ?>" name="cekin" id="cekin">
                                <label for="cekin">Cari Tgl Check In</label>
                            </div>
                            <button class="btn btn-outline-success mb-2" name="submit" type="submit">Search</button>
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
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        if (isset($_POST['submit'])) {
                            $query = mysqli_query($koneksi, "SELECT * from reservasi where status=4 and nama like '%$_POST[nama]%' and cekin like '%$_POST[cekin]%'");
                        } elseif (isset($_POST['day'])) {
                            $query = mysqli_query($koneksi, "SELECT * from reservasi where status=4 and day(cekin) like '%$_POST[day]%' and year(cekin) like '$year'");
                        } elseif (isset($_POST['month'])) {
                            $query = mysqli_query($koneksi, "SELECT * from reservasi where status=4 and month(cekin) = '$_POST[month]' and year(cekin) like '$year'");
                        } elseif (isset($_POST['year'])) {
                            $query = mysqli_query($koneksi, "SELECT * from reservasi where status=4 and year(cekin) like '%$_POST[year]%'");
                        } else {
                            $query = mysqli_query($koneksi, "SELECT * from reservasi where status=4");
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
                                    <p class='bg-success text-center'>Success</p>
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