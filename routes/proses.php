<?php
    require_once('../controllers/db.php');
// Proses LOGIN
    if(@$_POST['login']){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $data->proses_login($username,$password);
    }
// Proses Logout
    if(@$_GET['aksi'] == 'logout'){
        $data->proses_logout();
    }
// Proses Simpan Users
    if(@$_POST['simpan_user']){
        $uname = $_POST['username'];
        $pwd = $_POST['password'];
        $data->proses_simpan_user($uname,$pwd);
    }
    if(@$_POST['ubah_user']){
        $uname = $_POST['username'];
        $pwd = $_POST['password'];
        $user_id = $_POST['id'];
        $data->proses_ubah_user($uname,$pwd,$user_id);
    }
// Proses Hapus
    if(@$_GET['act'] == 'hapus'){
        $id = $_GET['id'];
        $table = $_GET['pages'];
        $where = $_GET['where'];
        $data->Proses_Hapus($id,$table,$where);
    }
// Proses Siswa
    if(@$_POST['simpan_siswa']){
        $nisn = $_POST['nisn'];
        $nama = $_POST['nama'];
        $kelas = $_POST['kelas'];
        $gambar = $_FILES['gambar']['name'];
        $data->proses_simpan_siswa($nisn,$nama,$kelas,$gambar);
    }
    if(@$_POST['ubah_siswa']){
        $nisn = $_POST['nisn'];
        $nama = $_POST['nama'];
        $kelas = $_POST['kelas'];
        $pages = $_POST['pages'];
        $siswa_id = $_POST['siswa_id'];
        $gambar = $_FILES['gambar']['name'];
        $data->proses_ubah_siswa($nisn,$nama,$kelas,$siswa_id,$gambar,$pages);
    }
// Buku
    if(@$_POST['simpan_buku']){
        $judul = $_POST['judul'];
        $deskripsi = $_POST['deskripsi'];
        $penulis = $_POST['penulis'];
        $penerbit = $_POST['penerbit'];
        $gambar = $_FILES['gambar']['name'];
        $data->proses_simpan_buku($judul,$deskripsi,$penulis,$penerbit,$gambar);
    }
    if(@$_POST['ubah_buku']){
        $judul = $_POST['judul'];
        $deskripsi = $_POST['deskripsi'];
        $penulis = $_POST['penulis'];
        $penerbit = $_POST['penerbit'];
        $gambar = $_FILES['gambar']['name'];
        $buku_id = $_POST['buku_id'];
        $data->proses_ubah_buku($judul,$deskripsi,$penulis,$penerbit,$gambar,$buku_id);
    }
// Peminjaman
    if(@$_POST['cari']){
        $nisn = $_POST['nisn'];
        $data->proses_pencarian_nama($nisn);
    }
    if (@$_POST['simpan_pinjam']) {
        $no_peminjaman = $_POST['id'] . "-" . date('Y-m-d');
        $siswa = $_POST['id'];
        $buku = $_POST['buku'];
        $tgl_pinjam = date('Y-m-d');
        $tgl_kembali = $_POST['tgl_kembali'];
        $data->proses_simpan_peminjaman($no_peminjaman, $siswa, $buku, $tgl_pinjam, $tgl_kembali);
    }
?>