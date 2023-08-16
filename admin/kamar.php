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
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Kamar</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./">Home</a></li>
                        <li class="breadcrumb-item active">Data Kamar</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="content">
        <div class="card">
            <div class="card-body">
                <div dir="rtl" class="pb-1">
                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#tambahkamar">Tambah Data</button>
                </div>
                <table id="example2" class="table table-stripped table-bordered table-dark">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Image</th>
                            <th>Tipe</th>
                            <th>Ukuran</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $query = mysqli_query($koneksi, "SELECT * from kamar");
                        while ($data = mysqli_fetch_assoc($query)) {
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><img src="../img/<?= $data['foto'] ?>" width="150" alt=""></td>
                                <td><?= $data['tipe'] ?></td>
                                <td><?= $data['ukuran'] ?></td>
                                <td><?= $data['jumlah'] ?></td>
                                <td>Rp. <?= $data['harga'] ?></td>
                                <td><a href="editkamar.php?id=<?= $data['id_kamar'] ?>">
                                        <button class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></button></a>
                                    <button class="btn btn-sm btn-danger" onclick="if(confirm('Apakah Anda Ingin Menghapus Data Ini')){location='controller/hapuskamar.php?id=<?= $data['id_kamar'] ?>'}"><i class="bi bi-trash"></i></button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="tambahkamar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Kamar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="controller/addkamar.php" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="foto">Image</label>
                        <input type="file" name="foto" id="foto" class="form-control">
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="tipe" name="tipe" placeholder="tipe">
                        <label for="tipe">Tipe Kamar</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="ukuran" name="ukuran" placeholder="ukuran">
                        <label for="ukuran">Ukuran</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="jumlah">
                        <label for="jumlah">Jumlah Kamar</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" id="harga" name="harga" placeholder="harga">
                        <label for="harga">Harga Kamar</label>
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