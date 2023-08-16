<?php
include "../model/koneksi.php";
include "../layout/headadmin.php";
include "../layout/navadmin.php";
include "../layout/sidebar.php";
if ($_SESSION['level'] !== 'Admin') {
    echo "<script>alert('Halaman Ini hanya Untuk Administrasi');
    location='index.php'</script>";
}
?>
<style>
    .card li {
        font-size: 13px;
    }

    .card ul {
        padding: 20px;
        margin-bottom: 0;
        padding-bottom: 0;
    }
</style>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Fasilitas Kamar</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./">Home</a></li>
                        <li class="breadcrumb-item active">Data Fasilitas Kamar</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="content">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <table class="table table-stripped table-bordered table-dark">
                            <tr>
                                <th width="5%">No</th>
                                <th>Tipe</th>
                                <th>Fasilitas</th>
                            </tr>
                            <?php
                            $no = 1;
                            $query = mysqli_query($koneksi, "SELECT * from kamar");
                            while ($data = mysqli_fetch_assoc($query)) {
                            ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $data['tipe'] ?></td>
                                    <td>
                                        <ul>
                                            <?php
                                            $detail = mysqli_query($koneksi, "SELECT * from detail, fasilitas_kamar where detail.id_kamar='$data[id_kamar]' and detail.id_fas=fasilitas_kamar.id_fas");
                                            while ($data1 = mysqli_fetch_assoc($detail)) { ?>

                                                <li>
                                                    <div class="d-flex mb-1"><?= $data1['nama'] ?><button onclick="if(confirm('Apakah Anda Ingin Menghapus Data Ini ?')){location='controller/hapusdetail.php?id=<?= $data1['id'] ?>'}" class="ms-auto btn-sm btn btn-danger">-</button></div>
                                                </li>

                                            <?php
                                            }
                                            ?>

                                        </ul>
                                        <button data-bs-toggle="modal" data-bs-target="#tambahdetail" class="btn-sm btn btn-primary">+</button>
                                    </td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                    <div class="col-md-4">
                        <div class="card bg-dark">
                            <div class="card-body">
                                <div dir="rtl" class="pb-1">
                                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#tambahfas">Tambah Fasilitas</button>
                                </div>
                                <h4>Fasilitas yang Tersedia :</h4>
                                <ol>
                                    <?php
                                    $fasilitas = mysqli_query($koneksi, "SELECT * from fasilitas_kamar");
                                    while ($data = mysqli_fetch_assoc($fasilitas)) {
                                    ?>
                                        <li>
                                            <div class="d-flex mb-1"><?= $data['nama'] ?><div class="ms-auto"><a href="editfaskamar.php?id=<?= $data['id_fas'] ?>"><button class="btn btn-sm btn-warning me-1"><i class="bi bi-pencil-square"></i></button></a><button class="btn btn-sm btn-danger" onclick="if(confirm('Apakah Anda Ingin Menghapus Semua Data <?= $data['nama'] ?>')){location='controller/hapusfaskamar.php?id=<?= $data['id_fas'] ?>'}"><i class="bi bi-trash"></i></button></div>
                                            </div>
                                        </li>
                                    <?php } ?>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="tambahfas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Fasilitas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="controller/addfaskamar.php" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="nama">
                        <label for="nama">Nama Fasilitas</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="tambahdetail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Fasilitas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="controller/adddetail.php" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md">
                            <div class="form-floating mb-3">
                                <select class="form-control" name="id_kamar" required id="id_kamar">
                                    <option value="" disabled selected>Pilih Tipe</option>
                                    <?php
                                    $kamar = mysqli_query($koneksi, "SELECT * from kamar");
                                    while ($data = mysqli_fetch_assoc($kamar)) {
                                    ?>
                                        <option value="<?= $data['id_kamar']  ?>"><?= $data['tipe'] ?></option>
                                    <?php } ?>
                                </select>
                                <label for="id_kamar">Tipe Kamar</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating mb-3">
                                <select class="form-control" name="nama" required id="nama">
                                    <option value="" disabled selected>Pilih Fasilitas Kamar</option>
                                    <?php
                                    $fasilitas = mysqli_query($koneksi, "SELECT * from fasilitas_kamar");
                                    while ($data = mysqli_fetch_assoc($fasilitas)) {
                                    ?>
                                        <option value="<?= $data['id_fas']  ?>"><?= $data['nama'] ?></option>
                                    <?php } ?>
                                </select>
                                <label for="nama">Fasilitas Kamar</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include "../layout/footadmin.php"; ?>