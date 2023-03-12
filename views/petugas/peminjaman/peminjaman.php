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
                foreach ($data->list_buku() as $u){
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
    </div>
</form>
<table class="table border shadow">
         <tr class="bg-primary text-white">
        <th>No</th>
        <th>No Peminjaman</th>
        <th>NIS</th>
        <th>Nama Siswa</th>
        <th>Judul Buku</th>
        <th>Tgl Pinjam</th>
        <th>Tgl Kembali</th>
    </tr>
    <tr>
        <?php
    $no = 1;
    foreach (@$data->list_peminjaman() as $u) {
    ?>
        <tr>
            <td><?= $no; ?></td>
            <td><?= $u->no_peminjaman; ?></td>
            <td><?= $u->nisn; ?></td>
            <td><?= $u->nama_siswa; ?></td>
            <td><?= $u->judul_buku; ?></td>
            <td><?= $u->tgl_peminjaman; ?></td>
            <td><?= $u->tgl_kembali; ?></td>
        </tr>
    <?php
        $no++;
    }
    ?>
    </tr>
</table>
