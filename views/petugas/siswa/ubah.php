<h1>Ubah User</h1>
<?php
        $u = $data->Tampil_data($_GET['pages'],'siswa_id',$_GET['id']);
?>
<hr>
<form action="routes/proses.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <input type="hidden" value="<?=$_GET['id']?>" name="siswa_id">
        <label for="">NISN</label>
        <input type="text" class="form-control" name="nisn" placeholder="Masukkan Username" value="<?=$u->nisn?>">
    </div>
    <div class="form-group">
        <label for="">Nama</label>
        <input type="text" class="form-control" name="nama" placeholder="Masukkan Username" value="<?=$u->nama_siswa?>">
    </div>
    <div class="form-group">
        <label for="">Kelas</label>
        <input type="text" class="form-control" name="kelas" placeholder="Masukkan Username" value="<?=$u->kelas?>">
    </div>
    <div class="form-group">
        <label for="">Foto</label>
        <input type="file" class="form-control" name="gambar">
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="ubah_siswa" value="Simpan">
        <a href="dashboard.php?pages=siswa" class="btn btn-danger">Kembali</a>
    </div>
</form>
