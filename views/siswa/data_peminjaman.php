<table class="table border shadow">
    <tr class="bg-primary text-white">
        <td>NO</td>
        <td>Judul Buku</td>
        <td>Tgl Pinjam</td>
        <td>Tgl Kembali</td>
    </tr>
    <?php
    $no = 1;
    foreach ($data->list_data_peminjaman() as $u){
        ?>
    <tr>
        <td><?=$no++?></td>
        <td><?=$u->judul_buku?></td>
        <td><?=$u->tgl_peminjaman?></td>
        <td><?=$u->tgl_kembali?></td>
        <?php
    }
    ?>
        </tr>
    <?php
    ?>
</table>