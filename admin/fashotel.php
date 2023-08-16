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
                    <h1 class="m-0">Data Fasilitas Hotel</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./">Home</a></li>
                        <li class="breadcrumb-item active">Data Fasilitas Hotel</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="content">
        <div class="card">
            <div class="card-body">
                <div dir="rtl" class="pb-1">
                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#tambahfas">Tambah Data</button>
                </div>
                <table id="example2" class="table table-stripped table-bordered table-dark">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Image</th>
                            <th>Nama Fasilitas</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $query = mysqli_query($koneksi, "SELECT * from fasilitas_hotel");
                        while ($data = mysqli_fetch_assoc($query)) {
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><img src="../img/<?= $data['foto'] ?>" width="150" alt=""></td>
                                <td><?= $data['nama'] ?></td>
                                <td><a href="editfashotel.php?id=<?= $data['id'] ?>">
                                        <button class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></button></a>
                                    <button class="btn btn-sm btn-danger" onclick="if(confirm('Apakah Anda Ingin Menghapus Data Ini')){location='controller/hapusfashotel.php?id=<?= $data['id'] ?>'}"><i class="bi bi-trash"></i></button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="tambahfas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Fasilitas Hotel</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="controller/addfashotel.php" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="foto">Image</label>
                        <input type="file" name="foto" id="foto" class="form-control">
                    </div>
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
<?php include "../layout/footadmin.php"; ?>