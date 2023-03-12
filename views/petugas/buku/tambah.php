<h1>Form Tambah Buku</h1>

<hr>
<form action="routes/proses.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="">judul</label>
        <input type="text" class="form-control" name="judul" placeholder="Masukkan Username">
    </div>
    <div class="form-group">
        <label for="">deskripsi</label>
        <input type="text" class="form-control" name="deskripsi" placeholder="Masukkan Username">
    </div>
    <div class="form-group">
        <label for="">penulis</label>
        <input type="text" class="form-control" name="penulis" placeholder="Masukkan Username">
    </div>
    <div class="form-group">
        <label for="">penerbit</label>
        <input type="text" class="form-control" name="penerbit" placeholder="Masukkan Username">
    </div>
    <div class="form-group">
        <label for="">Foto</label>
        <input type="file" class="form-control" name="gambar" placeholder="Masukkan password">
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="simpan_buku" value="Simpan">
        <a href="dashboard.php?pages=buku" class="btn btn-danger">Kembali</a>
    </div>
</form>