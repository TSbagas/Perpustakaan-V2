<h1>Ubah User</h1>
<?php
        $buku_id = $_GET['id'];
        $u = $data->proses_tampil_buku($buku_id);
?>
<hr>
<form action="routes/proses.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <input type="hidden" value="<?=$buku_id?>" name="buku_id">
        <label for="">judul</label>
        <input type="text" class="form-control" name="judul" placeholder="Masukkan Username" value="<?=$u->judul_buku?>">
    </div>
    <div class="form-group">
        <label for="">deskripsi</label>
        <input type="text" class="form-control" name="deskripsi" placeholder="Masukkan Username" value="<?=$u->deskripsi?>">
    </div>
    <div class="form-group">
        <label for="">penulis</label>
        <input type="text" class="form-control" name="penulis" placeholder="Masukkan Username" value="<?=$u->penulis?>">
    </div>
    <div class="form-group">
        <label for="">penerbit</label>
        <input type="text" class="form-control" name="penerbit" placeholder="Masukkan Username" value="<?=$u->penerbit?>">
    </div>
    <div class="form-group">
        <label for="">Foto</label>
        <input type="file" class="form-control" name="gambar" placeholder="Masukkan password" value="<?=$u->gambar?>">
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="ubah_buku" value="Simpan">
        <a href="dashboard.php?pages=buku" class="btn btn-danger">Kembali</a>
    </div>
</form>
