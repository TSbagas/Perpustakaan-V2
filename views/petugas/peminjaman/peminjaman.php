<a href="dashboard.php?pages=peminjaman&act=tambah" class="btn btn-success mb-3">Pinjam buku</a>

<table class="table border shadow text-center align-middle">
         <tr class="bg-primary text-white">
        <th>No</th>
        <th>No Peminjaman</th>
        <th>NIS</th>
        <th>Nama Siswa</th>
        <th>Judul Buku</th>
        <th>Tgl Pinjam</th>
        <th>Tgl Kembali</th>
        <th>Opsi</th>
    </tr>
    <tr>
        <?php
        @$datas = $data->list_peminjaman();
        $no = 1;
        foreach ($datas as $u) {
    ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $u->no_peminjaman; ?></td>
            <td><?= $u->nisn; ?></td>
            <td><?= $u->nama_siswa; ?></td>
            <td><?= $u->judul_buku; ?></td>
            <td><?= $u->tgl_peminjaman; ?></td>
            <td><?= $u->tgl_kembali; ?></td>
            <td><a href="routes/proses.php?act=hapus&id=<?=$u->id_peminjaman?>&&pages=<?=$_GET['pages']?>&&where=id_peminjaman" class='btn btn-danger' onclick='return confirm("Apakah anda ingin menghapus data ini?")'>Hapus</a></td>
            
        </tr>
    <?php
    }
    ?>
    </tr>
</table>
