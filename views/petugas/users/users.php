<a href="dashboard.php?pages=users&act=tambah" class="btn btn-success mb-3">Tambah Users</a>
<?php

?>
<table class="table border shadow text-center text-middle align-middle">
    <tr class="bg-primary text-white">
        <td>No</td>
        <td>Username</td>
        <td>Level</td>
        <td>Opsi</td>
    </tr>
<!-- Menampilkan List Users -->
        <?php
        $i = 1;
        foreach ($data->List($_GET['pages']) as $u){
            ?>
<!-- List END -->
    <tr>
                <td><?=$i++?></td>
                <td><?=$u->username?></td>
                <td><?=$u->level?></td>
                <td>
                    <a href="dashboard.php?pages=users&act=ubah&id=<?=$u->user_id?>" class='btn btn-primary'>Ubah</a>
                    <a href="routes/proses.php?act=hapus&id=<?=$u->user_id?>&&pages=<?=$_GET['pages']?>&&where=user_id" class='btn btn-danger' onclick='return confirm("Apakah anda ingin menghapus data ini?")'>Hapus</a>
                </td>
            </tr>
<!-- List END -->
            <?php
    }

        ?>
<!-- List END -->
</table>