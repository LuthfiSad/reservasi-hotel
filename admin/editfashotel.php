<?php
include "../model/koneksi.php";
include "../layout/headadmin.php";
include "../layout/navadmin.php";
include "../layout/sidebar.php";
if ($_SESSION['level'] !== 'Admin') {
    echo "<script>alert('Halaman Ini hanya Untuk Administrasi');
    location='index.php'</script>";
}
$query = mysqli_query($koneksi, "SELECT * from fasilitas_hotel where id='$_GET[id]'");
$data = mysqli_fetch_assoc($query);
?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Edit Fasilitas Hotel</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="controller/editfashotel.php?id=<?= $data['id'] ?>" method="post" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="foto">Image</label>
                        <input type="file" name="foto" value="<?= $data['foto'] ?>" id="foto" class="form-control">
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="nama" value="<?= $data['nama'] ?>" name="nama" placeholder="nama">
                        <label for="nama">Nama Fasilitas</label>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer d-flex">
                    <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                    <a href="fashotel.php" type="button" class="ms-auto btn-sm btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include "../layout/footadmin.php"; ?>