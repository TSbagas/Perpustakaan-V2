<h1>Form Tambah Buku</h1>

<hr>
<form action="routes/proses.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="">Judul Buku</label>
        <input type="text" class="form-control" name="judul" placeholder="Masukkan Username">
    </div>
    <div class="form-group">
        <label for="">Deskripsi</label>
        <input type="text" class="form-control" name="deskripsi" placeholder="Masukkan Deskripsi">
    </div>
    <div class="form-group">
        <label for="">Penulis</label>
        <input type="text" class="form-control" name="penulis" placeholder="Masukkan Penulis">
    </div>
    <div class="form-group">
        <label for="">Penerbit</label>
        <input type="text" class="form-control" name="penerbit" placeholder="Masukkan Penerbit">
    </div>
    <div class="form-group">
        <label for="gambar"><i class="fa fa-file-image-o fa-6x" aria-hidden="true"></i></i></label>
        <input type="file" class="form-control" name="gambar" id='gambar'hidden>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="simpan_buku" value="Simpan">
        <a href="dashboard.php?pages=buku" class="btn btn-danger">Kembali</a>
    </div>
</form>