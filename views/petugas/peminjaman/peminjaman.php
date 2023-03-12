<a href="dashboard.php?pages=peminjaman&act=tambah" class="btn btn-success mb-3">Pinjam buku</a>

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
            <td><?= $no++ ?></td>
            <td><?= $u->no_peminjaman; ?></td>
            <td><?= $u->nisn; ?></td>
            <td><?= $u->nama_siswa; ?></td>
            <td><?= $u->judul_buku; ?></td>
            <td><?= $u->tgl_peminjaman; ?></td>
            <td><?= $u->tgl_kembali; ?></td>
        </tr>
    <?php
    }
    ?>
    </tr>
</table>
