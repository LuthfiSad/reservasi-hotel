<?php
include "../model/koneksi.php";
include "../layout/headadmin.php";
include "../layout/navadmin.php";
include "../layout/sidebar.php";
?>
<style>
    .icon i.bi {
        font-size: 70px;
        top: 20px;
        line-height: 1;
    }
</style>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <?php if ($_SESSION['level'] == 'Admin') { ?>
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-orange">
                            <div class="inner">
                                <?php $kamar = mysqli_query($koneksi, "SELECT * from kamar");
                                $rowkamar = mysqli_num_rows($kamar);
                                ?>
                                <h3><?= $rowkamar ?></h3>

                                <p>Data Kamar</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="kamar.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <?php $faskamar = mysqli_query($koneksi, "SELECT * from fasilitas_kamar");
                                $rowfaskamar = mysqli_num_rows($faskamar);
                                ?>
                                <h3><?= $rowfaskamar ?></h3>

                                <p>Data Fasilitas Kamar</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="faskamar.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-pink">
                            <div class="inner">
                                <?php $fashotel = mysqli_query($koneksi, "SELECT * from fasilitas_hotel");
                                $rowfashotel = mysqli_num_rows($fashotel);
                                ?>
                                <h3><?= $rowfashotel ?></h3>

                                <p>Data Fasilitas Hotel</p>
                            </div>
                            <div class="icon">
                                <i class="bi bi-book"></i>
                            </div>
                            <a href="fashotel.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                <?php } ?>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-purple">
                        <div class="inner">
                            <?php $resep = mysqli_query($koneksi, "SELECT * from reservasi");
                            $rowresep = mysqli_num_rows($resep);
                            ?>
                            <h3><?= $rowresep ?></h3>

                            <p>Data Perpesanan</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="reservasi.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <h5 class="mb-2">Info Perpesanan</h5>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-secondary">
                        <div class="inner">
                            <?php $baru = mysqli_query($koneksi, "SELECT * from reservasi where status=1");
                            $rowbaru = mysqli_num_rows($baru);
                            ?>
                            <h3><?= $rowbaru ?></h3>

                            <p>Data Baru</p>
                        </div>
                        <div class="icon">
                            <i class="bi bi-folder-plus"></i>
                        </div>
                        <a href="reservasi.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-dark">
                        <div class="inner">
                            <?php $sts3 = mysqli_query($koneksi, "SELECT * from reservasi where status=3");
                            $rowsts3 = mysqli_num_rows($sts3);
                            ?>
                            <h3><?= $rowsts3 ?></h3>

                            <p>Data Yang Ditolak</p>
                        </div>
                        <div class="icon">
                            <i class="bi bi-calendar-x"></i>
                        </div>
                        <a href="reservasi.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-teal">
                        <div class="inner">
                            <?php $sts2 = mysqli_query($koneksi, "SELECT * from reservasi where status=2");
                            $rowsts2 = mysqli_num_rows($sts2);
                            ?>
                            <h3><?= $rowsts2 ?></h3>

                            <p>Data Yang Diterima</p>
                        </div>
                        <div class="icon">
                            <i class="bi bi-calendar-event-fill"></i>
                        </div>
                        <a href="reservasi.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <?php $sts4 = mysqli_query($koneksi, "SELECT * from reservasi where status=4");
                            $rowsts4 = mysqli_num_rows($sts4);
                            ?>
                            <h3><?= $rowsts4 ?></h3>

                            <p>Data Yang Selesai</p>
                        </div>
                        <div class="icon">
                            <i class="bi bi-calendar-check"></i>
                        </div>
                        <a href="record.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <h5 class="mb-2">Info Status</h5>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <?php $wait = mysqli_query($koneksi, "SELECT * FROM reservasi WHERE cekin>CURRENT_DATE and status=2");
                            $rowwait = mysqli_num_rows($wait);
                            ?>
                            <h3><?= $rowwait ?></h3>

                            <p>Data Sebelum Check In</p>
                        </div>
                        <div class="icon">
                            <i class="bi bi-hourglass"></i>
                        </div>
                        <a href="reservasi.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <?php $in = mysqli_query($koneksi, "SELECT * FROM reservasi WHERE cekin<=CURRENT_DATE and cekout > CURRENT_DATE AND status=2");
                            $rowin = mysqli_num_rows($in);
                            ?>
                            <h3><?= $rowin ?></h3>

                            <p>Data Yang Status Check In</p>
                        </div>
                        <div class="icon">
                            <i class="bi bi-alarm"></i>
                        </div>
                        <a href="reservasi.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <?php $out = mysqli_query($koneksi, "SELECT * FROM reservasi WHERE cekout = CURRENT_DATE AND status=2");
                            $rowout = mysqli_num_rows($out);
                            ?>
                            <h3><?= $rowout ?></h3>

                            <p>Data Yang Status Check Out</p>
                        </div>
                        <div class="icon">
                            <i class="bi bi-alarm-fill"></i>
                        </div>
                        <a href="reservasi.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <div class="row">
                <?php if ($_SESSION['level'] == 'Admin') { ?>
                    <div class="col-lg">
                        <div class="card">
                            <div class="card-header border-0">
                                <div class="d-flex justify-content-between">
                                    <h3 class="card-title">Info HotelMe</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn bg-warning btn-sm" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn bg-danger btn-sm" data-card-widget="remove">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="position-relative mb-4">
                                    <canvas id="info-hotel" height="300"></canvas>
                                </div>

                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                <?php } ?>
                <div class="col-lg">
                    <div class="card">
                        <div class="card-header border-0">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title">Info Sales</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn bg-warning btn-sm" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn bg-danger btn-sm" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex">
                                <p class="d-flex flex-column">
                                    <span>Data Perpesanan</span>
                                    <span class="text-bold text-lg"><?= $rowresep ?></span>
                                </p>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="position-relative mb-4">
                                <canvas id="info-sales" height="174"></canvas>
                            </div>
                            <div class="d-flex flex-row justify-content-end">
                                <span class="mr-2">
                                    <i class="fas fa-square text-yellow"></i> Sebelum Check In
                                </span>
                                <span class="mr-2">
                                    <i class="fas fa-square text-info"></i> Check In
                                </span>
                                <span>
                                    <i class="fas fa-square text-primary"></i> Check Out
                                </span>
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
</div>
<?php include "../layout/footadmin.php"; ?>