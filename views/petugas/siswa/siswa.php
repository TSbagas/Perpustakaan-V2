<a href="dashboard.php?pages=siswa&act=tambah" class="btn btn-success mb-3">Tambah Siswa</a>
<?php

?>
<table class="table border shadow text-center align-middle">
    <tr class="bg-primary text-white">
        <td>No</td>
        <td>NISN</td>
        <td>Nama</td>
        <td>Kelas</td>
        <td>Foto</td>
        <td>Opsi</td>
    </tr>
        <?php
        $i = 1;
        foreach ($data->List($_GET['pages']) as $u){
            ?>
             <tr>
                <td><?=$i++?></td>
                <td><?=$u->nisn?></td>
                <td><?=$u->nama_siswa?></td>
                <td><?=$u->kelas?></td>
                <td><img src="assets\img\gambar\<?=$u->foto?>" width=160 alt=""></td>
                <td>
                    <a href="dashboard.php?pages=siswa&act=ubah&id=<?=$u->siswa_id?>" class='btn btn-primary'>Ubah</a>
                    <a href="routes/proses.php?act=hapus&id=<?=$u->siswa_id?>&&pages=<?=$_GET['pages']?>&&where=siswa_id" class='btn btn-danger' onclick='return confirm("Apakah anda ingin menghapus data ini?")'>Hapus</a>
                </td>
            </tr>
            <?php
    }

        ?>
</table>