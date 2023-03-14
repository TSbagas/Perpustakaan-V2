<h1>Peminjaman</h1>
<?php
@$nisn = $_GET['nisn'];
$u = $data->proses_pencarian($nisn);
?>
<form action="routes/proses.php" method="post">
<div class="form-group">
        <label for="">NISN</label>
        <input type="text" class="form-control" name="nisn"><br>
        <input type="submit" value="Cari" name="cari" class='btn btn-primary'>
</div>
<div class="form-group">
        <input type="hidden" value="<?=@$nisn?>" name="id">
        <label for="">Nama Siswa</label>
        <input type="text" class="form-control" value="<?=@$u->nama_siswa?>">

</div>
<div class="form-group">
        <label for="">Judul buku</label>
        <select name="buku" class="form-control">
                <?php
                foreach ($data->List('buku') as $u){
                ?>
                <option value="<?=$u->buku_id?>"><?=$u->judul_buku?></option>
                <?php
                }
                ?>
        </select>
</div>
<div class="form-group">
        <label for="">Tgl Kembali</label>
        <input type="date" name="tgl_kembali" class="form-control">
    </div>
    <div class="form-group">
        <input type="submit" name="simpan_pinjam" class="btn btn-primary" value="Simpan">
        <a href="dashboard.php?pages=peminjaman" class="btn btn-danger">Kembali</a>
    </div>
</form>