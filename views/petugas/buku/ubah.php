<h1>Ubah User</h1>
<?php
        $u = $data->Tampil_data($_GET['pages'],'buku_id',$_GET['id']);
?>
<hr>
<form action="routes/proses.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <input type="hidden" value="<?=$_GET['id']?>" name="buku_id">
        <label for="">Judul Buku</label>
        <input type="text" class="form-control" name="judul" placeholder="Masukkan Username" value="<?=$u->judul_buku?>">
    </div>
    <div class="form-group">
        <label for="">Deskripsi</label>
        <input type="text" class="form-control" name="deskripsi" placeholder="Masukkan Username" value="<?=$u->deskripsi?>">
    </div>
    <div class="form-group">
        <label for="">Penulis</label>
        <input type="text" class="form-control" name="penulis" placeholder="Masukkan Username" value="<?=$u->penulis?>">
    </div>
    <div class="form-group">
        <label for="">Penerbit</label>
        <input type="text" class="form-control" name="penerbit" placeholder="Masukkan Username" value="<?=$u->penerbit?>">
    </div>
    <div class="form-group">
        <label for="gambar"><i class="fa fa-file-image-o fa-6x align-middle" aria-hidden="true"></i></label>
        <img src="assets\img\gambar\<?=$u->gambar?>" width=120 class="ms-3" alt="">
        <input type="file" class="form-control" name="gambar" id="gambar" placeholder="Masukkan password" value="<?=$u->gambar?>" hidden>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="ubah_buku" value="Simpan">
        <a href="dashboard.php?pages=buku" class="btn btn-danger">Kembali</a>
    </div>
</form>
