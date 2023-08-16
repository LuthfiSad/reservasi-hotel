<?php
include "../model/koneksi.php";
include "../layout/headadmin.php";
include "../layout/navadmin.php";
include "../layout/sidebar.php";
if ($_SESSION['level'] !== 'Admin') {
    echo "<script>alert('Halaman Ini hanya Untuk Administrasi');
    location='index.php'</script>";
}
$query = mysqli_query($koneksi, "SELECT * from kamar where id_kamar='$_GET[id]'");
$data = mysqli_fetch_assoc($query);
?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Edit Kamar</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="controller/editkamar.php?id=<?= $data['id_kamar'] ?>" method="post" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="foto">Image</label>
                        <input type="file" name="foto" value="<?= $data['foto'] ?>" id="foto" class="form-control">
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="tipe" value="<?= $data['tipe'] ?>" name="tipe" placeholder="tipe">
                        <label for="tipe">Tipe Kamar</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="ukuran" value="<?= $data['ukuran'] ?>" name="ukuran" placeholder="ukuran">
                        <label for="ukuran">Ukuran</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" id="jumlah" value="<?= $data['jumlah'] ?>" name="jumlah" placeholder="jumlah">
                        <label for="jumlah">Jumlah Kamar</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" value="<?= $data['harga'] ?>" id="harga" name="harga" placeholder="harga">
                        <label for="harga">Harga Kamar</label>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer d-flex">
                    <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                    <a href="kamar.php" type="button" class="ms-auto btn-sm btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include "../layout/footadmin.php"; ?>