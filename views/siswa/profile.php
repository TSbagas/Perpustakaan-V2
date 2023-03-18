<h1>Profile anda</h1>
<?php
session_start();
$n = $data->proses_pencarian($_SESSION['nis']);
$u = $data->Tampil_data('siswa','nisn',$_SESSION['nis']);
?>
<hr>
<form action="routes/proses.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <input type="hidden" value="<?=$n->siswa_id?>" name="siswa_id">
        <input type="hidden" value="profile" name="pages">
        <label for="">NISN</label>
        <input type="text" class="form-control" name="nisn" value="<?=$_SESSION['nis']?>" placeholder="Masukkan NISN" readonly>
    </div>
    <div class="form-group">
        <label for="">Nama</label>
        <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama" value="<?=$u->nama_siswa?>">
    </div>
    <div class="form-group">
        <label for="">Kelas</label>
        <input type="text" class="form-control" name="kelas" placeholder="Masukkan Kelas" value="<?=$u->kelas?>">
    </div>
    <div class="form-group">
        <label for="">Foto</label>
        <img src="assets\img\gambar\<?=$u->foto?>" width=120 class="ms-3 mb-2" alt="">
        <input type="file" class="form-control" name="gambar">
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="ubah_siswa" value="Simpan">
        <a href="dashboard.php" class="btn btn-danger">Kembali</a>
    </div>
</form>
