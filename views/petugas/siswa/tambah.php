<h1>Form Tambah Siswa</h1>

<hr>
<form action="routes/proses.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="">NISN</label>
        <input type="text" class="form-control" name="nisn" placeholder="Masukkan Username">
    </div>
    <div class="form-group">
        <label for="">Nama</label>
        <input type="text" class="form-control" name="nama" placeholder="Masukkan Username">
    </div>
    <div class="form-group">
        <label for="">Kelas</label>
        <input type="text" class="form-control" name="kelas" placeholder="Masukkan Username">
    </div>
    <div class="form-group">
        <label for="">Foto</label>
        <input type="file" class="form-control" name="gambar" placeholder="Masukkan password">
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="simpan_siswa" value="Simpan">
        <a href="dashboard.php?pages=siswa" class="btn btn-danger">Kembali</a>
    </div>
</form>
